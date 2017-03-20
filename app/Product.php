<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use PaypalPayment;

class Product extends Model {
  
  protected $table = "products";

  public function paypalItem() {
    return PaypalPayment::item()
            ->setName($this->title)
            ->setDescription($this->description)
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($this->pricing);
  }
}