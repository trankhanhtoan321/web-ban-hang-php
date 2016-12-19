<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="page-title">
	<div class="title_left">
		<h3>Genaral setting</h3>
	</div>
</div>
<form enctype="multipart/form-data" action="" method="post" class="form-horizontal form-label-left">
	<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Home page SEO</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="set_pagetitle	">
							Page title:
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input value="<?= $this->setting_model->get('set_pagetitle'); ?>" type="text" id="set_pagetitle" class="form-control col-md-7 col-xs-12" name="set_pagetitle" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="set_pagekeyword">
							Page keyword:
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input value="<?= $this->setting_model->get('set_pagekeyword'); ?>" type="text" id="set_pagekeyword" class="form-control col-md-7 col-xs-12" name="set_pagekeyword" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="set_pagedescriptiton">
							Page description:
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<textarea class="form-control resizable_textarea" name="set_pagedescriptiton"><?= $this->setting_model->get('set_pagedescriptiton'); ?></textarea>
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
					<h2>General</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="author">
							Author
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input value="<?= $this->setting_model->get('author'); ?>" type="text" id="author" class="form-control col-md-7 col-xs-12" name="author" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">
							Address:
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input value="<?= $this->setting_model->get('address'); ?>" type="text" id="address" class="form-control col-md-7 col-xs-12" name="address" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">
							Phone:
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input value="<?= $this->setting_model->get('phone'); ?>" type="text" id="phone" class="form-control col-md-7 col-xs-12" name="phone" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
							Email:
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input value="<?= $this->setting_model->get('email'); ?>" type="text" id="email" class="form-control col-md-7 col-xs-12" name="email" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">
							Logo:
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input value="<?= $this->setting_model->get('logo'); ?>" type="file" id="logo" class="form-control col-md-7 col-xs-12" name="logo" /><br/>
							<br/>
							<img style="width:300px;" src="<?= $this->setting_model->get('logo'); ?>" />
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
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="reset" class="btn btn-warning" value="Reset" />
							<input type="submit" class="btn btn-success" name="save_setting" value="Save" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</form>