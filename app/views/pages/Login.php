<?php include_once APP_ROOT . '/views/includes/header.php'; ?>

<div class="login-container d-flex align-items-center justify-content-center">
    <div class="left p-1">
        <p><strong>Whether you are a beginner <br> or a veteran, <br> join us and we can all make<br> any PC imaginable.</strong></p>
    </div>
    <div class="right p-2">
        <form method='post' class='p-3'>
        <input type="text" name="username" class="input form-control" placeholder="Username or Email">
            <br>
            <input type="text" name="password" class="input form-control" placeholder="Password">
            <br>
            <button type='submit' class='submit-button p-2 w-100 btn d-block mt-3'><span>Login </span></button>
            <p class="text-center w-100 m-0 mt-3">New here? <a class="text-primary" href="<?= URL_ROOT ?>/signup">Register</a></p>

        </form>
    </div>
</div>


<?php include_once APP_ROOT . '/views/includes/footer.php'; ?>