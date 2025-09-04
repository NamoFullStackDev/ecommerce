<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product;

class CartController extends BaseController
{
  protected $session;

  public function __construct()
  {
    $this->session = session(); 
  }

  // Cart overview
  public function index()
  {
    $cart = $this->session->get('cart') ?? [];
    $totalPrice = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
    $grandTotal = $totalPrice; // can add shipping/tax later
    $data = [
      'title'    => 'Shopping Cart',
      'cart' => $cart,
      'subTotal' => $totalPrice,
      'grandTotal' => $grandTotal
    ];  
    return view('Cart/index', $data);
  }
}
