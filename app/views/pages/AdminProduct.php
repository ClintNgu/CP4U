<?php include APP_ROOT . "/views/includes/header.php"; ?>
<?php //echo "<pre>";
//var_dump($data);
//echo "</pre>";

[
  "item_id" => $id,
  "item_name" => $name,
  "image" => $imgSrc,
  "description" => $descript,
  "price" => $price,
  "quantity" => $remain,
  "supplier_name" => $supplier,
  "urlCategory" => $urlCat,
  "category" => $cat
] = $data["product"];
?>

<form method="post">
  <div class="container">
    <label class="form-label">Item ID</label>
    <input type="text" class="input form-control mt-2" name="item_id" value="<?= $id ?>" disabled>
    <br>

    <label class="form-label">Item Name</label>
    <input type="text" class="input form-control mt-2" name="item_name" value="<?= $name ?>">
    <br>

    <label class="form-label">Image</label>
    <input type="text" class="input form-control mt-2" name="image" value="<?= $imgSrc ?>">
    <br>

    <label class="form-label">Description</label>
    <input type="text" class="input form-control mt-2" name="description" value="<?= $descript ?>">
    <br>

    <label class="form-label">Price</label>
    <input type="text" class="input form-control mt-2" name="price" value="<?= $price ?>">
    <br>

    <label class="form-label">Quantity</label>
    <input type="text" class="input form-control mt-2" name="qunatity" value="<?= $remain ?>">
    <br>

    <label class="form-label">Supplier Name</label>
    <input type="text" class="input form-control mt-2" name="supplier_name" value="<?= $supplier ?>">
    <br>

    <label class="form-label">Category</label>
    <input type="text" class="input form-control mt-2" name="category" value="<?= $cat ?>">
    <br>
    <button type="submit" name="updateItemSubmit" class="update-button p-2 w-100 mt-4"><span>Update Info</span></button>
    <button type="submit" name="deleteItemSubmit" class="delete-button p-2 w-100 mt-4"><span>Delete</span></button>
  </div>
</form>

<?php include APP_ROOT . "/views/includes/footer.php"; ?>