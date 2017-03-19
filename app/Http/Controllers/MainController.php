<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\ShoppingCart;

class MainController extends Controller {
  public function home() {
    return view('main.home');
  }
}
