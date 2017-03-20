<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use PaypalPayment;

class Paypal {
  
  private $_apiContext;
  private $_ClientId;
  private $_ClientSecret;
  private $shopping_cart;

  public function __construct($shopping_cart) {
    $this->_ClientId = env('PAYPAL_CLIENT_ID');
    $this->_ClientSecret = env('PAYPAL_CLIENT_SECRET');
    $this->shopping_cart = $shopping_cart;

    $config = config('paypal_payment');
    $flatConfig = array_dot($config);
    
    $this->_apiContext = PaypalPayment::ApiContext($this->_ClientId, $this->_ClientSecret);

    $this->_apiContext->setConfig($flatConfig);
  }

  public function generate() {
    $payment = PaypalPayment::payment()
                ->setIntent('sale')
                ->setPayer($this->payer())
                ->setTransactions([$this->transaction()])
                ->setRedirectUrls($this->redirectURLs());

    try {
      $payment->create($this->_apiContext);
    } catch (Exception $ex) {
      dd($ex);
      exit(1);
    }

    return $payment;
  }

  private function payer() {
    return PaypalPayment::payer()->setPaymentMethod('paypal');
  }

  private function transaction() {
    return PaypalPayment::transaction()
            ->setAmount($this->amount())
            ->setItemList($this->items())
            ->setDescription("Your purchase at the clothing store.")
            ->setInvoiceNumber(uniqid());
  }

  public function items() {
    $items    = [];
    $products = $this->shopping_cart->products;

    foreach ($products as $product) {
      array_push($items, $product->paypalItem());
    }
    return PaypalPayment::itemList()->setItems($items);
  }

  private function amount() {
    return PaypalPayment::amount()
            ->setCurrency('USD')
            ->setTotal($this->shopping_cart->total());
  }

  private function redirectURLs() {
    return PaypalPayment::redirectUrls()
            ->setReturnUrl(url('/payments/store'))
            ->setCancelUrl(url('/products'));
  }

  public function execute($paymentId, $payerId) {
    $payment = PaypalPayment::getById($paymentId, $this->_apiContext);

    $execution = PaypalPayment::PaymentExecution()
                  ->setPayerId($payerId);

    return $payment->execute($execution, $this->_apiContext);
  }
}
