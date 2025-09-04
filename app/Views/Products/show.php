<?= $this->extend('Layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-6">
      <?php if($product['image']): ?>
        <img src="<?= base_url('uploads/products/'.$product['image']) ?>" class="img-fluid rounded shadow-sm" alt="<?= esc($product['name']) ?>">
      <?php else: ?>
        <img src="https://via.placeholder.com/600x400" class="img-fluid rounded shadow-sm">
      <?php endif; ?>
    </div>
    <div class="col-md-6">
      <h2><?= esc($product['name']) ?></h2>
      <h4 class="text-success fw-bold">$<?= esc($product['price']) ?></h4>
      <p id="product-qty-<?= $product['id'] ?>" class="text-primary mb-3" 
         style="display: <?= isset($quantity) ? 'block' : 'none' ?>;">
        <?= isset($quantity) ? '<strong>In Cart: </strong>'.$quantity : '' ?>
      </p>
      <button onclick="addToCart(<?= $product['id'] ?>)" class="btn btn-warning btn-lg">Add to Cart</button>
      <a href="<?= site_url('cart') ?>" class="btn btn-outline-dark btn-lg ms-2">Go to Cart</a>
    </div>
  </div>
</div>


<?= $this->endSection() ?>
