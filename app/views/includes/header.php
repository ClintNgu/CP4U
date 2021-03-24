<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CP4U / <?= $data['title'] ?? '' ?></title>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

  <!-- fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" />

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <!-- stylesheet -->
  <style>
    <?= include ROOT . '/public/styles/css/style.css';  ?>
  </style>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= URL_ROOT ?>/img/logo.png" />

  <!-- Font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@100;300;400;500;700;800;900&display=swap" rel="stylesheet">
</head>

<body>
  <!-- <?php include_once APP_ROOT . '/views/includes/nav.php'; ?> -->
  <?php include_once APP_ROOT . '/views/includes/nav1.php'; ?>
  <div class="main-container">