<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-title">
   <div class="title_left">
      <h3>Articles</h3>
   </div>
</div>
<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
         <div class="x_title">
            <a href="/admin/new_blog" class="btn btn-success">Add New</a>
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
                        <th>Image</th>
                        <th>Name</th>
                        <th>Time</th>
                        <th>Action</th>
                     </tr>
                  </thead>


                  <tbody>
                     <?php foreach($blogs as $blog){ ?>
                     <tr>
                        <td><input type="checkbox" class="flat" name="table_records[]" value="<?= $blog['blog_id']; ?>"></td>
                        <td><?= $blog['blog_id']; ?></td>
                        <td><img style="width:50px" src="<?= $blog['blog_image']; ?>" /></td>
                        <td><b><?= $blog['blog_name']; ?></b></td>
                        <td><?= date("d/m/Y H:i",$blog['blog_time']); ?></td>
                        <td>
                           <a href="/admin/update_blog/<?= $blog['blog_id']; ?>" class="btn btn-warning"><span class="fa fa-edit"></span></a>
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