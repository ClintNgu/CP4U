<nav class="navbar navbar-expand">
  <img src="<?= URL_ROOT ?>/img/logo.png" alt="logo" width="100px" height="100px">
  <h1 class='name ms-3'>CP<br>4U</h1>
  <div class="nav-item dropdown productDiv">
    <a class="nav-link m-0 productText dropdown-toggle text-uppercase" href="<?= URL_ROOT ?>/products">Products</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item py-2" href="<?= URL_ROOT ?>/products">All Products</a></li>
      <li>
        <hr class="dropdown-divider">
      </li>
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
  <!-- <a class="nav-link text-light" href="#">Admin</a> -->
  <div class="navbar-nav">
    <li>
      <a class="nav-link d-flex justify-content-center" href="#">
        <i class="fas fa-shopping-cart"></i>&nbsp;
        <?= $data['Cart']['qty'] ?? 0 ?>
      </a>
    </li>
    <li>
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle m-0"><i class="far fa-user-circle"></i></a>
        <ul class="profile-dropdown dropdown-menu dropdown-menu-end me-2 text-end">
          <li><a class="dropdown-item py-2" href="#">Admin</a></li>
          <li><a class="dropdown-item py-2" href="<?= URL_ROOT ?>/profile">My Profile</a></li>
          <li><a class="dropdown-item py-2" href="#">My Orders</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <!-- check if user isLoggedIn -->
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