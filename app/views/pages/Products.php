<?php include APP_ROOT . '/views/includes/header.php'; ?>
<script type='text/javascript' src='<?= URL_ROOT ?>/js/ajax/products.js'></script>

<div class="products-container">
  <div class="d-flex m-auto p-3">
    <h2 class="text-center product-title fw-bolder d-inline-block m-auto"><?= $data['title'] ?></h2>
  </div>
  <!-- sidebar filter -->
  <div class="row ms-4">
    <div class="sidebar col-2 mt-4 px-4 py-3 h-100 bg-dark">
      <?php foreach ($data['sidebar'] as $name => $sub): ?>
        <div class="mt-4">
          <h5 class='text-light border-bottom pb-1 header mb-3'><?= strtoupper($name) ?></h5>
          <?php foreach ($data['sidebar'][$name] as $sub): ?>
          <label class='text-light'>
            <input type="checkbox" value='<?= $sub ?>' class='sidebar-input mb-3'>
            &nbsp;<?= $sub ?>
          </label><br>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
      <input type='submit' name='filterSubmit' class="btn btn-warning w-100 fw-bold my-4" value='Apply Filters'>
    </div>

    <!-- products -->
    <div class="products-item-container col h-100">
      <div class="spinner d-none d-flex justify-content-center align-items-center">
        <div class="spinner-border text-primary" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      <div class="product-item">
        <?php foreach ($data['products'] as $p): ?>
        <?php ['item_name' => $name, 'image' => $img,'price' => $price,
              'urlCategory' => $urlCategory,'item_id' => $id,] = $p ?>
          <a href='<?= URL_ROOT . "/products/$urlCategory/$id" ?>''>
            <div class="item d-flex flex-column align-items-center shadow p-1">
              <img src="<?= $img ?>" class='img mt-auto'>
              <div class="caption d-flex justify-content-between w-100 px-3 pt-5">
                <h6 class='pe-5'><?= $name ?></h6>
                <p>$<?= $price ?></p>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
<?php include APP_ROOT . '/views/includes/footer.php'; ?>