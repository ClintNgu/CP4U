<?php include APP_ROOT . "/views/includes/header.php"; ?>

<div class="container">
  <div class="summary-section-div">
    <div><i class="fas fa-shopping-cart"></i><span id="cart-number"><?= isset($_SESSION["Cart"]) ? count($_SESSION["Cart"]) : 0 ?></span>
    </div>
    <h4 class="mb-3">Summary</h4>
  </div>
  <hr>
  <div class="products-section-div">
    <div class="checkout-items mt-5">
      <?php
      $subtotal = 0;
      foreach ($data["Cart"] as $idx => $cartItem) :
        ["imgSrc" => $img, "name" => $name, "price" => $price, "quantity" => $quan,] = $cartItem;
        $subtotal += (int)$price;
      ?>
        <div class="item-description d-flex">
          <div class="text-center">
            <img src="<?= $img ?>">
          </div>
          <div>
            <h6 class="name"><?= $quan ?> x <?= $name ?></h6>
            <h6 class="name">$<?= $quan * $price ?>.00</h6>
          </div>
          <hr class="mt-3">
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <hr>
  <div class="w-50 text-end ms-auto">
    <div class="row mb-2">
      <div class="col fs-6 text-muted">Subtotal: </div>
      <div class="col-4 text-muted">$<?= $subtotal ?>.00</div>
    </div>
    <div class="row mb-2">
      <div class="col fs-6 text-muted">Tax: </div>
      <div class="col-4 text-muted">$<?= number_format($subtotal * .15, 2) ?></div>
    </div>
    <div class="row mb-2">
      <div class="col fs-5 fw-bold">Grand Total: </div>
      <div class="col-4 fs-5 fw-bold">$<?= number_format($subtotal * 1.15, 2) ?></div>
    </div>
  </div>
  <button type="submit" class="submit-button p-2 w-100 d-block mt-4 btn btn-dark"><span>Checkout</span></button>
</div>

<?php include APP_ROOT . "/views/includes/footer.php"; ?>