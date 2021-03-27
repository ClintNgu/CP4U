<?php include APP_ROOT . '/views/includes/header.php'; ?>

<!--If we want to implement a search-->
<div class="search-section">
  <form class="d-flex">
    <input class="search-bar form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
</div>

<div class="main-container">
  <!-- product item -->
  <div class="product-item">
    <?php foreach ($data['products'] as $p) : ?>
      <?php [
        'item_name' => $name, 'image' => $img, 'price' => $price,
        'urlCategory' => $urlCategory, 'item_id' => $id,
      ] = $p ?>
      <a href='<?= URL_ROOT . "/products/$urlCategory/$id" ?>'>
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