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
    // render product
    if (isset($params[1])) {
      $this->renderProduct($params[1]);
      exit;
    }

    // filter categories
    if (isset($params[0]) && !empty($params[0])) {
      if (!self::$productCtrl->isValidCategory($params[0])) {
        header('Location: ' . URL_ROOT . '/products');
      } else {
        $this->data['title'] = strtoupper($params[0]);
        $this->data['products'] = array_values($this->filterCategory($params[0]));
      }
    }

    // filter ajax request
    if (isset($_POST['suppliers']) || isset($_POST['prices']) || isset($_POST['searchVal'])) {
      $this->ajaxHandler();
      exit;
    }

    // admin deleted product msg
    if (isset($_SESSION['productDeleted'])) {
      $this->data['productDeleted'] = $_SESSION['productDeleted'];
      unset($_SESSION['productDeleted']);
    }

    //profile deleted msg
    if (isset($_SESSION['profileDeleteMsg'])) {
      $this->data['profileDeleteMsg'] = $_SESSION['profileDeleteMsg'];
      unset($_SESSION['profileDeleteMsg']);
      unset($_SESSION['User']);
    }

    // display products
    $this->renderView('Products', $this->data);
  }

  public function add($params)
  {
    if (!isset($_SESSION['User']) || (isset($_SESSION['User']) && (int)$_SESSION['User']['is_admin'] === 0)) {
      header('Location: ' . URL_ROOT . '/products');
      die;
    }

    $this->data['title'] = 'Add Product';

    //successfully added product
    $this->data['msg'] = $_SESSION['msg'] ?? null;
    $this->data['textColor'] = $_SESSION['textColor'] ?? null;
    unset($_SESSION['msg']);
    unset($_SESSION['textColor']);

    // admin add new product
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

        //prevent duplicate POST on refresh
        header('location: ' . URL_ROOT . '/products/add');
        die;
      }
    }

    $this->renderView('AddProduct', $this->data);
  }

  private function ajaxHandler()
  {
    $filtered = $this->data['products'];
    $filtered = isset($_POST['suppliers']) ? $this->filterSuppliers($filtered, json_decode($_POST['suppliers'])) : $filtered;
    $filtered = isset($_POST['prices']) ? $this->filterPrices($filtered, json_decode($_POST['prices'])) : $filtered;
    $filtered = isset($_POST['searchVal']) ? $this->filterSearch($filtered, json_decode($_POST['searchVal'])) : $filtered;

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
    $searchVal = $searchVal === '$' ? '' : $searchVal;
    $searchVal = isset($searchVal[0]) && $searchVal[0] === '$' && 
                 isset($searchVal[1]) && is_numeric($searchVal[1])
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
          (str_contains($min, '<') && $price < (int)substr($min, 1)) ||
          (str_contains($min, '+') && $price >= (int)substr($min, 0, -1)) ||
          ($price >= (int)$min && $price <= (int)$max)
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
      $res .= "<a href='" . URL_ROOT . "/products/$urlCategory/$id' class='item-wrapper d-none'>";
      $res .= "<div class='item d-flex flex-column align-items-center shadow p-1'>";
      $res .= "<img src='$img' class='img mt-auto' />";
      $res .= "<div class='caption d-flex justify-content-between w-100 px-3 pt-5'>";
      $res .= "<h6 class='pe-5'>$name</h6>";
      $res .= "<p>$$price</p>";
      $res .= "</div>";
      $res .= "</div>";
      $res .= "</a>";
    }

    return empty($res) ? "<h4 class='text-center' style='grid-column:1/3;'>No Items Found!</h4>" : $res;
  }

  private function renderProduct($id)
  {
    //get item
    unset($this->data['products']);
    $this->data['product'] = self::$productCtrl->getProductById($id);
    $this->data['title'] = $this->data['product']['item_name'];

    //no item found
    if (empty($this->data['title'])) {
      header('Location: ' . URL_ROOT . '/products');
      exit;
    }

    //admin update product
    if (isset($_POST['updateBtn'])) {
      $this->updateProduct();
      die;
    }

    //admin delete product 
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

    self::$productCtrl->updateProduct($product);
    header("Refresh:0");
  }
}
