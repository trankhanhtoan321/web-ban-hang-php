<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-title">
   <div class="title_left">
      <h3>Orders</h3>
   </div>
</div>
<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
         <div class="x_content">
            <form action="" method="post">
               <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
               <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Time</th>
                        <th>Value (đ)</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>


                  <tbody>
                     <?php foreach($orders as $order){ ?>
                     <tr>
                        <td><input type="checkbox" class="flat" name="table_records[]" value="<?= $order['order_id']; ?>"></td>
                        <td><?= $order['order_id']; ?></td>
                        <td><?= $order['customer_name']; ?></td>
                        <td><?= date("d/m/Y H:i",$order['order_time']); ?></td>
                        <td><?= number_format($order['order_value']); ?></td>
                        <td><?= $order['order_success']==0?"<i style='color:red;'>Waitting</i>":"<i class='color:green;'>Done</i>"; ?></td>
                        <td><a href="/admin/order_detail/<?= $order['order_id']; ?>">Detail</a></td>
                     </tr> 
                     <?php } ?>
                  </tbody>
               </table>
               <div class="ln_solid"></div>
               <div class="form-group">
                  <input type="submit" id="delete_button" class="btn btn-danger" name="delete_records" value="Delete" />
                  <input type="submit" class="btn btn-success" name="done_records" value="Done" />
                  <input type="submit" class="btn btn-warning" name="waitting_records" value="Waitting" />
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<script>
   $("#delete_button").click(function(){
      if(confirm("Are you sure to delete?")) return true;
      return false;
   });
</script>