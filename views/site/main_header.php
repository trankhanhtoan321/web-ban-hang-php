<div class="container main-header">
    <div class="row">
        <div class="col-xs-12 col-sm-3 logo">
            <a href="/"><img src="<?= $this->setting_model->get('logo'); ?>" /></a>
        </div>
        <div class="col-xs-7 col-sm-7 header-search-box">
            <form class="form-inline">
                <div class="form-group form-category">
                    <select class="select-category">
                        <option value="0">All Categories</option>
                        <?php foreach($categorys as $cat){ ?>
                        <option value="<?= $cat['cat_id']; ?>"><?= $cat['cat_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group input-serach">
                    <input type="text"  placeholder="Keyword here...">
                </div>
                <button type="submit" class="pull-right btn-search"></button>
            </form>
        </div>
        <div class="col-xs-5 col-sm-2 group-button-header">
            <a title="Compare" href="#" class="btn-compare">compare</a>
            <a title="My wishlist" href="#" class="btn-heart">wishlist</a>
            <div class="btn-cart" id="cart-block">
                <a title="My cart" href="cart.html">Cart</a>
                <span class="notify notify-right">2</span>
                <div class="cart-block">
                    <div class="cart-block-content">
                        <h5 class="cart-title">2 Items in my cart</h5>
                        <div class="cart-block-list">
                            <ul>
                                <li class="product-info">
                                    <div class="p-left">
                                        <a href="#" class="remove_link"></a>
                                        <a href="#">
                                            <img class="img-responsive" src="assets/data/product-100x122.jpg" alt="p10">
                                        </a>
                                    </div>
                                    <div class="p-right">
                                        <p class="p-name">Donec Ac Tempus</p>
                                        <p class="p-rice">61,19 €</p>
                                        <p>Qty: 1</p>
                                    </div>
                                </li>
                                <li class="product-info">
                                    <div class="p-left">
                                        <a href="#" class="remove_link"></a>
                                        <a href="#">
                                            <img class="img-responsive" src="assets/data/product-s5-100x122.jpg" alt="p10">
                                        </a>
                                    </div>
                                    <div class="p-right">
                                        <p class="p-name">Donec Ac Tempus</p>
                                        <p class="p-rice">61,19 €</p>
                                        <p>Qty: 1</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="toal-cart">
                            <span>Total</span>
                            <span class="toal-price pull-right">122.38 €</span>
                        </div>
                        <div class="cart-buttons">
                            <a href="order.html" class="btn-check-out">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>