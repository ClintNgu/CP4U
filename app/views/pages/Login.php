<!DOCTYPE html>
<html>

<head>
    <?php include_once APP_ROOT . '/views/includes/header.php'; ?>
</head>

<body class="body">
    <div class="container-div">
        <div class="left-section-div">
            <img src="../public/img/logo.png" alt="cp4u_logo">
            <p><strong>Weather you are a beginner or a veteran, <br> join us and we can all make any PC imaginable.</strong></p>
        </div>
        <div class="right-section-div">
            <form method='post' class='login-form'>
                <input type="text" name="username" class="input" placeholder="Username">
                <br>
                <input type="text" name="password" class="input" placeholder="Password">
                <br>
                <button type='submit' class='submit-button'><span>Login </span></button>
            </form>
        </div>
    </div>

    <?php include_once APP_ROOT . '/views/includes/footer.php'; ?>
</body>

</html>