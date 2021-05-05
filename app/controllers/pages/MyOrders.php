<?php

use app\core\Controller;
use app\controllers\Product;

class MyOrders extends Controller
{
  private $data = ['title' => 'My Orders', 'orderHistories' => []];
  private $orderCtrl, $productCtrl;

  public function index()
  {
    // init controllers
    $this->productCtrl = new Product;
    $this->orderCtrl = $this->loadModel('Order');

    // fetch user orders 
    $orders = $this->orderCtrl->getOrders($_SESSION['cartId']);
    $orderDates = $this->orderCtrl->getOrderDates($_SESSION['cartId']);

    // generate order histories
    foreach ($orderDates as ['order_date' => $oDate]) {
      $products = [];
      // get all product ids purchased on $oDate
      $ids = array_filter($orders, function ($order) use ($oDate) {
        ['order_date' => $date, 'item_id' => $id, 'quantity' => $qty] = $order;
        if ($date === $oDate) {
          return [$id, $qty];
        }
      });
      // fetch product info from $ids
      foreach ($ids as ['item_id' => $id, 'quantity' => $qty]) {
        $product = $this->productCtrl->getProductById($id);
        $product['qty'] = $qty; //add qty property
        array_push($products, $product);
      }
      //add order_date property
      $products['order_date'] = $oDate;

      // add to order history
      array_push($this->data['orderHistories'], $products);
    }

    $this->renderView('MyOrders', $this->data);
  }
}
