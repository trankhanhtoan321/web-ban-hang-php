<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function dequycategory($categorys,$num=0)
{
	echo '<ul style="list-style-type:none;">';
	foreach($categorys as $cat)
	{
		if($cat['cat_parent_id'] == $num)
		{
			echo "<li><label class='control-label'><input id='tkt_cat_".$cat['cat_id']."' name='pro_cat_ids[]' type='checkbox' class='flat' value='".$cat['cat_id']."' /> ".$cat['cat_name']."</label>";
			dequycategory($categorys,$cat['cat_id']);
			echo "<li>";
		}
	}
	echo '</ul>';
}
?>
<div class="page-title">
	<div class="title_left">
		<h3>Edit Product</h3>
	</div>
</div>
<form enctype="multipart/form-data" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<a href="/admin/products" class="btn btn-primary"><span class="fa fa-arrow-left"></span> Back</a>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="pro_id">
							ID:
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="number" id="pro_id" class="form-control col-md-7 col-xs-12" value="<?= $product['pro_id']; ?>" name="pro_id" disabled />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="pro_sku">
							SKU:
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" id="pro_sku" class="form-control col-md-7 col-xs-12" value="<?= $product['pro_sku']; ?>" name="pro_sku" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="pro_name">
							Name:<span class="required">*</span>
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" id="pro_name" class="form-control col-md-7 col-xs-12" value="<?= $product['pro_name']; ?>" name="pro_name" required="required" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="pro_shortdescripttion">
							Short Descripttion:
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<textarea class="resizable_textarea form-control" name="pro_shortdescripttion"><?= $product['pro_shortdescripttion']; ?></textarea>
						</div>
					</div>
					<div class="form-group has-feedback">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="pro_price">
							Price:
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="number" id="pro_price" class="form-control col-md-7 col-xs-12 has-feedback-right" name="pro_price" value="<?= $product['pro_price'] ?>" />
							<span class="form-control-feedback right" aria-hidden="true">VND</span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="use_sale_price">
							Use Sale Price:
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="checkbox" id="use_sale_price" class="flat" value="1" name="use_sale_price" <?= $product['pro_price_sale']!=0?"checked":""; ?> />
							if use sale price, you must select and fill two field below.
						</div>
					</div>
					<div class="form-group has-feedback">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="pro_price_sale">
							Sale Price:
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="number" id="pro_price_sale" class="form-control col-md-7 col-xs-12 has-feedback-right" name="pro_price_sale" value="<?= $product['pro_price_sale']; ?>"/>
							<span class="form-control-feedback right" aria-hidden="true">VND</span>
							<small><i>(value = 0 if has no price sale)</i></small>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="pro_date_sale">
							Date Of Sale Price:
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<fieldset>
								<div class="control-group">
									<div class="controls">
										<div class="input-prepend input-group">
											<span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
											<input type="text" name="pro_date_sale" id="reservation-time" class="form-control" value='<?= date("m/d/Y H:i",$product['pro_price_sale_date_begin'])." - ".date("m/d/Y H:i",$product['pro_price_sale_date_finish']); ?>' />
										</div>
									</div>
								</div>
							</fieldset>
							<small><i>(Select date of sale price if has sale price, format: mm/dd/yyyy hh:mm am/pm)</i></small>
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
					<h2>Product Image:</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							<input type="file" class="form-control col-md-7 col-xs-12" name="pro_image" />
							<br/>
							<img style="width:200px;" src="<?= $product['pro_image']; ?>" />
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
					<h2>Product Category:</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="form-group">
						<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-1">
							<?php dequycategory($categorys); ?>
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
					<h2>Product SEO</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="pro_seo_title">
							Title:
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" id="pro_seo_title" class="form-control col-md-7 col-xs-12" name="pro_seo_title" value="<?= $product['pro_seo_title']; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="pro_seo_keyword">
							Keyword:
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" id="pro_seo_keyword" class="form-control col-md-7 col-xs-12" name="pro_seo_keyword" value="<?= $product['pro_seo_keyword']; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="pro_seo_description">
							Description:
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" id="pro_seo_description" class="form-control col-md-7 col-xs-12" name="pro_seo_description" value="<?= $product['pro_seo_description']; ?>" />
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
					<h2>Product Description</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<textarea class="ckeditor" name="pro_description"><?= $product['pro_description']; ?></textarea>
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
							<input type="submit" class="btn btn-success" name="update_product" value="Update" />
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 text-right">
							<a href="/admin/products" class="btn btn-danger">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</form>
<?php
$temp = json_decode($product['pro_cat_ids']);
if($temp){?>
<script>
	$(document).ready(function(){
		var tkt_cat = <?= $product['pro_cat_ids']; ?>;
		for (var i = tkt_cat.length - 1; i >= 0; i--) {
			$("#tkt_cat_"+tkt_cat[i]).attr("checked","checked");
		}
	});
</script>
<?php } ?>