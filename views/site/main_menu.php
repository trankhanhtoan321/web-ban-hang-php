<div id="main-menu" class="col-sm-12 main-menu">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#">MENU</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/">Trang Chủ</a></li>
                    <li><a href="#">Giới Thiệu</a></li>
                    <?php foreach($categorys as $cat){ if($cat['cat_parent_id'] == 0){ ?>
                    <li class="dropdown">
                        <a href="/danh-muc/<?= rewrite_url($cat['cat_name']); ?>-<?= $cat['cat_id']; ?>.html" class="dropdown-toggle" data-toggle="dropdown"><?= $cat['cat_name']; ?></a>
                        <ul class="dropdown-menu container-fluid">
                            <li class="block-container">
                                <ul class="block">
                                    <?php foreach ($categorys as $cat_temp) { if($cat_temp['cat_parent_id'] == $cat['cat_id']){ ?>
                                    <li class="link_container"><a href="/danh-muc/<?= rewrite_url($cat_temp['cat_name']); ?>-<?= $cat_temp['cat_id']; ?>.html"><?= $cat_temp['cat_name']; ?></a></li>
                                    <?php } } ?>
                                </ul>
                            </li>
                        </ul> 
                    </li>
                    <?php } } ?>
                    <li><a href="/cart">Giỏ Hàng</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</div>