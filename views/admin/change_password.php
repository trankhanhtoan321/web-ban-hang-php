<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$userlogin = $this->session->userdata('userlogin');
?>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Change Password</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<form action="" method="post" class="form-horizontal form-label-left">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="old_password">
							Old Password:<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="old_password" class="form-control col-md-7 col-xs-12" name="old_password" required="required" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_password">
							New Password:<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="new_password" class="form-control col-md-7 col-xs-12" name="new_password" required="required" />
						</div>
					</div>
					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							<input type="submit" class="btn btn-success" name="change_password" value="Change Password" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>