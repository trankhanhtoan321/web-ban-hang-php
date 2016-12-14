<div class="page-title">
   <div class="title_left">
      <h3>Categorys</h3>
   </div>
</div>
<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">

         <div class="x_title">
            <a href="/admin/add_product_category" class="btn btn-success">Add New</a>
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
                        <th>Category Image</th>
                        <th>Category Name</th>
                        <th>Category Parent</th>
                        <th>Action</th>
                     </tr>
                  </thead>


                  <tbody>
                     <?php foreach($categorys as $cat){ ?>
                     <tr>
                        <td><input type="checkbox" class="flat" name="table_records[]" value="<?= $cat['cat_id']; ?>"></td>
                        <td><?= $cat['cat_id']; ?></td>
                        <td><img style="width:50px" src="<?= $cat['cat_image']; ?>" /></td>
                        <td><b><?= $cat['cat_name']; ?></b></td>
                        <td>
                           <?php
                           $t1 = 0;
                           foreach($categorys as $temp)
                           {
                              if($temp['cat_id'] == $cat['cat_parent_id'])
                              {
                                 $t1 = 1;
                                 echo $temp['cat_name'];
                                 break;
                              }
                           }
                           if($t1 == 0) echo '<i>NULL</i>';
                           ?>
                        </td>
                        <td>
                           <!-- modal -->
                           <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal_<?= $cat['cat_id']; ?>">View</button>
                           <div id="myModal_<?= $cat['cat_id']; ?>" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                       <h4 class="modal-title"><?= $cat['cat_name']; ?> info</h4>
                                    </div>
                                    <div class="modal-body">
                                       <p>
                                          <b>Category ID:</b> <?= $cat['cat_id']; ?><br/>
                                          <b>Category Name:</b> <?= $cat['cat_name']; ?><br/>
                                          <b>Category Parent:</b>
                                          <?php
                                             $t1 = 0;
                                             foreach($categorys as $temp)
                                             {
                                                if($temp['cat_id'] == $cat['cat_parent_id'])
                                                {
                                                   $t1 = 1;
                                                   echo $temp['cat_name'];
                                                   break;
                                                }
                                             }
                                             if($t1 == 0) echo '<i>NULL</i>';
                                          ?>
                                          <div class="ln_solid"></div>
                                          <b>SEO info:</b><br/>
                                          <b>title:</b><?= $cat['cat_seo_title']; ?><br/>
                                          <b>keyword:</b><?= $cat['cat_seo_keyword']; ?><br/>
                                          <b>description:</b><?= $cat['cat_seo_description']; ?>
                                          <div class="ln_solid"></div>
                                          <b>Category Image:</b><br/><img style="width:100px" src="<?= $cat['cat_image']; ?>" /><br/>
                                          <b>Category Description:</b><br/>
                                          <?= $cat['cat_description']; ?>
                                       </p>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- /mdoal -->
                        </td>
                     </tr> 
                     <?php } ?>
                  </tbody>
               </table>
               <div class="ln_solid"></div>
               <div class="form-group">
                  <input type="submit" class="btn btn-danger" name="delete_records" value="Delete" />
               </div>
            </form>
         </div>
      </div>
   </div>
</div>