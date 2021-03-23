<?php include_once APP_ROOT . '/views/includes/header.php'; ?>

<!-- display products -->
<?php 
  foreach ($data['products'] as $idx => $product) {
    echo $idx . ': <a 
            class="stretched-link"' . 
            'href="'. URL_ROOT . '/products/product/'. $product['item_id'] . '">' .
              $product['item_name'] .
          '</a> <br>';  
  } 
?>

<?php include_once APP_ROOT . '/views/includes/footer.php'; ?>