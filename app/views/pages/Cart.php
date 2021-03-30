<?php include APP_ROOT . '/views/includes/header.php'; ?>
<div class="cart-container">
  <h3>Shopping Cart</h3>
  <hr>

  <div class="cart-items">
    <?php
    //echo '<pre>Cart Items: ';
    //var_dump($data['Cart'] ?? 'No Items in Cart!');
    //echo '</pre>';
    ?>

    <?php
    foreach ($data['Cart'] as $p) : ?>
      <?php [
        'id' => $id, 'name' => $name, 'price' => $price,
        'imgSrc' => $imgSrc, 'quantity' => $quantity,
      ] = $p ?>
      <div class="cart-item d-flex mt-3">
        <img src="<?= $imgSrc ?>">
        <div class="cart-info">
          <h2 class='name'><?= $name ?></h2>
          <p><span>Quantity: <?= $quantity ?></span></p>
          <h4 class='price mt-3'>$<?= $quantity * $price ?>.00</h2>
            <button class="cart-delete-button">Delete</button>
        </div>
      </div>
      <hr>
    <?php endforeach; ?>

  </div>
  <input class="btn btn-danger" id='clearCartBtn' value="Clear Cart" type='submit'>
</div>


<script src='<?= URL_ROOT ?>/js/ajax/cart.js'></script>

<?php include APP_ROOT . '/views/includes/footer.php'; ?>