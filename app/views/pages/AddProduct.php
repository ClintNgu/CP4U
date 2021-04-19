<?php include APP_ROOT . '/views/includes/header.php'; ?>

<div class="add-container">
  <div class="wrapper">
    <div>
      <h4 class='d-inline' style='font-weight: 900;'>Add Product</h4>
      <span class='<?= $data['textColor'] ?? '' ?> ms-2'><?= $data['msg'] ?? '' ?></span>
    </div>
    <form method='post' class='mt-4'>
      <input type="text" class="input form-control" placeholder="Name" name="name" value='<?= $_POST['name'] ?? '' ?>'>
      <input type="text" class="input form-control mt-2" placeholder="Description" name="descript" value='<?= $_POST['descript'] ?? '' ?>'>
      <input type="text" class="input form-control mt-2" placeholder="ImageUrl" name="imgSrc" value='<?= $_POST['imgSrc'] ?? '' ?>'>
      <input type="text" class="input form-control mt-2" placeholder="Price" name="price" value='<?= $_POST['price'] ?? '' ?>'>
      <div class="d-flex mt-2">
        <select class='form-select w-50' name='supplier'>
          <option value=''>- Choose Brand -</option>
          <option <?= isset($_POST['supplier']) && $_POST['supplier'] === 'AMD' ? 'selected' : '' ?> value="AMD">AMD</option>
          <option <?= isset($_POST['supplier']) && $_POST['supplier'] === 'Intel' ? 'selected' : '' ?> value="Intel">Intel</option>
          <option <?= isset($_POST['supplier']) && $_POST['supplier'] === 'ASUS' ? 'selected' : '' ?> value="ASUS">ASUS</option>
          <option <?= isset($_POST['supplier']) && $_POST['supplier'] === 'GIGABYTE' ? 'selected' : '' ?> value="GIGABYTE">GIGABYTE</option>
          <option <?= isset($_POST['supplier']) && $_POST['supplier'] === 'MSI' ? 'selected' : '' ?> value="MSI">MSI</option>
          <option <?= isset($_POST['supplier']) && $_POST['supplier'] === 'ASRock' ? 'selected' : '' ?> value="ASRock">ASRock</option>
          <option <?= isset($_POST['supplier']) && $_POST['supplier'] === 'G.Skill' ? 'selected' : '' ?> value="G.Skill">G.Skill</option>
          <option <?= isset($_POST['supplier']) && $_POST['supplier'] === 'SAMSUNG' ? 'selected' : '' ?> value="SAMSUNG">SAMSUNG</option>
          <option <?= isset($_POST['supplier']) && $_POST['supplier'] === 'EVGA' ? 'selected' : '' ?> value="EVGA">EVGA</option>
          <option <?= isset($_POST['supplier']) && $_POST['supplier'] === 'CORSAIR' ? 'selected' : '' ?> value="CORSAIR">CORSAIR</option>
          <option <?= isset($_POST['supplier']) && $_POST['supplier'] === 'Noctua' ? 'selected' : '' ?> value="Noctua">Noctua</option>
        </select>
        <select class='form-select w-50 ms-4' name='category'>
          <option value=''>- Choose Category -</option>
          <option <?= isset($_POST['category']) && $_POST['category'] === 'CPU' ? 'selected' : '' ?> value="CPU">CPU</option>
          <option <?= isset($_POST['category']) && $_POST['category'] === 'Motherboard' ? 'selected' : '' ?> value="Motherboard">Motherboard</option>
          <option <?= isset($_POST['category']) && $_POST['category'] === 'Graphics Card' ? 'selected' : '' ?> value="Graphics Card">Graphics Card</option>
          <option <?= isset($_POST['category']) && $_POST['category'] === 'RAM' ? 'selected' : '' ?> value="RAM">RAM</option>
          <option <?= isset($_POST['category']) && $_POST['category'] === 'M.2' ? 'selected' : '' ?> value="M.2">Storage</option>
          <option <?= isset($_POST['category']) && $_POST['category'] === 'Power Supply' ? 'selected' : '' ?> value="Power Supply">Power Supply</option>
          <option <?= isset($_POST['category']) && $_POST['category'] === 'CPU Cooler' ? 'selected' : '' ?> value="CPU Cooler">CPU Cooler</option>
          <option <?= isset($_POST['category']) && $_POST['category'] === 'PC Case' ? 'selected' : '' ?> value="PC Case">PC Case</option>
        </select>
      </div>
      <hr>
      <input type="submit" name='addProductBtn' value='Add' class='btn d-block w-100'>
    </form>
  </div>

</div>

<?php include APP_ROOT . '/views/includes/footer.php'; ?>