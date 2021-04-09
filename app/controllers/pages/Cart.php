<?php

use app\core\Controller;

class Cart extends Controller
{
  private $data = ['title' => 'Cart',];

  public function index($params)
  { 
    // new item added to cart
    if (isset($_POST['cartSubmit'])) {
      $this->handleNewCartItem();
    }

    // ajax requests
    if (isset($_POST['removeBtn'])) {
      $this->ajaxRequests();
      die;
    }

    $this->data['Cart'] ??= $_SESSION['Cart'];

    //render view
    $this->renderView('Cart', $this->data);
  }
  
  private function handleNewCartItem() {
    // init cart
    if (!isset($_SESSION['Cart'])) {
      $_SESSION['Cart'] = [];
    }   
    
    // add item to cart
    unset($_POST['cartSubmit']);
    array_push($_SESSION['Cart'], $_POST);
    unset($_POST);

    // redirect to prevent duplicate POST on page refresh
    header('Location: '. URL_ROOT . '/Cart');
    die;
  }
  private function ajaxRequests() {
    // remove at idx
    unset($_SESSION['Cart'][$_POST['removeBtn']]);
    $_SESSION['Cart'] = array_values($_SESSION['Cart']);

    echo $this->displayAjax();
  }

  private function displayAjax() {
    $res = '';
    $subtotal=0;
    foreach($_SESSION['Cart'] as $idx => $cartItem) { 
      [ 'imgSrc' => $img, 'name' => $name, 'price' => $price, 'quantity' => $quan, ] = $cartItem;
      $subtotal += $price;
      $res .= '<div class="row">';
      $res .= '<div class="col-2 text-center">';
      $res .= '<img src="'. $img . '">';
      $res .= '</div>';
      $res .= '<div class="col">';
      $res .= '<h6 class="text-muted">Name</h6>';
      $res .= '<h6 class="name">' . $name . '</h6>';
      $res .= '</div>';
      $res .= '<div class="col-2">';
      $res .= '<h6 class="text-muted">Quantity</h6>';
      $res .= '<h6 class="name">'. $quan . '</h6>';
      $res .= '</div>';
      $res .= '<div class="col-2 text-end">';
      $res .= '<h6 class="text-muted">Price</h6>';
      $res .= '<h6 class="name">$' . $quan*$price . '.00</h6>';
      $res .= '</div>';
      $res .= '<div class="col text-end">';
      $res .= '<input class="btn btn-secondary remove-btn btn-sm" value="Remove" data-idx="' . $idx . '" type="submit">';
      $res .= '</div>';
      $res .= '<hr class="mt-3">';
      $res .= '</div>';
    }
    if (!empty($res)) {
      $res .= '<div class="w-50 text-end ms-auto price-container">';
      $res .= '<div class="row mb-2">';
      $res .= '<div class="col fs-6 text-muted">Subtotal: </div>';
      $res .= '<div class="col-3 text-muted">$'. $subtotal .'.00</div>';
      $res .= '</div>';
      $res .= '<div class="row mb-2">';
      $res .= '<div class="col fs-6 text-muted">Tax: </div>';
      $res .= '<div class="col-3 text-muted">$'. number_format($subtotal*.15, 2) .'</div>';
      $res .= '</div>';
      $res .= '<div class="row mb-2">';
      $res .= '<div class="col fs-6 fw-bold">Grand Total: </div>';
      $res .= '<div class="col-3 fs-5 fw-bolder">$'. number_format($subtotal*1.15, 2) .'</div>';
      $res .= '</div>';
      $res .= '</div>';
      $res .= '<div class="w-100 mt-3 text-end">';
      $res .= '<a class="btn btn-primary fw-bold py-2" href="'. URL_ROOT.'/Checkout">Proceed to Checkout</a>';
      $res .= '</div>';
    }
      
    return !empty($res) ? $res : '<h4>No Items in Cart</h4>';
  }
}
