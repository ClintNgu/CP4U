<?php include_once APP_ROOT . '/views/includes/header.php'; ?>

<div class="login-container d-flex align-items-center justify-content-center">
    <div class="left p-1 ps-4 mx-5">
        <p class="text-uppercase text-shadow m-0"> 
            join us and build  
            <br>your dream pc
        </p>
        <a href="<?= URL_ROOT ?>/products" class="btn text-center mt-4 text-light shadow-sm">View Products</a> 
    </div>
    <div class="right p-4 ms-4">
        <div class='d-flex align-items-center'>
            <h3 class="d-inline m-0">Login</h3> 
            <span class='text-danger ms-3'> <?= $data['emptyFields'] ?? '' ?> </span>
        </div>  
        <form method='post' class='mt-4'>
            <input type="text" class="input form-control" placeholder="Email or Username" name="emailOrUser"
                value="<?= $data['emailOrUser'] ?? '' ?>">
            <input type="text" class="input form-control mt-2" placeholder="Password" name="pass">

            <button type='submit' class='submit-button p-2 w-100 d-block mt-4 btn btn-dark'><span>Login</span></button>
            <p class="text-center w-100 m-0 mt-3">Don't have an account? <a class="text-primary" href="<?= URL_ROOT ?>/signup">Sign Up</a></p>
        </form>
    </div>
</div>


<?php include_once APP_ROOT . '/views/includes/footer.php'; ?>