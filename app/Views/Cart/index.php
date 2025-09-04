<?= $this->extend('Layouts/main') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
  <h2 class="mb-4">My Cart</h2>

  <?php if ($cart): ?>
    <div class="row">
      <div class="col-md-8">
        <?php $grandTotal = 0; foreach ($cart as $item): 
              $total = $item['price'] * $item['quantity']; 
              $grandTotal += $total; ?>
          <div class="card mb-3 shadow-sm" id="row-<?= $item['id'] ?>">
            <div class="row g-0 align-items-center">
              <div class="col-md-3 text-center">
                <img src="https://via.placeholder.com/200x150" class="img-fluid rounded-start" alt="<?= esc($item['name']) ?>">
              </div>
              <div class="col-md-9">
                <div class="card-body">
                  <h5 class="card-title"><?= esc($item['name']) ?></h5>
                  <p class="card-text text-success fw-bold">$<?= $item['price'] ?></p>
                  
                  <div class="d-flex align-items-center mb-2">
                    <button class="btn btn-outline-secondary btn-sm" onclick="updateCart(<?= $item['id'] ?>,'minus')">-</button>
                    <span id="qty-<?= $item['id'] ?>" class="mx-2"><strong><?= $item['quantity'] ?></strong></span>
                    <button class="btn btn-outline-secondary btn-sm" onclick="updateCart(<?= $item['id'] ?>,'plus')">+</button>
                  </div>

                  <p class="fw-bold">Total: $<span id="total-<?= $item['id'] ?>"><?= $total ?></span></p>
                  <button class="btn btn-sm btn-danger" onclick="updateCart(<?= $item['id'] ?>,'remove')">Remove</button>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Cart Summary -->
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h4 class="card-title">Price Details</h4>
            <hr>
            <p class="d-flex justify-content-between">
              <span>Subtotal</span> 
              <span>$<span id="cart-subtotal"><?= $subTotal ?></span></span>
            </p>
            <p class="d-flex justify-content-between">
              <span>Delivery</span> <span class="text-success">Free</span>
            </p>
            <hr>
            <h5 class="d-flex justify-content-between">
              <span>Total</span> 
              <span>$<span id="grand-total"><?= $grandTotal ?></span></span>
            </h5>
            <a href="<?= site_url('checkout') ?>" class="btn btn-warning w-100 mt-3">Proceed to Checkout</a>
          </div>
        </div>
      </div>
    </div>
  <?php else: ?>
    <p>Your cart is empty. <a href="<?= site_url('products') ?>">Shop now</a></p>
  <?php endif; ?>
</div>
<?= $this->endSection() ?>