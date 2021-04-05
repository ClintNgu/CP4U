<?php include APP_ROOT . '/views/includes/header.php'; ?>

<!--If we want to implement a search-->
<form method="post" class="search-section d-flex">
  <input type="text" class="search-box" placeholder="Search..">
</form>

<a href="<?= URL_ROOT . "/additem" ?>" class="add-item-button p-2 d-block mt-4 btn btn-dark"><span>Add New Item</span></a>
<div class="main-container">
  <!-- product item -->
  <div class="admin-product-item">
    <?php foreach ($data['products'] as $p) : ?>
      <?php ['item_name' => $name, 'image' => $img, 'price' => $price, 'urlCategory' => $urlCategory, 'item_id' => $id] = $p ?>
      <a href='<?= URL_ROOT . "/admin/$urlCategory/$id" ?>'>
        <div class="item-info">
          <img src="<?= $img ?>" class=' img mt-auto'>
          <h6 class='pe-5'><?= $name ?></h6>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
</div>

<!-- end product item -->
<?php include APP_ROOT . '/views/includes/footer.php'; ?>