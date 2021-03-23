<?php include APP_ROOT . '/views/includes/header.php'; ?>

<div class="signup-container mb-5 d-flex align-items-center justify-content-center">
  <div class="left p-1 ps-4 mx-5">
    <p class="text-uppercase text-shadow m-0"> 
      join us and build  
      <br>your dream pc
    </p>
    <a href="<?= URL_ROOT ?>/products" class="btn text-center mt-4 text-light shadow-sm">View Products</a> 
  </div>

  <div class="right p-4 pt-5 ms-4">
    <div class='d-flex align-items-center'>
      <h3 class="d-inline m-0">Sign Up</h3> 
      <span class='text-danger ms-3'> <?= $data['emptyFields'] ?? '' ?> </span>
    </div>  
    <form method="post" class="signup-form mt-4">
      <div class='row'>
        <div class="col">
          <input class="form-control" type="text" placeholder="First Name" name='fname' 
            value="<?= $data['fname'] ?? '' ?>">
        </div>
        <div class='col'>
          <input class="form-control  " type="text" placeholder="Last Name" name='lname'
            value="<?= $data['lname'] ?? '' ?>">
        </div>
      </div>
      <div class="row mt-2">
      <div class="col">
          <input class="form-control  " type="text" placeholder="Username" name='username'
            value="<?= $data['username'] ?? '' ?>">
        </div>
      </div>
      <div class="row mt-2">
        <div class="col">
          <input class="form-control  " type="text" placeholder="Address" name='street'
            value="<?= $data['street'] ?? '' ?>">
        </div>
      </div>
      <div class="row mt-2">
        <div class="col">
          <input class="form-control  " type="text" placeholder="Email" name='email'
            value="<?= $data['email'] ?? '' ?>">
        </div>
      </div>
      <div class="row mt-2">
        <div class="col">
          <input class="form-control  " type="text" placeholder="Password" name='pass'>
        </div>  
      </div>
      
      <input type="submit" value='Sign Up' name='signupSubmit' class="btn btn-primary w-100 mt-4" />
      <p class="text-center w-100 mt-3">Already have an Account? <a class="link link-primary" href="<?= URL_ROOT ?>/login">Login</a></p>
      
    </form>
  </div>
</div>





<?php include APP_ROOT . '/views/includes/footer.php'; ?>