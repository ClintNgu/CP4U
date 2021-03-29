<?php include APP_ROOT . '/views/includes/header.php'; ?>

<form method="post">
  <div class="container">
    <label class="form-label">Item Name</label>
    <input type="text" class="input form-control mt-2" name="item_name" value="<?= $data['item_name'] ?? '' ?>">
    <br>

    <label class="form-label">Image</label>
    <input type="text" class="input form-control mt-2" name="image" value="<?= $data['image'] ?? '' ?>">
    <br>

    <label class="form-label">Description</label>
    <input type="text" class="input form-control mt-2" name="description" value="<?= $data['description'] ?? '' ?>">
    <br>

    <label class="form-label">Price</label>
    <input type="text" class="input form-control mt-2" name="price" value="<?= $data['price'] ?? '' ?>">
    <br>

    <label class="form-label">Quantity</label>
    <input type="text" class="input form-control mt-2" name="qunatity" value="<?= $data['qunatity'] ?? '' ?>">
    <br>

    <label class="form-label">Supplier Name</label>
    <input type="text" class="input form-control mt-2" name="supplier_name" value="<?= $data['supplier_name'] ?? '' ?>">
    <br>

    <label class="form-label">Category</label>
    <input type="text" class="input form-control mt-2" name="category" value="<?= $data['category'] ?? '' ?>">
    <br>

    <span class='text-danger ms-3'> <?= $data['emptyFields'] ?? '' ?></span>
    <br>
    <button type="submit" name="addItemSubmit" class="update-button p-2 w-100 mt-4"><span>Add Item</span></button>
  </div>
</form>

<?php include APP_ROOT . '/views/includes/footer.php'; ?>