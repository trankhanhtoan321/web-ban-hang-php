<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="page-title">
   <div class="title_left">
      <h3>Edit Category</h3>
   </div>
</div>
<form enctype="multipart/form-data" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">

   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_title">
               <a href="/admin/blogcategory" class="btn btn-primary"><span class="fa fa-arrow-left"></span> Back</a>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blogcat_id">
                     Category ID:<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <input type="text" id="blogcat_id" class="form-control col-md-7 col-xs-12" name="blogcat_id" disabled value="<?= $blogcategory['blogcat_id']; ?>" />
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blogcat_name">
                     Category Name:<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <input type="text" id="blogcat_name" class="form-control col-md-7 col-xs-12" name="blogcat_name" required="required" value="<?= $blogcategory['blogcat_name']; ?>" />
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blogcat_image">
                     Images:
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <input type="file" id="blogcat_image" class="form-control col-md-7 col-xs-12" name="blogcat_image"/>
                     <img style="width:200px;" src="<?= $blogcategory['blogcat_image']; ?>" />
                  </div>
               </div>
               <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12">Category Parent:</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <select name="blogcat_parent_id" class="select2_single form-control" tabindex="-1">
                        <option></option>
                        <option value="0">None (NULL)</option>
                        <?php foreach($blogcategorys as $blogcat){ ?>
                           <option <?php if($blogcat['blogcat_id']==$blogcategory['blogcat_parent_id']) echo "selected"; ?> value="<?= $blogcat['blogcat_id']; ?>"><?= $blogcat['blogcat_name']; ?></option>
                        <?php } ?>
                     </select>
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
               <h2>Category SEO</h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blogcat_seo_title">
                     Title:
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                     <input type="text" id="blogcat_seo_title" class="form-control col-md-7 col-xs-12" name="blogcat_seo_title" value="<?= $blogcategory['blogcat_seo_title']; ?>" />
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blogcat_seo_keyword">
                     Keyword:
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                     <input type="text" id="blogcat_seo_keyword" class="form-control col-md-7 col-xs-12" name="blogcat_seo_keyword" value="<?= $blogcategory['blogcat_seo_keyword']; ?>" />
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blogcat_seo_description">
                     Description:
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                     <input type="text" id="blogcat_seo_description" class="form-control col-md-7 col-xs-12" name="blogcat_seo_description" value="<?= $blogcategory['blogcat_seo_description']; ?>" />
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
               <h2>Category Description</h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div class="form-group">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <textarea class="ckeditor" name="blogcat_description"><?= $blogcategory['blogcat_description']; ?></textarea>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_content">
               <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                     <input type="reset" class="btn btn-warning" value="Reset" />
                     <input type="submit" class="btn btn-success" name="update_blogcategory" value="Update" />
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                     <a href="/admin/blogcategory" class="btn btn-danger">Cancel</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

</form>