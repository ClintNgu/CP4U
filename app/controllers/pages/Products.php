<?php

use app\core\Controller;
use app\controllers\Product;

class Products extends Controller
{
  private $data = ['title' => 'PRODUCTS'];
  private static $productCtrl;


  public function __construct()
  {
    //init product controller
    self::$productCtrl = new Product;

    //query all products from db
    $this->data['products'] = self::$productCtrl->getProducts();

    //shuffle products
    shuffle($this->data['products']);

    //set sidebar suppliers
    $this->data['sidebar']['suppliers'] = array_unique(array_map(fn ($p) => $p['supplier_name'], $this->data['products']));

    //set sidebar price ranges
    $this->data['sidebar']['prices'] = ['< $250', '$250 - $499', '$500 - $749', '$750 - $999', '$1000+'];
  }

  /* VIEWS */
  public function index($params)
  {
    // render product if id exist
    if (isset($params[1])) {
      $this->renderProduct($params[1]);
      exit;
    }

    // filter by categories from URL
    if (isset($params[0]) && !empty($params[0])) {
      if (!self::$productCtrl->isValidCategory($params[0])) {
        header('Location: ' . URL_ROOT . '/products');
      } else {
        $this->data['title'] = strtoupper($params[0]);
        $this->data['products'] = array_values($this->filterCategory($params[0]));
      }
    }

    // set admin deleted product msg
    if (isset($_SESSION['productDeleted'])) {
      $this->data['productDeleted'] = $_SESSION['productDeleted'];
      unset($_SESSION['productDeleted']);
    }

    // set profile deleted msg
    if (isset($_SESSION['profileDeleteMsg'])) {
      $this->data['profileDeleteMsg'] = $_SESSION['profileDeleteMsg'];
      unset($_SESSION['profileDeleteMsg']);
      unset($_SESSION['User']);
    }

    // Ajax requests (sidebar and search)
    if (isset($_POST['suppliers']) || isset($_POST['prices']) || isset($_POST['searchVal'])) {
      $this->ajaxHandler();
      exit;
    }

    // display products
    $this->renderView('Products', $this->data);
  }

  public function add($params)
  {
    // admin only
    if (!isset($_SESSION['User']) || (int)$_SESSION['User']['is_admin'] === 0) {
      header('Location: ' . URL_ROOT . '/products');
      die;
    }

    // set title
    $this->data['title'] = 'Add Product';

    // set admin added product msg
    $this->data['msg'] = $_SESSION['msg'] ?? null;
    $this->data['textColor'] = $_SESSION['textColor'] ?? null;
    unset($_SESSION['msg']);
    unset($_SESSION['textColor']);

    // add new product POST
    if (isset($_POST['addProductBtn'])) {
      $newProduct = [
        'item_name' => $_POST['name'],
        'image' => $_POST['imgSrc'],
        'description' => $_POST['descript'],
        'price' => $_POST['price'],
        'quantity' => 5,
        'supplier_name' => $_POST['supplier'],
        'category' => $_POST['category'],
      ];

      foreach ($newProduct as $_ => $val) {
        if (empty($val)) {
          $this->data['msg'] = '* Fields cannot be empty *';
          $this->data['textColor'] = 'text-danger';
          break;
        }
      }

      if (!isset($this->data['msg'])) {
        $_SESSION['msg'] = '* Product Added Successfully *';
        $_SESSION['textColor'] = 'text-success';
        self::$productCtrl->insertProduct($newProduct);

        // prevent duplicate POST on refresh
        header('location: ' . URL_ROOT . '/products/add');
        die;
      }
    }

    $this->renderView('AddProduct', $this->data);
  }

  private function ajaxHandler()
  {
    // fetch all products
    $filtered = $this->data['products'];

    // filter by supplier
    $filtered = isset($_POST['suppliers'])
      ? $this->filterSuppliers($filtered, json_decode($_POST['suppliers']))
      : $filtered;
    // filter by prices
    $filtered = isset($_POST['prices'])
      ? $this->filterPrices($filtered, json_decode($_POST['prices']))
      : $filtered;
    // filter by searched string
    $filtered = isset($_POST['searchVal'])
      ? $this->filterSearch($filtered, json_decode($_POST['searchVal']))
      : $filtered;

    // display filtered products
    echo $this->displayFilteredProducts($filtered);
  }

  /* METHODS */
  private function filterCategory($urlCat)
  {
    $filtered = array_filter($this->data['products'], function ($product) use ($urlCat) {
      return strtolower($product['urlCategory']) === $urlCat;
    });

    return $filtered;
  }

  private function filterSearch($products, $searchVal)
  {
    // remove $ if at idx 0
    $searchVal = $searchVal === '$' ? '' : $searchVal;
    $searchVal = (isset($searchVal[0]) && $searchVal[0] === '$' &&
      isset($searchVal[1]) && ($searchVal[1]))
      ? substr($searchVal, 1)
      : $searchVal;

    $filtered = array_filter($products, function ($product) use ($searchVal) {
      if (
        str_contains(strtolower($product['item_name']), strtolower($searchVal)) ||
        str_contains(strtolower($product['price']), strtolower($searchVal))
      ) {
        return true;
      }
    });

    return $filtered;
  }

  private function filterSuppliers($products, $suppliers)
  {
    $filtered = array_filter($products, function ($product) use ($suppliers) {
      foreach ($suppliers as $supplier)
        if (strtolower($product['supplier_name']) === $supplier) {
          return true;
        }
    });

    return $filtered;
  }

  private function filterPrices($products, $priceRanges)
  {
    $priceRanges = array_map(fn ($s) => str_replace(['$', ' '], '', $s), $priceRanges);
    $filtered = array_filter($products, function ($product) use ($priceRanges) {
      (int)['price' => $price] = $product;

      foreach ($priceRanges as $range) {
        $range = explode('-', $range);
        $min = $range[0];
        $max = $range[1] ?? null;

        if (
          str_contains($min, '<') && $price < (int)substr($min, 1) ||
          str_contains($min, '+') && $price >= (int)substr($min, 0, -1) ||
          $price >= (int)$min && $price <= (int)$max
        ) {
          return true;
        }
      }
    });

    return $filtered;
  }

  private function displayFilteredProducts($filtered)
  {
    $res = '';
    foreach ($filtered as [
      'item_name' => $name,
      'image' => $img,
      'price' => $price,
      'urlCategory' => $urlCategory,
      'item_id' => $id,
    ]) {
      $res .=
        "<a href='" . URL_ROOT . "/products/$urlCategory/$id' class='item-wrapper d-none'>"
        . "<div class='item d-flex flex-column align-items-center shadow p-1'>"
        . "<img src='$img' class='img mt-auto' />"
        . "<div class='caption d-flex justify-content-between w-100 px-3 pt-5'>"
        . "<h6 class='pe-5'>$name</h6>"
        . "<p>$$price</p>"
        . "</div>"
        . "</div>"
        . "</a>";
    }

    return empty($res) ? "<h4 class='text-center' style='grid-column:1/3;'>No Items Found!</h4>" : $res;
  }

  private function renderProduct($id)
  {
    // fetch product
    unset($this->data['products']);
    $this->data['product'] = self::$productCtrl->getProductById($id);
    $this->data['title'] = $this->data['product']['item_name'];

    // product not found
    if (empty($this->data['title'])) {
      header('Location: ' . URL_ROOT . '/products');
      exit;
    }

    // set admin update product msg
    if (isset($_SESSION['productUpdateMsg'])) {
      $this->data['productUpdateMsg'] = $_SESSION['productUpdateMsg'];
      unset($_SESSION['productUpdateMsg']);
    }

    // admin update product POST
    if (isset($_POST['updateBtn'])) {
      $this->updateProduct();
      die;
    }

    // admin delete product POST
    if (isset($_POST['deleteBtn'])) {
      self::$productCtrl->deleteProduct($_POST['id']);
      $_SESSION['productDeleted'] = '* Product Deleted Successfully *';
      header('Location: ' . URL_ROOT . '/products');
      die;
    }

    $this->renderView('Product', $this->data);
  }

  private function updateProduct()
  {
    // set new product data
    $product = [
      'item_name' => $_POST['name'],
      'image' => $_POST['imgSrc'],
      'description' => $_POST['descript'],
      'price' => $_POST['price'],
      'quantity' => 5,
      'supplier_name' => $_POST['supplier'],
      'category' => $_POST['category'],
      'id' => $_POST['id'],
    ];
    // update product
    self::$productCtrl->updateProduct($product);
    // display success product update
    $_SESSION['productUpdateMsg'] = '* Product Updated Successfully *';

    header("Refresh:0");
  }
}
