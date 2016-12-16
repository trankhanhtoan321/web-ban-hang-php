<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="page-title">
	<div class="title_left">
		<h3>Edit Category</h3>
	</div>
</div>
<form enctype="multipart/form-data" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<a href="/admin/categorys" class="btn btn-primary"><span class="fa fa-arrow-left"></span> Back</a>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_id">
							ID:
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input value="<?= $category['cat_id']; ?>" type="number" id="cat_id" class="form-control col-md-7 col-xs-12" name="cat_id" readonly />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_name">
							Name:<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input value="<?= $category['cat_name']; ?>" type="text" id="cat_name" class="form-control col-md-7 col-xs-12" name="cat_name" required="required" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_image">
							Images:
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="file" id="cat_image" class="form-control col-md-7 col-xs-12" name="cat_image"/><br/>
							<img class="img-thumbnail" style="width:200px;" src="<?= $category['cat_image']; ?>" />
						</div>
					</div>
					<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Category Parent:</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select name="cat_parent_id" class="select2_single form-control" tabindex="-1">
								<option></option>
								<option value="0">None (NULL)</option>
								<?php foreach($categorys as $cat){ if($cat['cat_id']!=$category['cat_id']){ ?>
									<option <?php if($cat['cat_id']==$category['cat_parent_id']) echo "selected"; ?> value="<?= $cat['cat_id']; ?>"><?= $cat['cat_name']; ?></option>
								<?php }} ?>
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
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_seo_title">
							Title:
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input value="<?= $category['cat_seo_title']; ?>" type="text" id="cat_seo_title" class="form-control col-md-7 col-xs-12" name="cat_seo_title" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_seo_keyword">
							Keyword:
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input value="<?= $category['cat_seo_keyword']; ?>" type="text" id="cat_seo_keyword" class="form-control col-md-7 col-xs-12" name="cat_seo_keyword" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_seo_description">
							Description:
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input value="<?= $category['cat_seo_description']; ?>" type="text" id="cat_seo_description" class="form-control col-md-7 col-xs-12" name="cat_seo_description" />
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
							<textarea class="ckeditor" name="cat_description"><?= $category['cat_description']; ?></textarea>
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
							<input type="submit" class="btn btn-success" name="update_category" value="Update" />
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 text-right">
							<a href="/admin/categorys" class="btn btn-danger">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</form>