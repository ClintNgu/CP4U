<?php include APP_ROOT . '/views/includes/header.php'; ?>

<div class="cart-container">
  <div class="cart-items">
    <?php
      echo '<pre>Cart Items: ';
      var_dump($data['Cart'] ?? 'No Items in Cart!');
      echo '</pre>';
    ?>
  </div>
  
  <input class="btn btn-danger" id='clearCartBtn' value="Clear Cart" type='submit'>
</div>


<script src='<?= URL_ROOT ?>/js/ajax/cart.js'></script>

<?php include APP_ROOT . '/views/includes/footer.php'; ?>