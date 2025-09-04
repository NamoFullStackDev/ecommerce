<?= $this->extend('Layouts/main') ?>
<?= $this->section('content') ?>

<div class="row">
  <div class="col-md-6">
    <?php if($product['image']): ?>
    <img src="<?= base_url('uploads/products/'.$product['image']) ?>" class="img-fluid">
    <?php else: ?>
    <img src="https://via.placeholder.com/600x400" class="img-fluid">
    <?php endif; ?>
  </div>
  <div class="col-md-6">
    <h2><?= esc($product['name']) ?></h2>
    <p><?= esc($product['description']) ?></p>
    <h4>$<?= esc($product['price']) ?></h4>
  </div>
</div>

<?= $this->endSection() ?>
