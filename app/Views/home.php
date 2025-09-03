<?= $this->extend('Layouts/main') ?>

<?= $this->section('content') ?>
<div class="p-5 mb-4 bg-light rounded-3">
  <div class="container-fluid py-5">
    <h1 class="display-5 fw-bold">Welcome to E-Shop</h1>
    <p class="col-md-8 fs-4">An e-commerce demo app built with CodeIgniter 4 + Bootstrap 5.</p>
    <a class="btn btn-primary btn-lg" href="<?= site_url('products') ?>">Browse Products</a>
  </div>
</div>

<div class="row">
  <?php for ($i = 1; $i <= 3; $i++): ?>
    <div class="col-md-4">
      <div class="card mb-4">
        <img src="https://via.placeholder.com/600x300?text=Product+<?= $i ?>" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Product <?= $i ?></h5>
          <p class="card-text">Short description of product <?= $i ?>.</p>
          <a href="#" class="btn btn-sm btn-outline-primary">Add to Cart</a>
        </div>
      </div>
    </div>
  <?php endfor; ?>
</div>
<?= $this->endSection() ?>
