<?php include APP_ROOT . '/views/includes/header.php'; ?>
<?php [
  'item_id' => $id, 
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
  <input type="text" id="itemId" value="<?= $id ?>" hidden>

  <nav class='breadcrumb-container'>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= URL_ROOT ?>/products">Products</a></li>
      <li class="breadcrumb-item"><a href="<?= URL_ROOT ?>/products/<?= $urlCat ?>"><?= $urlCat ?></a></li>
      <li class="breadcrumb-item active"><?= $name ?></li>
    </ol>
  </nav>

  <div class="product-item d-flex justify-content-center mt-4">
    <div class="img-container d-flex align-items-center justify-content-center">
      <img src="<?= $imgSrc ?>" width=400>
    </div>
    <div class="descript-container ms-5">
      <div class="descript-head">
        <h2 class='name'><?= $name ?></h2>
        <h4 class='price mt-3'>$<?= $price ?>.00</h2>
      </div>
      <hr class="mx-2">
      <div class="descript-body pe-5">
        <span>In Stock: </span><p class='remain'><?= $remain ?></p><br>
        <span>Brand: </span><p class='brand'><?= $supplier ?></p><br>
        <span>Category: </span><p class='cat'><?= $cat ?></p><br>
        <span>Description: </span><p class='descript'><?= $descript ?></p><br>
      </div>
      <div class="quan-container">
        <p><span>Quantity: </span></p>
        <div class="d-flex align-items-center justify-content-between count-container">
          <div class="btn m-0 minus"><i class="fas fa-minus"></i></div>
          <div class="quan h5 mb-1">1</div>
          <div class="btn m-0 plus"><i class="fas fa-plus"></i></div>
        </div>
      </div>
        
      <div class="btn-container w-100">
        <input type="submit" name='cartSubmit' class="btn" value="Add to Cart">
      </div>
    </div>
  </div>

</div>

<script src='<?= URL_ROOT ?>/js/ajax/product.js'></script>

<?php include APP_ROOT . '/views/includes/footer.php'; ?>