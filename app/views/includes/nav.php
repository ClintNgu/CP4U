<nav class="navbar navbar-expand d-flex justify-content-between">
  <a href="<?= URL_ROOT ?>" class='nav-logo'>
    <div class='nav-brand d-flex justify-content-center align-items-center'>
      <img src="<?= URL_ROOT ?>/img/logo.png" alt="logo" class=''>
      <h1 class='ms-1'>CP<br>4U</h1>
    </div>
  </a>

  <div class="nav-item dropdown productDiv">
    <a class="nav-link m-0 productText dropdown-toggle text-uppercase" href="<?= URL_ROOT ?>/products">Products</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item py-2" href="<?= URL_ROOT ?>/products/CPUs">CPUs</a></li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li><a class="dropdown-item py-2" href="<?= URL_ROOT ?>/products/GPUs">GPUs</a></li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li><a class="dropdown-item py-2" href="<?= URL_ROOT ?>/products/Motherboards">Motherboards</a></li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li><a class="dropdown-item py-2" href="<?= URL_ROOT ?>/products/Rams">RAM Memory</a></li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li><a class="dropdown-item py-2" href="<?= URL_ROOT ?>/products/M2s">Storage</a></li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li><a class="dropdown-item py-2" href="<?= URL_ROOT ?>/products/Power_Supplies">Power Supplies</a></li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li><a class="dropdown-item py-2" href="<?= URL_ROOT ?>/products/CPU_Coolers">CPU Coolers</a></li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li><a class="dropdown-item pt-2" href="<?= URL_ROOT ?>/products/PC_Cases">PC Cases</a></li>
    </ul>
  </div>

  <div class="navbar-nav">
    <div class='d-flex align-items-center justify-content-center me-4'>
      <h5 class='m-0 p-0 text-light' style='font-weight:400; font-size:1.1rem;'>
        Hi, <?= isset($_SESSION['User']) ? ucfirst($_SESSION['User']['fname']) : 'Guest' ?>
      </h5>
    </div>
    <li>
      <a class="nav-link d-flex justify-content-center" href="<?= URL_ROOT ?>/Cart">
        <i class="fas fa-shopping-cart"></i>&nbsp;
        <span id='navCartCount'><?= isset($_SESSION['Cart']) ? count($_SESSION['Cart']) : 0 ?></span>
      </a>
    </li>
    <li>
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle m-0"><i class="far fa-user-circle"></i></a>
        <ul class="profile-dropdown dropdown-menu dropdown-menu-end me-2 text-end">

          <!-- user profile and user orders -->
          <?php if (isset($_SESSION['User'])) : ?>
            <li><a class="dropdown-item py-2" href="<?= URL_ROOT ?>/Profile">My Profile</a></li>
            <li><a class="dropdown-item py-2" href="#">My Orders</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
          <?php endif; ?>


          <!-- user signin or logout -->
          <?php if (!isset($_SESSION['User'])) : ?>
            <li><a class="dropdown-item py-2" href="<?= URL_ROOT ?>/login">Sign In</a></li>
          <?php else : ?>
            <li><a class="dropdown-item py-2" href="<?= URL_ROOT ?>/login/signout">Sign Out</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </li>
  </div>
  </div>
</nav>