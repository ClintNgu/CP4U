<?php include APP_ROOT . '/views/includes/header.php'; ?>
<div class="products-container">
  <?php if (isset($_SESSION['User']) && (int)$_SESSION['User']['is_admin'] === 1) : ?>
    <div class="text-end mb-4">
      <a href="<?= URL_ROOT ?>/products/add" class="link btn" style='border-radius:0; background:steelblue; color:#fff; font-weight:500; box-shadow: 1px 1px 3px gray'>
        Add Product
      </a>
    </div>
  <?php endif; ?>

  <div class="header-wrapper">
    <div>
      <h2 class="product-title m-0"><?= str_replace('_', ' ', $data['title']) ?></h2>
        <!-- admin delete product msg -->
      <?php if (isset($data['productDeleted'])) : ?>
        <p class='text-success fw-bold h6' style='transform: translateX(-50%);'><?= $data['productDeleted'] ?></p>
      <?php endif; ?>
      
      <!-- profile delete msg -->
      <?php if (isset($data['profileDeleteMsg'])) : ?>
        <p class='text-success fw-bold h6' style='transform: translateX(-50%);'><?= $data['profileDeleteMsg'] ?></p>
      <?php endif; ?>
    </div>
    <input type="text" class="search-box" placeholder="Search..">
  </div>


  <div class="d-flex">
    <!-- sidebar -->
    <div class="sidebar bg-dark">
      <div class="top">
        <?php foreach ($data['sidebar'] as $name => $sub) : ?>
          <div class="mt-4 <?= $name ?>">
            <h5 class='text-light border-bottom pb-1 header mb-3'><?= strtoupper($name) ?></h5>
            <?php foreach ($data['sidebar'][$name] as $sub) : ?>
              <label class='text-light'>
                <input type="checkbox" value='<?= $sub ?>' class='sidebar-input mb-3'>
                &nbsp;<?= $sub ?>
              </label><br>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="end">
        <input type='submit' name='filterSubmit' class="btn btn-warning w-100 mt-2" value='Apply Filters'>
      </div>
    </div>
    <!-- end sidebar  -->

    <!-- products -->
    <div class="products-item-container col h-100">
      <!-- spinner -->
      <div class="spinner d-none d-flex justify-content-center align-items-center">
        <div class="spinner-border text-primary" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      <!-- end spinner -->

      <!-- product item -->
      <div class="product-item">
        <?php foreach ($data['products'] as $p) : ?>
          <?php [
            'item_name' => $name, 'image' => $img, 'price' => $price,
            'urlCategory' => $urlCategory, 'item_id' => $id,
          ] = $p ?>
          <a href='<?= URL_ROOT . "/products/$urlCategory/$id" ?>' class='item-wrapper d-none'>
            <div class="item d-flex flex-column align-items-center shadow p-1">
              <img src="<?= $img ?>" class=' img mt-auto'>
              <div class="caption d-flex justify-content-between w-100 px-3 pt-5">
                <h6 class='pe-5'><?= $name ?></h6>
                <p>$<?= $price ?></p>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
      <div class="text-center mt-5">
        <button class="btn loadMoreBtn btn-primary">Load More</button>
      </div>

    </div>
    <!-- end product item -->
  </div>
</div>

<!-- ajax -->
<script src='<?= URL_ROOT ?>/js/ajax/products.js'></script>
<?php include APP_ROOT . '/views/includes/footer.php'; ?>