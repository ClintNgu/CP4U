<?php include APP_ROOT . '/views/includes/header.php'; ?>
<script type='text/javascript' src='<?= URL_ROOT ?>/js/product.js'></script>
<?php //echo '<pre>';
//var_dump($data);
//echo '</pre>';
$product = $data['product'];
$title = $data['title'];
$supplier = $product['supplier_name'];
$id = $product['item_id'];
$image = $product['image'];
$description = $product['description'];
$price = $product['price'];
$quantity = $product['quantity'];
$category = $product['category'];
?>
<div class="product-container">

  <div class="btn-scroll-up d-flex align-items-center justify-content-center">
    <i class="fas fa-arrow-up fs-5"></i>
  </div>

  <div class="product-left-div">
    <img src="<?= $image; ?>">
  </div>
  <div class="product-right-div">
    <h3><?= $title; ?></h3>
    <p class="description-p"><?= $description; ?></p>
    <div class="brand-div">
      <p>Brand: <?= $supplier; ?></p>
    </div>
    <div class="category-div">
      <p>Category: <?= $category; ?></p>
    </div>
    <h4><?= '$' . $price . '.00'; ?></h4>
    <label>Quantity:<span><?= $quantity; ?></span></label>
    <br>
    <button id="<?= $id; ?>"><span>Add to Cart </span></button>
  </div>
</div>


<?php include APP_ROOT . '/views/includes/footer.php'; ?>