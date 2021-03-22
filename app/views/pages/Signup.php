<?php include_once APP_ROOT . '/views/includes/header.php'; ?>

<div class="signup-container d-flex align-items-center justify-content-center">
  <div class="wrapper shadow p-4">
    <h3>Register</h3>
    <form method="post" class="signup-form">
      <div class='row'>
        <div class="col">
          <label class="form-label">First Name</label>
          <input class="form-control" type="text" placeholder="First Name">
        </div>
        <div class='col'>
          <label class="form-label">Last Name</label>
          <input class="form-control" type="text" placeholder="Last Name">
        </div>
        <div class="col">
          <label class="form-label">Username</label>
          <input class="form-control" type="text" placeholder="Username">
        </div>
      </div>
      <div class="row mt-2">
        <div class="col">
          <label class="form-label">Address</label>
          <input class="form-control" type="text" placeholder="Address">
        </div>
      </div>
      <div class="row mt-2">
        <div class="col">
          <label class="form-label">Email</label>
          <input class="form-control" type="text" placeholder="Email">
        </div>
      </div>
      <div class="row mt-2">
        <div class="col">
          <label class="form-label">Password</label>
          <input class="form-control" type="text" placeholder="Password">
        </div>  
      </div>
      
      <button type="submit" class="btn btn-dark w-100 mt-4">Signup</button>
      <p class="text-center w-100 mt-3">Already have an Account? <a class="text-danger" href="<?= URL_ROOT ?>/login">Login</a></p>
      
    </form>
  </div>
</div>





<?php include_once APP_ROOT . '/views/includes/footer.php'; ?>