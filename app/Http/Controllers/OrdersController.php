<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Order;

class OrdersController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $orders = Order::latest();
    $totalMonth = Order::totalMonth();
    $totalMonthCount = Order::totalMonthCount();

    return view('orders.index', [
      'orders'          => $orders,
      'totalMonth'      => $totalMonth,
      'totalMonthCount' => $totalMonthCount
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) {
    $order = Order::find($id);
    $field = $request->name;
    $order->$field = $request->value;
    $order->save();

    return $order->$field;
  }
}
