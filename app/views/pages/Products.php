<?php include APP_ROOT . '/views/includes/header.php'; ?>
<script type='text/javascript' src='<?= URL_ROOT ?>/js/ajax/products.js'></script>

<div class="products-container">
  <!-- sidebar filter -->
  <div class="row">
    <div class="sidebar col-2 px-4 bg-dark">
      <?php foreach ($data['sidebar'] as $name => $sub): ?>
        <div class="mt-4">
          <h6 class='text-light border-bottom pb-1 header'><?= strtoupper($name) ?></h6>
          <?php foreach ($data['sidebar'][$name] as $sub): ?>
          <label class='text-light'>
            <input type="checkbox" value='<?= $sub ?>' class='sidebar-input mb-3'>
            &nbsp;<?= $sub ?>
          </label><br>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
      <input type='submit' name='filterSubmit' class="btn btn-warning w-100 fw-bold" value='Apply Filters'>
    </div>

    <!-- products -->
    <div class="product-items col h-100 px5 pt-3">
      <?php foreach ($data['products'] as
        [
        'item_name' => $name, 
        'image' => $img,
        'price' => $price,

        ]): ?>
        <div class="item">
          <h6><?= $name ?></h6>
          <img src='<?= $img ?>'>
          <p>$<?= $price ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?php include APP_ROOT . '/views/includes/footer.php'; ?>