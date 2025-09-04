<?= $this->extend('Layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <div class="row">
    <?php foreach ($products as $p): ?>
      <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm">
          <?php if($p['image']): ?>
            <img src="<?= base_url('uploads/products/'.$p['image']) ?>" class="card-img-top" alt="<?= esc($p['name']) ?>">
          <?php else: ?>
            <img src="https://via.placeholder.com/600x400" class="card-img-top">
          <?php endif; ?>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= esc($p['name']) ?></h5>
            <p class="card-text text-success fw-bold">$<?= esc($p['price']) ?></p>
            <p id="product-qty-<?= $p['id'] ?>" class="text-primary small" 
               style="display: <?= isset($cart[$p['id']]) ? 'block' : 'none' ?>;">
              <?= isset($cart[$p['id']]) ? '<strong>In Cart: '.$cart[$p['id']]['quantity'].'</strong>' : '' ?>
            </p>
            <div class="mt-auto">
              <a href="<?= site_url('products/show/'.$p['id']) ?>" class="btn btn-outline-primary btn-sm w-100 mb-2">View</a>
              <button onclick="addToCart(<?= $p['id'] ?>)" class="btn btn-warning btn-sm w-100">Add to Cart</button>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?= $this->endSection() ?>
