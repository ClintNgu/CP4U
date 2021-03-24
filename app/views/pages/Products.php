<?php include_once APP_ROOT . '/views/includes/header.php'; ?>

<div class="main-container-div">
  <div class="sidebar d-flex flex-column p-2" style="width: 200px; height: 100vh;">
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="sidebar-li">
        <a href="<?= URL_ROOT ?>/products/AMD" class="nav-link text-white">
          <img src='https://seeklogo.com/images/A/amd-logo-427958DBFB-seeklogo.com.png' width="30%" height="30%" alt="amd"> AMD
        </a>
      </li>
      <li class="sidebar-li">
        <a href="<?= URL_ROOT ?>/products/INTEL" class="nav-link text-white">
          <img src='https://seeklogo.com/images/I/intel-logo-A05550B04C-seeklogo.com.png' width="30%" height="30%" alt="intel"> INTEL
        </a>
      </li>
      <li class="sidebar-li">
        <a href="<?= URL_ROOT ?>/products/ASRock" class="nav-link text-white">
          <img src='https://www.angadikart.com/media/122/catalog/asrock%20logo.jpg' width="30%" height="30%" alt="asrock"> ASROCK
        </a>
      </li>
      <li class="sidebar-li">
        <a href="<?= URL_ROOT ?>/products/ASUS" class="nav-link text-white">
          <img src='https://www.logolynx.com/images/logolynx/19/19b62ee44571eee229e1d94592efa3c3.png' width="30%" height="30%" alt="asus"> ASUS
        </a>
      </li>
      <li class="sidebar-li">
        <a href="<?= URL_ROOT ?>/products/MSI" class="nav-link text-white">
          <img src='https://cdn.worldvectorlogo.com/logos/msi-gaming.svg' width="30%" height="30%" alt="msi"> MSI
        </a>
      </li>
      <li class="sidebar-li">
        <a href="<?= URL_ROOT ?>/products/GIGABYTE" class="nav-link text-white">
          <img src='https://d1yjjnpx0p53s8.cloudfront.net/styles/logo-thumbnail/s3/0024/9901/brand.gif?itok=oGsQ0XeM' width="30%" height="30%" alt="gigabyte"> GIGABYTE
        </a>
      </li>
      <li class="sidebar-li">
        <a href="<?= URL_ROOT ?>/products/CORSAIR" class="nav-link text-white">
          <img src='https://icon-library.com/images/corsair-icon/corsair-icon-23.jpg' width="30%" height="30%" alt="corsair"> CORSAIR
        </a>
      </li>
      <li class="sidebar-li">
        <a href="<?= URL_ROOT ?>/products/GSKILL" class="nav-link text-white">
          <img src='https://upload.wikimedia.org/wikipedia/en/7/78/G.Skill.gif' width="30%" height="30%" alt="g.skill"> G.SKILL
        </a>
      </li>
      <li class="sidebar-li">
        <a href="<?= URL_ROOT ?>/products/EVGA" class="nav-link text-white">
          <img src='https://d1yjjnpx0p53s8.cloudfront.net/styles/logo-thumbnail/s3/012011/evga-logo.png?itok=li6vEa6U' width="30%" height="30%" alt="evga"> EVGA
        </a>
      </li>
      <li class="sidebar-li">
        <a href="<?= URL_ROOT ?>/products/Noctua" class="nav-link text-white">
          <img src='https://noctua.at/pub/media/wysiwyg/images/noctua_logo_1092_1203px.jpg' width="30%" height="30%" alt="asrock"> Noctua
        </a>
      </li>
      <li class="sidebar-li">
        <a href="<?= URL_ROOT ?>/products/SAMSUNG" class="nav-link text-white">
          <img src='https://d1yjjnpx0p53s8.cloudfront.net/styles/logo-thumbnail/s3/0019/9958/brand.gif?itok=0v06HKoT' width="30%" height="30%" alt="samsung"> SAMSUNG
        </a>
      </li>
    </ul>
  </div>
  <div class="products-container">
    <!-- display products -->
    <?php
    foreach ($data['products'] as $product) {
      echo '<div class="product-div">';
      echo '<a class="link link-primary d-inline-block mt-2"' . 'href="' . URL_ROOT . '/products/' . $product['urlCategory'] . '/' . $product['item_id'] . '">' .
        '<br><img src= ' . $product['image'] . ' alt="item"><br>' . $product['supplier_name'] . ' ' .
        $product['item_name'] . '</a><br>';
      echo '<label>' . '$' . $product['price'] . '.00' . '</label>';
      echo '<button id=' . $product['item_id'] . '><span>Add to Cart </span></button>';
      echo '</div>';
    }
    ?>
  </div>
</div>
<?php include_once APP_ROOT . '/views/includes/footer.php'; ?>