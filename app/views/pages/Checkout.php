<?php include APP_ROOT . "/views/includes/header.php"; ?>

<form action='<?=URL_ROOT?>/thankyou' method='post'>
<div class="checkout-container d-flex" style='padding:2rem; min-height:90vh;'>
  <div class="left-side w-75 mx-4" style="background:#fff; padding:2rem; width:27%; border-radius: .4rem; box-shadow: 2px 2px 2px #666;">
    <div class='mb-4'>
      <h4 style='font-weight:900; font-size:1.4rem;'>Checkout</h4><hr>
    </div>
    <div class="row mb-4">
      <div class="col">
        <label class="form-label fw-bold">First Name</label>
        <input type="text" name='fname' class="form-control" value="<?= $_SESSION['User']['fname'] ?? ''?>">  
      </div>
      <div class="col">
        <label class="form-label fw-bold">Last Name</label>
        <input type="text" class="form-control" value="<?= $_SESSION['User']['lname'] ?? ''?>">
      </div>
    </div>
    <div class="mb-4">
      <label class="form-label fw-bold">Email</label>
      <input type="text" class="form-control" value="<?= $_SESSION['User']['email'] ?? ''?>">
    </div>
    <div class="mb-4">
      <label class="form-label fw-bold">Shipping Address</label>
      <input type="text" class="form-control" value="<?= $_SESSION['User']['street'] ?? ''?>">
    </div>

  </div>
  <div class="right-side mx-4 d-flex flex-column" style="background:#fff; padding:2rem; width:27%; border-radius: .4rem; box-shadow: 2px 2px 2px #666;">
    <div class='text-center mb-4'>
      <h4 style='font-weight:800; font-size:1.3rem;'>Order Summary</h4><hr>
    </div>
    <?php 
      $subtotal = 0; 
      foreach($data['Cart'] as [
        'imgSrc' => $img, 
        'name' => $name, 
        'quantity' => $quan,
        'price' => $price, ]):  
        $subtotal += $price;
    ?>
      <div class="d-flex pe-3 mb-3" style='font-size: 14px; font-weight:500; min-height:3rem;'>
        <img src="<?=$img?>" width="60" height="60" style='border-radius: 50%; border:2px solid #333;'>
        <p class='m-0 ms-3 mt-2 h-100'><?=$quan?> x <?=$name?></p>
      </div>
    <?php endforeach; ?>
    <hr>
    <div style='font-size: 14px; font-weight:500; min-height:3rem;'>
      <div class="row text-end mb-1">
        <div class="col">Subtotal:</div>
        <div class="col">$<?=number_format($subtotal, 2)?></div>
      </div>
      <div class="row text-end mb-1">
        <div class="col">Tax:</div>
        <div class="col">$<?=number_format($subtotal*.15, 2)?></div>
      </div>
      <div class="row text-end mt-2">
        <div class="col h6 fw-bolder">Grand Total:</div>
        <div class="col h6 fw-bolder">$<?=number_format($subtotal*1.15, 2)?></div>
      </div>
    </div>
    <hr>
    <input type='submit' value='Purchase' name='purchaseBtn' class="btn btn-primary fw-bold w-100  mt-auto" />
  </div>
</div>
</form>

<?php include APP_ROOT . "/views/includes/footer.php"; ?>