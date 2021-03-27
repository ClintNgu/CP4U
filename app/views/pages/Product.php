<?php include APP_ROOT . '/views/includes/header.php'; ?>
<?php //echo '<pre>';
//var_dump($data);
//echo '</pre>';

$product = $data['product'];
$item_id = $product['item_id'];
$quantity = $product['quantity'];

if (isset($_SESSION['User'])) {
  $user = $_SESSION['User'];
  $user_id = $user['user_id'];
}
?>
<div class="product-container">
  <div class="product-left-div">
    <img src="<?= $product['image']; ?>">
  </div>
  <div class="product-right-div">
    <h3><?= $data['title']; ?></h3>
    <p class="description-p"><?= $product['description']; ?></p>
    <div class="brand-div">
      <p>Brand: <?= $product['supplier_name']; ?></p>
    </div>
    <div class="category-div">
      <p>Category: <?= $product['category']; ?></p>
    </div>
    <h4><?= '$' . $product['price'] . '.00'; ?></h4>
    <label>Quantity:<span><?= $quantity; ?></span></label>
    <br>
    <button type="submit" name='addToCartSubmit' id="<?= $item_id; ?>"><span>Add to Cart </span></button>
  </div>
</div>


<?php include APP_ROOT . '/views/includes/footer.php'; ?>