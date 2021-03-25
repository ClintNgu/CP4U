<?php include_once APP_ROOT . '/views/includes/header.php'; ?>
<script type='text/javascript' src='<?= URL_ROOT ?>/js/ajax/products.js'></script>

<div class="main-container-div">

  <!-- <div class="products-container">
    display products
    <?php
    // foreach ($data['products'] as $product) {
    //   echo '<div class="product-div">';
    //   echo '<a class="link link-primary d-inline-block mt-2"' . 'href="' . URL_ROOT . '/products/' . $product['urlCategory'] . '/' . $product['item_id'] . '">' .
    //     '<br><img src= ' . $product['image'] . ' alt="item"><br>' . $product['supplier_name'] . ' ' .
    //     $product['item_name'] . '</a><br>';
    //   echo '<label>' . '$' . $product['price'] . '.00' . '</label>';
    //   echo '<button id=' . $product['item_id'] . '><span>Add to Cart </span></button>';
    //   echo '</div>';
    // }
    ?>
</div> -->


  <!-- sidebar filter -->
  <div class="sidebar col-2 bg-dark h-100 p-3">
    <?php foreach ($data['sidebar'] as $name => $sub): ?>
      <div class="mb-4">
        <h6 class='text-light border-bottom pb-1 fw-bold'><?= strtoupper($name) ?></h6>
        <?php foreach ($data['sidebar'][$name] as $sub): ?>
        <label class='text-light'>
          <input type="checkbox" value='<?= $sub ?>' class='sidebar-input'>
          &nbsp;<?= $sub ?>
        </label><br>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>
    <input type='submit' name='filterSubmit' class="btn btn-warning w-100 fw-bold" value='Apply Filters'>
  </div>

  
</div>
<?php include_once APP_ROOT . '/views/includes/footer.php'; ?>