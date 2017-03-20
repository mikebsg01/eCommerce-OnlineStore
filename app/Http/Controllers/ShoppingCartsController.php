<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\ShoppingCart;
use App\Paypal;
use Session;

class ShoppingCartsController extends Controller {
  public function index() {
    $shopping_cart_id = Session::get('shopping_cart_id');
    $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);

    $paypal = new Paypal($shopping_cart);
    $payment = $paypal->generate();
    
    return redirect($payment->getApprovalLink());
    /*
    $products = $shopping_cart->products;
    $total = $shopping_cart->total();

    return view('shopping_carts.index', [
      'products'  => $products,
      'total'     => $total
    ]);*/
  }

  public function show($id) {
    $shopping_cart = ShoppingCart::whereCustomid($id)->first();
    $order = $shopping_cart->order;

    return view('shopping_carts.completed',  [
      'shopping_cart' => $shopping_cart,
      'order'         => $order
    ]);
  }
}
