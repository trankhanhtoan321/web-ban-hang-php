<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="page-title">
   <div class="title_left">
      <h3>Products</h3>
   </div>
</div>
<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">

         <div class="x_title">
            <a href="/admin/new_product" class="btn btn-success">Add New</a>
         </div>

         <div class="clearfix"></div>

         <div class="x_content">
            <form action="" method="post">
               <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
               <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>SKU</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Short Description</th>
                        <th>Price (VND)</th>
                        <th>Price Sale (VND)</th>
                        <th>Action</th>
                     </tr>
                  </thead>


                  <tbody>
                     <?php foreach($products as $pro){ ?>
                     <tr>
                        <td><input type="checkbox" class="flat" name="table_records[]" value="<?= $pro['pro_id']; ?>"></td>
                        <td><?= $pro['pro_id']; ?></td>
                        <td><?= $pro['pro_sku']; ?></td>
                        <td><b><?= $pro['pro_name']; ?></b></td>
                        <td><img style="width:50px" src="<?= $pro['pro_image']; ?>" /></td>
                        <td><?= $pro['pro_shortdescripttion']; ?></td>
                        <td><?= number_format($pro['pro_price']); ?></td>
                        <td><?= $pro['pro_price_sale']!=0?number_format($pro['pro_price_sale']):'<i>NULL</i>' ?></td>
                        <td>
                           <!-- modal -->
                           <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal_<?= $pro['pro_id']; ?>"><span class="fa fa-search"></span></button>
                           <div id="myModal_<?= $pro['pro_id']; ?>" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                       <h4 class="modal-title"><?= $pro['pro_name']; ?></h4>
                                    </div>
                                    <div class="modal-body">
                                       <b>ID: </b><?= $pro['pro_id']; ?><br/>
                                       <b>Name: </b><?= $pro['pro_name']; ?><br/>
                                       <b>Price: </b><?= number_format($pro['pro_price']); ?> VND<br/>
                                       <b>Image: </b><br/><img style="width:200px;" src="<?= $pro['pro_image']; ?>" /><br/>
                                       
                                       <div class="ln_solid"></div>
                                       
                                       <b>Price Sale: </b><?= $pro['pro_price_sale']!=0?number_format($pro['pro_price_sale']).'VND':'<i>NULL</i>' ?><br/>
                                       <b>Product sale date begin: </b><?= date("H:i d/m/Y",$pro['pro_price_sale_date_begin']); ?><br/>
                                       <b>Product sale date finish: </b><?= date("H:i d/m/Y",$pro['pro_price_sale_date_finish']); ?><br/>

                                       <div class="ln_solid"></div>

                                       <b>Title SEO: </b><?= $pro['pro_seo_title']; ?><br/>
                                       <b>Description SEO: </b><?= $pro['pro_seo_description']; ?><br/>
                                       <b>Keyword SEO: </b><?= $pro['pro_seo_keyword']; ?><br/>
                                       
                                       <div class="ln_solid"></div>
                                       <b>Short description:</b><br/><?= $pro['pro_shortdescripttion']; ?><br/>

                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- /mdoal -->
                           <a href="/admin/update_product/<?= $pro['pro_id']; ?>" class="btn btn-warning"><span class="fa fa-edit"></span></a>
                        </td>
                     </tr> 
                     <?php } ?>
                  </tbody>
               </table>
               <div class="ln_solid"></div>
               <div class="form-group">
                  <input type="submit" id="delete_button" class="btn btn-danger" name="delete_records" value="Delete" />
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