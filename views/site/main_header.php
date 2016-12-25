<div class="container main-header">
    <div class="row">
        <div class="col-xs-12 col-sm-3 logo">
            <a href="/"><img src="<?= $this->setting_model->get('logo'); ?>" /></a>
        </div>
        <div class="col-xs-7 col-sm-7 header-search-box">
            <form class="form-inline" action="/search" method="post" >
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                <div class="form-group form-category">
                    <select name="category" class="select-category">
                        <option value="0">All Categories</option>
                        <?php foreach($categorys as $cat){ ?>
                        <option value="<?= $cat['cat_id']; ?>"><?= $cat['cat_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group input-serach">
                    <input name="keyword" type="text"  placeholder="Keyword here...">
                </div>
                <button type="submit" class="pull-right btn-search"></button>
            </form>
        </div>
        <div class="col-xs-5 col-sm-2 group-button-header">
            <!-- <a title="Compare" href="#" class="btn-compare">compare</a>
            <a title="My wishlist" href="#" class="btn-heart">wishlist</a> -->
            <div class="btn-cart" id="cart-block">
                <a href="/cart">Giỏ Hàng</a>
                <span class="notify notify-right"><?= $this->cart->total_items(); ?></span>
                <div class="cart-block">
                    <div class="cart-block-content">
                        <!-- <h5 class="cart-title">2 Items in my cart</h5> -->
                        <div class="cart-block-list">
                            <ul>
                                <?php foreach($this->cart->contents() as $item){ ?>
                                <li class="product-info">
                                    <div class="p-left">
                                        <!-- <a href="#" class="remove_link"></a> -->
                                        <a href="/<?= rewrite_url($item['name']); ?>-<?= $item['id']; ?>.html">
                                            <img class="img-responsive" src="<?= $item['image']; ?>" />
                                        </a>
                                    </div>
                                    <div class="p-right">
                                        <p class="p-name"><?= $item['name']; ?></p>
                                        <p class="p-rice"><?= number_format($item['price']); ?> đ</p>
                                        <p>SL: <?= $item['qty']; ?></p>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="toal-cart">
                            <span>Tổng Cộng:</span>
                            <span class="toal-price pull-right"><?= number_format($this->cart->total()); ?> đ</span>
                        </div>
                        <div class="cart-buttons">
                            <a href="/order" class="btn-check-out">Đặt Hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>