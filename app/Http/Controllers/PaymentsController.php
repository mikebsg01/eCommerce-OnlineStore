<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Paypal;
use App\ShoppingCart;
use App\Order;
use Session;

class PaymentsController extends Controller {
  public function store(Request $request) {
    $shopping_cart_id = Session::get('shopping_cart_id');
    $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);

    $paypal = new Paypal($shopping_cart);
    $response = $paypal->execute($request->paymentId, $request->PayerID);

    if ($response->state == "approved") {
      Session::remove('shopping_cart_id');
      $order = Order::createFromPayPalResponse($response, $shopping_cart);
      $shopping_cart->approve();
    }

    return view('shopping_carts.completed',  [
      'shopping_cart' => $shopping_cart,
      'order'         => $order
    ]);
  }
}
