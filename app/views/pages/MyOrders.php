<?php include APP_ROOT . '/views/includes/header.php'; ?>


<div class="my-orders-container" style='padding: 2rem 3rem;'>
  <h2 style='font-weight: 900;' class="text-center mb-4">My Orders</h2>
  <div style='display: grid; grid-template-columns:repeat(3, 1fr); gap:2rem; justify-items:center;'>
    <?php foreach ($data['orderHistories'] as $order): ?>
      <div class="p-4 d-flex flex-column" style='background:#fff; font-size: 14px; font-weight:500; min-height:23rem; width: 23rem; border-radius:.2rem; box-shadow:2px 2px 3px #777;'>
        <div>
          <p class="m-0" style="font-size:1.15rem; font-weight:800;">Order Details</p>
          <p class="m-0 text-muted" style="font-size:13px;">Ordered On: <?=$order['order_date']?></p>
        </div>
        <hr>
      <?php 
        array_pop($order);
        $total = 0;
        foreach ($order as $item): 
          [
            'item_name' => $name, 
            'image' => $img, 
            'price' => $price,
            'qty' => $qty,
          ] = $item;
          $total += $price; 
      ?> 
      <div class='d-flex pe-4 mb-3'>
        <img src="<?=$img?>" width="60" height="60" style='border-radius: 50%; border:2px solid #333;'>
        <p class='ms-3'><?=$qty?> x <?=$name?></p>
      </div>
      <?php endforeach; ?>
        <div class="mt-auto pt-2" style="border-top: 1.5px solid #C8C9CA;">
          <p class='m-0 text-end' style='font-weight: 800; font-size: 1rem;'>Total: $<?=number_format($total*1.15,2)?></p>
        </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>


<?php include APP_ROOT . '/views/includes/footer.php'; ?>
