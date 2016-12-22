<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="page-title">
   <div class="title_left">
      <h3>New Slide</h3>
   </div>
</div>
<form enctype="multipart/form-data" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">

   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_content">
               <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slide_image">
                     Images:<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <input type="file" id="slide_image" class="form-control col-md-7 col-xs-12" name="slide_image" required />
                  </div>
               </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slide_link">
                     Link On Slide:
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <input type="text" id="slide_link" class="form-control col-md-7 col-xs-12" name="slide_link" />
                  </div>
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
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                     <input type="submit" class="btn btn-success" name="new_slide" value="Create" />
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

</form>