<?php include APP_ROOT . "/views/includes/header.php"; ?>

<div class="profile-container" style='padding:2rem; min-height: 90vh;'>
  <form method='post' class="m-auto mt-4" style="width: 45%; background: #fff; padding:2rem 3rem; border-radius: .2rem; box-shadow:2px 2px 3px #777;">
    <div class="d-flex align-items-center">
      <h4 style='font-weight: 900;' class="d-inline-block m-0 me-2">Profile</h4>
      <?php if (isset($data['updateMsg'])): ?>
        <span class='text-success' style="font-size: small;"><?= $data['updateMsg'] ?></span>
      <?php endif; ?>
    </div>  
    <input type="text" name='id' value='<?= $_SESSION['User']['user_id'] ?>' hidden>
    <div class="row mb-2 mt-4">
      <div class="col">
        <label class="form-label fw-bold">First Name</label>
        <input type="text" name='fname' class="form-control" value="<?= $_SESSION['User']['fname'] ?>">  
      </div>
      <div class="col">
        <label class="form-label fw-bold">Last Name</label>
        <input type="text" name='lname' class="form-control" value="<?= $_SESSION['User']['lname'] ?>">
      </div>
    </div>
    <div class="mb-2">
      <label class="form-label fw-bold">Username</label>
      <input type="text" name='username' class="form-control" value="<?= $_SESSION['User']['username'] ?>">  
    </div>
    <div class="mb-2">
      <label class="form-label fw-bold">Email</label>
      <input type="text" name='email' class="form-control" value="<?= $_SESSION['User']['email'] ?>">
    </div>
    <div class="mb-4">
      <label class="form-label fw-bold">Shipping Address</label>
      <input type="text" name='street' class="form-control" value="<?= $_SESSION['User']['street'] ?>">
    </div>

    <input type="submit" value='Update' name='profileUpdateBtn' class='btn btn-dark d-block w-100 mb-1'>
    <input type="submit" value='Delete' name='profileDeleteBtn' class='btn btn-danger d-block w-100'>
  </form>
</div>


<?php include APP_ROOT . "/views/includes/footer.php"; ?>