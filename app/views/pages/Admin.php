<?php include APP_ROOT . '/views/includes/header.php'; ?>

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