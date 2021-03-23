  <div class="nav-container-div">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand"><img src="<?= URL_ROOT ?>/img/logo.png" alt="logo" class="logo-img">
        </a>
        <h1 class='name ms-3'>CP<br>4U</h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-desktop"></i> Products</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="<?= URL_ROOT ?>/products/CPUs">CPUs</a></li>
                <li><a class="dropdown-item" href="<?= URL_ROOT ?>/products/GPUs">Graphics Cards</a></li>
                <li><a class="dropdown-item" href="<?= URL_ROOT ?>/products/Motherboards">Motherboards</a></li>
                <li><a class="dropdown-item" href="<?= URL_ROOT ?>/products/Rams">RAM Memory</a></li>
                <li><a class="dropdown-item" href="<?= URL_ROOT ?>/products/M2s">Storage</a></li>
                <li><a class="dropdown-item" href="<?= URL_ROOT ?>/products/Power_Supplies">Power Supplies</a></li>
                <li><a class="dropdown-item" href="<?= URL_ROOT ?>/products/CPU_Coolers">CPU Coolers</a></li>
                <li><a class="dropdown-item" href="<?= URL_ROOT ?>/products/Pc_Cases">PC Cases</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-user"></i> Admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Hello, Guest</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i><span id="cart-number">0</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user-circle"></i></a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="<?= URL_ROOT ?>/profile">My Profile</a></li>
                <li><a class="dropdown-item" href="#">My Orders</a></li>
                <hr>
                <li><a class="dropdown-item" href="<?= URL_ROOT ?>/login">Sign In</a></li>
                <li><a class="dropdown-item" href="<?= URL_ROOT ?>/signup">Sign Up</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>