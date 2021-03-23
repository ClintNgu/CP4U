<?php include_once APP_ROOT . '/views/includes/header.php'; ?>

<!-- display products -->
<?php 

  foreach ($data['products'] as $product) {
    echo $product['item_id'] . ': <a 
            class="link link-primary d-inline-block mt-2"' . 
            'href="'. URL_ROOT . '/products/'. $product['urlCategory'] .'/'. $product['item_id'] . '">' .
              $product['item_name'] .
          '</a> <br>';  
  } 
?>

<?php include_once APP_ROOT . '/views/includes/footer.php'; ?>