<?php include_once APP_ROOT . '/views/includes/header.php'; ?>
<?php echo '<pre>';
var_dump($data);
echo '</pre>';
?>
<div class="product-container">
  <div class="product-left-div">
    <img width="350" height="350">
  </div>
  <div class="product-right-div">
    <h3>Item Name</h3>
    <p>Item Discription</p>
    <h4>Item Price</h4>
    <label>Quantity: <span>0</span></label>
    <button><span>Add to Cart </span></button>
  </div>
</div>


<?php include_once APP_ROOT . '/views/includes/footer.php'; ?>