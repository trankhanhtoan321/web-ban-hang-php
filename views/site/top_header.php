<div class="top-header">
    <div class="container">
        <div class="nav-top-links">
            <a class="first-item" href="#"><span style="font-size:20px;" class="fa fa-phone"></span> <?= $this->setting_model->get('phone'); ?></a>
            <a href="mailto:<?= $this->setting_model->get('email'); ?>"><span style="font-size:20px;" class="fa fa-envelope"></span> <?= $this->setting_model->get('email'); ?></a>
        </div>
        <div class="support-link">
            <a href="#">Services</a>
            <a href="#">Support</a>
        </div>

        <div id="user-info-top" class="user-info pull-right">
            <div class="dropdown">
                <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>My Account</span></a>
                <ul class="dropdown-menu mega_dropdown" role="menu">
                    <li><a href="#">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>