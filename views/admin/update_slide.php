<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="page-title">
   <div class="title_left">
      <h3>Edit Slide</h3>
   </div>
</div>
<form enctype="multipart/form-data" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">

   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_title">
              <a class="btn btn-primary" href="/admin/slides">Back</a>
            </div>
            <div class="x_content">
               <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slide_id">
                   Slide ID:
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                   <input value="<?= $slide['slide_id']; ?>" type="number" id="slide_id" class="form-control col-md-7 col-xs-12" name="slide_id" disabled />
                </div>
             </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slide_image">
                    Images:
                 </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="slide_image" class="form-control col-md-7 col-xs-12" name="slide_image" />
                    <br/><br/>
                    <img style="width:300px;" src="<?= $slide['slide_image']; ?>" />
                 </div>
              </div>
              <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slide_link">
                   Link On Slide:
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                   <input value="<?= $slide['slide_link']; ?>" type="text" id="slide_link" class="form-control col-md-7 col-xs-12" name="slide_link" />
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
           <input type="submit" class="btn btn-success" name="update_slide" value="Update" />
        </div>
     </div>
  </div>
</div>
</div>
</div>

</form>