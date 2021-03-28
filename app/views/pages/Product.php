<?php include APP_ROOT . '/views/includes/header.php'; ?>
<?php [
  'item_name' => $name, 
  'image' => $imgSrc, 
  'description' => $descript, 
  'price' => $price, 
  'quantity' => $remain, 
  'supplier_name' => $supplier, 
  'urlCategory' => $urlCat, 
  'category' => $cat] = $data['product'];
?>

<div class="product-container">
  <nav class='breadcrumb-container'>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= URL_ROOT ?>/products">Products</a></li>
      <li class="breadcrumb-item"><a href="<?= URL_ROOT ?>/products/<?= $urlCat ?>"><?= $urlCat ?></a></li>
      <li class="breadcrumb-item active"><?= $name ?></li>
    </ol>
  </nav>

  <div class="product-item d-flex justify-content-center mt-4">
    <div class="img-container">
      <img src="<?= $imgSrc ?>" width=350>
    </div>
    <div class="descript-container ms-5">
      <div class="descript-head">
        <h2 class='name'><?= $name ?></h2>
        <h4 class='price mt-3'>$<?= $price ?>.00</h2>
      </div>
      <hr class="mx-2">
      <div class="descript-body pe-5">
        <p class='remain'><span>In Stock: </span><?= $remain ?></p>
        <p class='brand'><span>Brand: </span><?= $supplier ?></p>
        <p class='cat'><span>Category: </span><?= $cat ?></p>
        <p class='descript'><span>Description: </span><?= $descript ?></p>
      </div>
      <div class="btn-container w-100">
        <button class="btn">Add to Cart</button>
      </div>
    </div>
  </div>

</div>


<?php include APP_ROOT . '/views/includes/footer.php'; ?>