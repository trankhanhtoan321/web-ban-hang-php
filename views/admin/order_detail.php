<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-title">
   <div class="title_left">
      <h3>Orders Detail: <?= $orders[0]['order_id']; ?></h3>
   </div>
</div>
<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
         <div class="x_title">
            <a href="/admin/orders" class="btn btn-primary">Back</a>
            <h3>Customer Info</h3>
         </div>
         <div class="x_content">
            <div class="row">
               <div class="col-sm-6">
                  Name: <?= $orders[0]['customer_name']; ?><br/>
                  Tel: <?= $orders[0]['customer_tel']; ?><br/>
               </div>
               <div class="col-sm-6">
                  Email: <?= $orders[0]['customer_email']; ?><br/>
                  Address: <?= $orders[0]['customer_address']; ?><br/>
               </div>
               <div class="col-sm-12">
                  Note: <?= $orders[0]['customer_note']; ?><br/>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
         <div class="x_title">
            <h3>Orders Detail</h3>
         </div>
         <div class="x_content">
            <div class="col-xs-12 text-right">
               <h4>Order Time: <?= date("d/m/Y H:i",$orders[0]['order_time']); ?></h4>
               <h4>Status: <?= $orders[0]['order_success']==0?"<i style='color:red;'>Waitting</i>":"<i class='color:green;'>Done</i>"; ?></h4>
            </div>
            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Image</th>
                     <th>SKU</th>
                     <th>Name</th>
                     <th>Price (đ)</th>
                     <th>Quanty</th>
                     <th>Subtotal (đ)</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $dem=1; foreach($orders as $order){ ?>
                  <tr>
                     <td><?= $dem++; ?></td>
                     <td><img style="width:100px;" src="<?= $order['pro_image']; ?>" /></td>
                     <td><?= $order['pro_sku']; ?></td>
                     <td><?= $order['pro_name']; ?></td>
                     <td><?= number_format($order['orderdt_price']); ?></td>
                     <td><?= $order['orderdt_qty']; ?></td>
                     <td><?= number_format($order['orderdt_qty']*$order['orderdt_price']); ?></td>
                  </tr> 
                  <?php } ?>
               </tbody>
            </table>
            <div class="ln_solid"></div>
            <div class="form-group">
               <a class="btn btn-primary pull-left" href="/admin/orders" >Back</a>
               <a class="btn btn-success pull-right" href="/admin/order_detail/<?= $orders[0]['order_id']; ?>/1" >Done</a>
            </div>
         </div>
      </div>
   </div>
</div>