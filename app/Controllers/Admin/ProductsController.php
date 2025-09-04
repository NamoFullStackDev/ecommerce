<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Product;

class ProductsController extends BaseController
{
  protected $productModel;

  public function __construct()
  {
    $this->productModel = new Product();
  }

  // List all products
  public function index()
  {
    $data = [
      'title'    => 'Manage Products',
      'products' => $this->productModel->findAll(),
    ];
    return view('Admin/Products/index', $data);
  }
  // Show single product
  public function show($id)
  {
    $product = $this->productModel->find($id);
    if (!$product) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Product not found');
    }

    return view('Admin/Products/show', ['title' => $product['name'], 'product' => $product]);
  }

  // Show New Product form
  public function new()
  {
    return view('Admin/Products/new', ['title' => 'Add Product']);
  }

  // Store product
  public function create()
  {
    $file = $this->request->getFile('image');
    $imageName = null;

    if ($file && $file->isValid() && !$file->hasMoved()) {
      $imageName = $file->getRandomName();
      $file->move('uploads/products', $imageName);
    }

    $this->productModel->save([
      'name'        => $this->request->getPost('name'),
      'description' => $this->request->getPost('description'),
      'price'       => $this->request->getPost('price'),
      'image'       => $imageName,
    ]);

    return redirect()->to('/admin/products');
  }

  // Delete product
  public function delete($id)
  {
    $this->productModel->delete($id);
    return redirect()->to('/admin/products');
  }
}
