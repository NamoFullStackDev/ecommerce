<?= $this->extend('Layouts/main') ?>
<?= $this->section('content') ?>

<h2>Add Product</h2>

<form action="<?= site_url('admin/products/create') ?>" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control"></textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">Price</label>
    <input type="number" name="price" step="0.01" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
  </div>

  <button type="submit" class="btn btn-success">Save</button>
</form>

<?= $this->endSection() ?>
