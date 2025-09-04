<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product;

class ProductsController extends BaseController
{
  protected $productModel;
  protected $session;

  public function __construct()
  {
    $this->productModel = new Product();
    $this->session = session(); 
  }

  // List all products
  public function index()
  {
    $data = [
      'title'    => 'Manage Products',
      'products' => $this->productModel->findAll(),
      'cart' => $this->session->get('cart')
    ];
    return view('Products/index', $data);
  }
  // Show single product
  public function show($id)
  {
    $product = $this->productModel->find($id);
    if (!$product) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Product not found');
    }

    return view('Products/show', ['title' => $product['name'], 'product' => $product, 'quantity' => $this->session->get('cart')[$id]['quantity'] ?? 0]);
  }

  // Add product to cart
  public function addToCart($id)
  {
     $this->response->setContentType('application/json');

    $product = $this->productModel->find($id);
    if (!$product) {
      return $this->response->setJSON(['status' => 'error', 'message' => 'Product not found']);
    }

    $cart = $this->session->get('cart') ?? [];
    if (isset($cart[$id])) {
      $cart[$id]['quantity']++;
    } else {
      $cart[$id] = [
        'id'       => $id,
        'name'     => $product['name'],
        'price'    => $product['price'],
        'quantity' => 1,
      ];
    }
    $this->session->set('cart', $cart);

    // Calculate total items in cart
    $totalQty = array_sum(array_column($cart, 'quantity'));

    return $this->response->setJSON([
      'status' => 'success',
      'message' => 'Product added to cart',
      'cartQty' => $cart[$id]['quantity'],
      'totalItems' => $totalQty
    ]);
  }

  // Add update cart
  public function updateCart($id)
  {
    $this->response->setContentType('application/json');
    $action = $this->request->getPost('action');

    $cart = $this->session->get('cart') ?? [];
    if (!isset($cart[$id])) {
      return $this->response->setJSON(['status' => 'error', 'message' => 'Product not found']);
    }


    if ($action === 'plus' && $cart[$id]['quantity'] >= 1) {
      $cart[$id]['quantity']++;
    }
    elseif ($action === 'minus' && $cart[$id]['quantity'] > 1) {
      $cart[$id]['quantity']--;
      if ($cart[$id]['quantity'] < 1) {
        unset($cart[$id]);
      }
    }
    elseif ($action === 'remove') {
      unset($cart[$id]);
    }

    $this->session->set('cart', $cart);

    $totalQty   = array_sum(array_column($cart, 'quantity'));
    $totalPrice = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
    $grandTotal = $totalPrice; // can add shipping/tax later

    return $this->response->setJSON([
      'status'     => 'success',
      'cart'       => $cart,
      'totalItems' => $totalQty,
      'subtotal' => $totalPrice,
      'grandTotal' => $grandTotal,
      'itemQty'    => $cart[$id]['quantity'] ?? 0
    ]);
  }

}