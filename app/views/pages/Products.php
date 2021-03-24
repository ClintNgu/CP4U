<?php include_once APP_ROOT . '/views/includes/header.php'; ?>

<div class="products-container">
  <!-- display products -->
  <?php

  foreach ($data['products'] as $product) {
    echo '<div class="product-div">';
    echo '<a class="link link-primary d-inline-block mt-2"' . 'href="' . URL_ROOT . '/products/' . $product['urlCategory'] . '/' . $product['item_id'] . '">' .
      '<br><img src= ' . $product['image'] . ' alt="item"><br>' . $product['supplier_name'] . ' ' .
      $product['item_name'] . '</a><br>';
    echo '<label>' . '$' . $product['price'] . '.00' . '</label>';
    echo '<button id=' . $product['item_id'] . '><span>Add to Cart </span></button>';
    echo '</div>';
  }
  ?>
</div>
<?php include_once APP_ROOT . '/views/includes/footer.php'; ?>