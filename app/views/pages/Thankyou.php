<?php include APP_ROOT . "/views/includes/header.php"; ?>

<div class="thanks-container">
  <div class="wrapper d-flex w-100">
    <div class='d-flex m-auto w-50'>
      <div style='border:2px solid #111; border-radius:50%; width:4rem; height:4rem; display:grid; place-items:center;'>
        <i class="fas fa-check" style='font-size: 2.5rem; color:#111;'></i>
      </div>
      <div class="ms-3">
        <h4 style='font-weight:900; font-size:1.4rem;'>Thank You <?= ucfirst($_POST['fname']) ?>,</h4>
        <h6 style='font-weight:500; font-size:1rem; margin: 0;'>Your order has been received!</h4>
          <a href="<?= URL_ROOT ?>/products" class="btn">Continue Shopping</a>
      </div>
    </div>
    <div class="image"></div>
  </div>
</div>

<?php include APP_ROOT . "/views/includes/footer.php"; ?>