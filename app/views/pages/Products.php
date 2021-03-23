<?php include_once APP_ROOT . '/views/includes/header.php'; ?>

<!-- display products -->
<?php 
  foreach ($data['products'] as $product) {
    echo $product['item_id']. ": " . $product['item_name'] . '<br>';
  } 
?>

<?php include_once APP_ROOT . '/views/includes/footer.php'; ?>