<?php include APP_ROOT . '/views/includes/header.php'; ?>
<?php //echo '<pre>';
//var_dump($data);
//echo '</pre>';
$product = $data['product'];
?>

<div class="container">
  <label class="form-label">Item Name</label>
  <input type="text" class="input form-control mt-2" name="item_name">
  <br>

  <label class="form-label">Image</label>
  <input type="text" class="input form-control mt-2" name="image">
  <br>

  <label class="form-label">Description</label>
  <input type="text" class="input form-control mt-2" name="description">
  <br>

  <label class="form-label">Price</label>
  <input type="text" class="input form-control mt-2" name="price">
  <br>

  <label class="form-label">Quantity</label>
  <input type="text" class="input form-control mt-2" name="qunatity">
  <br>

  <label class="form-label">Supplier Name</label>
  <input type="text" class="input form-control mt-2" name="supplier_name">
  <br>

  <label class="form-label">Category</label>
  <input type="text" class="input form-control mt-2" name="category">
  <br>
  <button type='submit' name='updateItemSubmit' class='update-button p-2 w-100 mt-4'><span>Update Info</span></button>
  <button type='submit' name='deleteItemSubmit' class='delete-button p-2 w-100 mt-4'><span>Delete</span></button>
</div>

<?php include APP_ROOT . '/views/includes/footer.php'; ?>