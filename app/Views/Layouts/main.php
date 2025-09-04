<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'E-Shop') ?></title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="<?= site_url() ?>">E-Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="<?= site_url('products') ?>">Products</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('cart') ?>">Cart</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('admin') ?>">Admin</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <?= $this->renderSection('content') ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const BASE_URL = "<?= base_url() ?>"; // cleaner than site_url()
</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="<?= base_url('js/cart.js') ?>"></script>
</body>
</html>
