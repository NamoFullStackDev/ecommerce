<?= $this->extend('Layouts/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Manage Products</h2>
  <a href="<?= site_url('admin/products/new') ?>" class="btn btn-primary">Add Product</a>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Price</th>
      <th>Image</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $p): ?>
      <tr>
        <td><?= $p['id'] ?></td>
        <td><?= esc($p['name']) ?></td>
        <td>$<?= esc($p['price']) ?></td>
        <td>
          <?php if ($p['image']): ?>
            <img src="<?= base_url('uploads/products/'.$p['image']) ?>" width="80">
          <?php endif; ?>
        </td>
        <td>
          <a href="<?= site_url('admin/products/delete/'.$p['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?')">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?= $this->endSection() ?>
