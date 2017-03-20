<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

  protected $table = 'orders';

  protected $fillable = [
    'shopping_cart_id',
    'line1',
    'line2',
    'postal_code',
    'country_code',
    'state',
    'recipient_name',
    'email',
    'status',
    'guide_number',
    'total'
  ];

  public function shoppingCart() {
    return $this->belongsTo('App\ShoppingCart');
  }

  public function getAddressAttribute() {
    return $this->line1.' '.$this->line2;
  }

  public static function scopeLatest($query) {
    return $query->orderID()->monthly()->get();
  }

  public function scopeOrderID($query) {
    return $query->orderBy('id', 'DESC');
  }

  public function scopeMonthly($query) {
    return $query->whereMonth('created_at', '=', date('m'));
  }

  public static function totalMonth() {
    return Order::monthly()->sum('total');
  }

  public static function totalMonthCount() {
    return Order::monthly()->count();
  }

  public static function createFromPayPalResponse($response, $shopping_cart) {
    $payer = $response->payer->toArray();
    $orderData = $payer['payer_info']['shipping_address'];
    $orderData['email'] = $payer['payer_info']['email'];
    $orderData['total'] = $shopping_cart->total();
    $orderData['shopping_cart_id'] = $shopping_cart->id;

    return Order::create($orderData);
  }
}
