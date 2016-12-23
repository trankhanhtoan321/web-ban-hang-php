<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-title">
   <div class="title_left">
      <h3>Slides</h3>
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
                        <th>Image</th>
                        <th>Link</th>
                        <th>Action</th>
                     </tr>
                  </thead>


                  <tbody>
                     <?php foreach($slides as $slide){ ?>
                     <tr>
                        <td><input type="checkbox" class="flat" name="table_records[]" value="<?= $slide['slide_id']; ?>"></td>
                        <td><?= $slide['slide_id']; ?></td>
                        <td><img style="width:200px;" src="<?= $slide['slide_image']; ?>" /></td>
                        <td><?= $slide['slide_link']; ?></td>
                        <td><a href="/admin/update_slide/<?= $slide['slide_id']; ?>">Edit</a></td>
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