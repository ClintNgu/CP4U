<?php include APP_ROOT . '/views/includes/header.php'; ?>
<div class="cart-container">
  <h2 class='title text-center'>Cart</h2>
  <div class="cart-items mt-5">
    <?php if (!isset($data['Cart']) || empty($data['Cart'])) : ?>
      <h4 class='text-center'>No Items in Cart</h4>
    <?php else : ?>
      <?php
      $subtotal = 0;
      foreach ($data['Cart'] as $idx => $cartItem) :
        ['imgSrc' => $img, 'name' => $name, 'price' => $price, 'quantity' => $quan,] = $cartItem;
        $subtotal += (int)$price;
      ?>
        <div class="row">
          <div class="col-2 text-center">
            <img src="<?= $img ?>">
          </div>
          <div class="col">
            <h6 class='text-muted'>Name</h6>
            <h6 class='name'><?= $name ?></h6>
          </div>
          <div class="col-2">
            <h6 class='text-muted'>Quantity</h6>
            <h6 class='name'><?= $quan ?></h6>
          </div>
          <div class="col-2 text-end">
            <h6 class='text-muted'>Price</h6>
            <h6 class='name'>$<?= $quan * $price ?>.00</h6>
          </div>
          <div class="col text-end">
            <input class="btn btn-secondary btn-sm remove-btn" value="Remove" data-idx='<?= $idx ?>' type='submit' />
          </div>
          <hr class='mt-3'>
        </div>
      <?php endforeach; ?>
      <div class="w-50 text-end ms-auto price-container">
        <div class="row mb-2">
          <div class="col fs-6 text-muted">Subtotal: </div>
          <div class="col-3 text-muted">$<?= $subtotal * $quan ?>.00</div>
        </div>
        <div class="row mb-2">
          <div class="col fs-6 text-muted">Tax: </div>
          <div class="col-3 text-muted">$<?= number_format($subtotal * $quan * .15, 2) ?></div>
        </div>
        <div class="row mb-2">
          <div class="col fs-6 fw-bold">Grand Total: </div>
          <div class="col-3 fs-5 fw-bolder">$<?= number_format($subtotal * $quan * 1.15, 2) ?></div>
        </div>
      </div>
      <div class="w-100 mt-4 text-end">
        <a class="btn btn-primary fw-bold px-5 py-3" href="<?= URL_ROOT ?>/Checkout">Checkout</a>
      </div>
    <?php endif; ?>
  </div>
</div>

<script src='<?= URL_ROOT ?>/js/ajax/cart.js'></script>
<?php include APP_ROOT . '/views/includes/footer.php'; ?>