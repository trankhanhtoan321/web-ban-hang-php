<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$userlogin = $this->session->userdata('userlogin');
?>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Update User Profile</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<form enctype="multipart/form-data" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_fullname">
							Full Name:<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="user_fullname" class="form-control col-md-7 col-xs-12" name="user_fullname" value="<?= $userlogin['user_fullname']; ?>" required="required" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_name">
							User Name:<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="user_name" class="form-control col-md-7 col-xs-12" name="user_name" required="required" value="<?= $userlogin['user_name']; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_email">
							User Email:<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="user_email" class="form-control col-md-7 col-xs-12" name="user_email" required="required" value="<?= $userlogin['user_email']; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_image">
							User Avatar:
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="file" id="user_image" class="form-control col-md-7 col-xs-12" name="user_image" />
							<br/><br/>
							<img src="<?= $userlogin['user_image']; ?>" class="img-responsive img-thumbnail" />
						</div>
					</div>
					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							<input type="submit" class="btn btn-success" name="update_profile" value="Update" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>