<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
$userlogin = $this->session->userdata('userlogin'); 
?>

<li class="">
    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <img src="<?= ($userlogin['user_image']!=NULL?$userlogin['user_image']:'/uploads/icons/user.png'); ?>"><?= $userlogin['user_name']; ?>
        <span class=" fa fa-angle-down"></span>
    </a>
    <ul class="dropdown-menu dropdown-usermenu pull-right">
        <li><a href="/admin/profile_user"><i class="fa fa-info pull-right"></i> Profile</a></li>
        <li><a href="/admin/change_password"><i class="fa fa-lock pull-right"></i> Change Password</a></li>
        <li><a href="javascript:;"><i class="fa fa-question-circle pull-right"></i> Help</a></li>
        <li><a href="/login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
    </ul>
</li>