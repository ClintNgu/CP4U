<nav class="navbar navbar-expand">
    <h3 class="navbar-brand" href="#">CP4U</h3>
    <div class="nav-item dropdown">
      <a class="nav-link dropdown-toggle m-0 text-light" data-bs-toggle="dropdown">Products</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item pb-2 border-bottom" href="<?= URL_ROOT ?>/products">All</a></li>
        <li><a class="dropdown-item py-2 border-bottom" href="<?= URL_ROOT ?>/products/CPUs">CPUs</a></li>
        <li><a class="dropdown-item py-2 border-bottom" href="<?= URL_ROOT ?>/products/GPUs">GPUs</a></li>
        <li><a class="dropdown-item py-2 border-bottom" href="<?= URL_ROOT ?>/products/Motherboards">Motherboards</a></li>
        <li><a class="dropdown-item py-2 border-bottom" href="<?= URL_ROOT ?>/products/Rams">RAM Memory</a></li>
        <li><a class="dropdown-item py-2 border-bottom" href="<?= URL_ROOT ?>/products/M2s">Storage</a></li>
        <li><a class="dropdown-item py-2 border-bottom" href="<?= URL_ROOT ?>/products/Power_Supplies">Power Supplies</a></li>
        <li><a class="dropdown-item py-2 border-bottom" href="<?= URL_ROOT ?>/products/CPU_Coolers">CPU Coolers</a></li>
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
      <li >
        <!-- <a class="nav-link dropdown dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="far fa-user-circle"></i></a>
        <ul class="dropdown-menu dropdown-menu-end me-3">
          <li><a class="dropdown-item" href="#">My Profile</a></li>

        </ul> -->
        <div class="nav-item dropdown"> 
          <a class="nav-link dropdown-toggle m-0 text-light" data-bs-toggle="dropdown"><i class="far fa-user-circle"></i></a>
          <ul class="dropdown-menu dropdown-menu-end me-2 text-end">
            <li><a class="dropdown-item" href="<?= URL_ROOT ?>/profile">My Profile</a></li>
            <li><a class="dropdown-item" href="#">My Orders</a></li>
            <li><hr class="dropdown-divider"></li>
            <!-- check if user isLoggedIn -->
            <li><a class="dropdown-item" href="<?= URL_ROOT ?>/login">Sign In</a></li>
          </ul>
        </div>
      </li>
    </div>
  </div>
</nav>
