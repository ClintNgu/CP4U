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
  <nav class='breadcrumb-container mb-4'>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= URL_ROOT ?>/products">Products</a></li>
      <li class="breadcrumb-item"><a href="<?= URL_ROOT ?>/products/<?= $urlCat ?>"><?= $urlCat ?></a></li>
      <li class="breadcrumb-item active"><?= $name ?></li>
    </ol>
  </nav>
  <?php if(isset($_SESSION['User']) && (int)$_SESSION['User']['is_admin'] === 1): ?>
    <form method="post" class='d-flex'>
    <input hidden name='id' value='<?= $id ?>'/>
      <div class="w-50 ms-auto p-4" style="border:1.5px solid #dedede; box-shadow: 1px 1px 6px #dedede;">
      <h4 class='fw-bold mb-3'>Edit Product</h4>
        <div class='mb-3'>
          <label class="form-label">Product Name</label>
          <input type="text" name='name' class="form-control" value='<?=$name?>'>  
        </div>
        <div class='mb-3'>
          <label class="form-label">Product Description</label>
          <input type="text" name='descript' class="form-control" value='<?=$descript?>'>  
        </div>
        <div class='mb-3'>
          <label class="form-label">Product Image</label>
          <input type="text" name='imgSrc' class="form-control" value='<?=$imgSrc?>'>  
        </div>
        <div class='d-flex mb-3'>
          <div class='w-100'>
            <label class="form-label">Product Price</label>
            <input type="text" name='price' class="form-control" value='<?=$price?>'>
          </div>
          <div class='w-100 ms-4'>
            <label class="form-label">Product Quantity</label>
            <input type="text" name='quantity' class="form-control" value='<?=$remain?>'> 
          </div>
        </div>
        <div class='mb-3 d-flex'>
          <div class="w-100">
          <label class="form-label">Product Brand</label>
            <select class='form-select' name='supplier'>
              <option <?= $supplier === 'AMD' ? 'selected' : '' ?> value="AMD">AMD</option>
              <option <?= $supplier === 'Intel' ? 'selected' : '' ?> value="Intel">Intel</option>
              <option <?= $supplier === 'ASUS' ? 'selected' : '' ?> value="ASUS">ASUS</option>
              <option <?= $supplier === 'GIGABYTE' ? 'selected' : '' ?> value="GIGABYTE">GIGABYTE</option>
              <option <?= $supplier === 'MSI' ? 'selected' : '' ?> value="MSI">MSI</option>
              <option <?= $supplier === 'ASRock' ? 'selected' : '' ?> value="ASRock">ASRock</option>
              <option <?= $supplier === 'G.Skill' ? 'selected' : '' ?> value="G.Skill">G.Skill</option>
              <option <?= $supplier === 'SAMSUNG' ? 'selected' : '' ?> value="SAMSUNG">SAMSUNG</option>
              <option <?= $supplier === 'EVGA' ? 'selected' : '' ?> value="EVGA">EVGA</option>
              <option <?= $supplier === 'CORSAIR' ? 'selected' : '' ?> value="CORSAIR">CORSAIR</option>
              <option <?= $supplier === 'Noctua' ? 'selected' : '' ?> value="Noctua">Noctua</option>
            </select>
          </div>
          <div class="w-100 ms-4">
            <label class="form-label">Product Category</label>
            <select class='form-select' name='category'>
              <option <?= $cat === 'CPU' ? 'selected' : '' ?> value="CPU">CPU</option>
              <option <?= $cat === 'Motherboard' ? 'selected' : '' ?> value="Motherboard">Motherboard</option>
              <option <?= $cat === 'Graphics Card' ? 'selected' : '' ?> value="Graphics Card">Graphics Card</option>
              <option <?= $cat === 'RAM' ? 'selected' : '' ?> value="RAM">RAM</option>
              <option <?= $cat === 'Power Supply' ? 'selected' : '' ?> value="Power Supply">Power Supply</option>
              <option <?= $cat === 'CPU Cooler' ? 'selected' : '' ?> value="CPU Cooler">CPU Cooler</option>
              <option <?= $cat === 'PC Case' ? 'selected' : '' ?> value="PC Case">PC Case</option>
            </select>   
          </div>
        </div>
        <input type="submit" class="btn btn-warning w-100 fw-bold" name='updateBtn' value='Update'>
        <input type="submit" class="btn btn-danger w-100 fw-bold mt-1" name='deleteBtn' value='Delete'>
      </div>
      <div class="w-25 h-100 d-flex p-4 m-auto" style='border:1.7px solid lightgray; box-shadow: 2px 2px 8px #bbb;'>
        <div class="descript-container">
          <h5 class='fw-bold'><u>- Preview -</u></h5>
          <div class="descript-head d-flex mt-3">
          <div>
            <h6><?= $name ?></h6>
            <h6>$<?= $price ?>.00</h6>
          </div>
          <img src="<?= $imgSrc ?>" width=100 height=100 class='ms-auto'>
          </div>
          <hr class='d-block m-4 mx-3'>
          <div>
            <span class='fw-bold'>In Stock: </span><span class='mb-1 p-0'><?= $remain ?></span><br>
            <span class='fw-bold'>Brand: </span><span class='mb-1 p-0'><?= $supplier ?></span><br>
            <span class='fw-bold'>Category: </span><span class='mb-1 p-0'><?= $cat ?></span><br>
            <span class='fw-bold'>Description: </span><span class='mb-1 p-0'><?= $descript ?></span><br>
          </div>
      </div>
    </form>
  <?php else: ?>
    <form action="<?= URL_ROOT ?>/Cart" method='POST'>
      <input hidden name='id' value='<?= $id ?>'/>
      <input hidden name='name' value='<?= $name ?>'/>
      <input hidden name='price' value='<?= $price ?>'/>
      <input hidden name='imgSrc' value='<?= $imgSrc ?>'/>
      <input hidden name='quantity' value='1'/>

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
            <p class='descript pe-3'><span>Description: </span><?= $descript ?></p><br>
          </div>
          <div class="quan-container">
            <p><span>Quantity: </span></p>
            <div class="d-flex align-items-center justify-content-between count-container">
              <div class="btn m-0 minus"><i class="fas fa-minus"></i></div>
              <div class="quantityDiv h5 mb-1">1</div>
              <div class="btn m-0 plus"><i class="fas fa-plus"></i></div>
            </div>
          </div>
            
          <div class="btn-container w-100">
            <input type="submit" name='cartSubmit' class="btn btn-warning" value="Add to Cart">
          </div>
        </div>
      </div>
    </form>
  <?php endif; ?>

</div>

<script src='<?= URL_ROOT ?>/js/ajax/product.js'></script>

<?php include APP_ROOT . '/views/includes/footer.php'; ?>