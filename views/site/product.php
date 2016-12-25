<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <a href="#" title="Return to Home">Fashion</a>
            <span class="navigation-pipe">&nbsp;</span>
            <a href="#" title="Return to Home">Women</a>
            <span class="navigation-pipe">&nbsp;</span>
            <a href="#" title="Return to Home">Dresses</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Maecenas consequat mauris</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-12" id="center_column">
                <!-- Product -->
                    <div id="product">
                        <div class="primary-box row">
                            <div class="pb-left-column col-xs-12 col-sm-5">
                                <!-- product-imge-->
                                <div class="product-image">
                                    <div class="product-full">
                                        <img id="product-zoom" src='<?= $product['pro_image']; ?>' data-zoom-image="<?=$product['pro_image']?>"/>
                                    </div>
                                    <!-- <div class="product-img-thumb" id="gallery_01">
                                        <ul class="owl-carousel" data-items="3" data-nav="true" data-dots="false" data-margin="21" data-loop="true">
                                            <li>
                                                <a href="#" data-image="assets/data/product-s3-420x512.jpg" data-zoom-image="assets/data/product-s3-850x1036.jpg">
                                                    <img id="product-zoom"  src="assets/data/product-s3-100x122.jpg" /> 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-image="assets/data/product-s2-420x512.jpg" data-zoom-image="assets/data/product-s2-850x1036.jpg">
                                                    <img id="product-zoom"  src="assets/data/product-s2-100x122.jpg" /> 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-image="assets/data/product-420x512.jpg" data-zoom-image="assets/data/product-850x1036.jpg">
                                                    <img id="product-zoom"  src="assets/data/product-100x122.jpg" /> 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-image="assets/data/product-s4-420x512.jpg" data-zoom-image="assets/data/product-s4-850x1036.jpg">
                                                    <img id="product-zoom"  src="assets/data/product-s4-100x122.jpg" /> 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-image="assets/data/product-s5-420x512.jpg" data-zoom-image="assets/data/product-s5-850x1036.jpg">
                                                    <img id="product-zoom"  src="assets/data/product-s5-100x122.jpg" /> 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-image="assets/data/product-s6-420x512.jpg" data-zoom-image="assets/data/product-s6-850x1036.jpg">
                                                    <img id="product-zoom"  src="assets/data/product-s6-100x122.jpg" /> 
                                                </a>
                                            </li>
                                        </ul>
                                    </div> -->
                                </div>
                                <!-- product-imge-->
                            </div>
                            <div class="pb-right-column col-xs-12 col-sm-7">
                                <h1 class="product-name"><?= $product['pro_name']; ?></h1>
                                <!-- <div class="product-comments">
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="comments-advices">
                                        <a href="#">Based  on 3 ratings</a>
                                        <a href="#"><i class="fa fa-pencil"></i> write a review</a>
                                    </div>
                                </div> -->
                                <div class="product-price-group">
                                    <span class="price"><?= $product['pro_price_sale']!=0?number_format($product['pro_price_sale']):number_format($product['pro_price']); ?> đ</span>
                                    <span class="old-price"><?= $product['pro_price_sale']!=0?number_format($product['pro_price']).' đ':''; ?></span>
                                    <?php if($product['pro_price_sale']!=0){ ?>
                                    <span class="discount">-<?= (int)((($product['pro_price']-$product['pro_price_sale'])/$product['pro_price'])*100) ?>%</span>
                                    <?php } ?>
                                </div>
                                <div class="info-orther">
                                    <p>SKU: <?= $product['pro_sku']; ?></p>
                                </div>
                                <div class="product-desc"><?= $product['pro_shortdescripttion']; ?></div>
                                <div class="form-option">
                                    <!-- <p class="form-option-title">Available Options:</p>
                                    <div class="attributes">
                                        <div class="attribute-label">Color:</div>
                                        <div class="attribute-list">
                                            <ul class="list-color">
                                                <li style="background:#0c3b90;"><a href="#">red</a></li>
                                                <li style="background:#036c5d;" class="active"><a href="#">red</a></li>
                                                <li style="background:#5f2363;"><a href="#">red</a></li>
                                                <li style="background:#ffc000;"><a href="#">red</a></li>
                                                <li style="background:#36a93c;"><a href="#">red</a></li>
                                                <li style="background:#ff0000;"><a href="#">red</a></li>
                                            </ul>
                                        </div>
                                    </div> -->
                                    <!-- <div class="attributes">
                                        <div class="attribute-label">Qty:</div>
                                        <div class="attribute-list product-qty">
                                            <div class="qty">
                                                <input id="option-product-qty" type="text" value="1">
                                            </div>
                                            <div class="btn-plus">
                                                <a id="qty-add-to-cart-up" href="#" class="btn-plus-up">
                                                    <i class="fa fa-caret-up"></i>
                                                </a>
                                                <a id="qty-add-to-cart-down" href="#" class="btn-plus-down">
                                                    <i class="fa fa-caret-down"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="attributes">
                                        <div class="attribute-label">Size:</div>
                                        <div class="attribute-list">
                                            <select>
                                                <option value="1">X</option>
                                                <option value="2">XL</option>
                                                <option value="3">XXL</option>
                                            </select>
                                            <a id="size_chart" class="fancybox" href="assets/data/size-chart.jpg">Size Chart</a>
                                        </div>
                                        
                                    </div> -->
                                </div>
                                <div class="form-action">
                                    <div class="button-group">
                                        <a class="btn-add-cart" title="Add to Cart" href="/cart/addcart/<?= $product['pro_id']; ?>">Mua Ngay</a>
                                    </div>
                                    <!-- <div class="button-group">
                                        <a class="wishlist" href="#"><i class="fa fa-heart-o"></i>
                                        <br>Wishlist</a>
                                        <a class="compare" href="#"><i class="fa fa-signal"></i>
                                        <br>        
                                        Compare</a>
                                    </div> -->
                                </div>
                                <!-- <div class="form-share">
                                    <div class="sendtofriend-print">
                                        <a href="javascript:print();"><i class="fa fa-print"></i> Print</a>
                                        <a href="#"><i class="fa fa-envelope-o fa-fw"></i>Send to a friend</a>
                                    </div>
                                    <div class="network-share">
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <!-- tab product -->
                        <div class="product-tab">
                            <ul class="nav-tab">
                                <li class="active"><a aria-expanded="false" data-toggle="tab" href="#product-detail">Product Details</a></li>
                                <!-- <li>
                                    <a aria-expanded="true" data-toggle="tab" href="#information">information</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#reviews">reviews</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#extra-tabs">Extra Tabs</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#guarantees">guarantees</a>
                                </li> -->
                            </ul>
                            <div class="tab-container">
                                <div id="product-detail" class="tab-panel active">
                                    <?= $product['pro_description']; ?>
                                </div>
                            </div>
                        </div>
                        <!-- ./tab product -->
                        <!-- box product -->
                        <div class="page-product-box">
                            <h3 class="heading">Related Products</h3>
                            <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                            <?php
                            foreach($products as $pro_temp)
                            {
                                $temp = json_decode($product['pro_cat_ids']);
                                $temp2= json_decode($pro_temp['pro_cat_ids']);
                                $kt=0;
                                foreach($temp as $temp3)
                                {
                                    if(in_array($temp3, $temp2))
                                    {
                                        $kt=1;
                                        break;
                                    }
                                }
                                if($kt && $product['pro_id']!=$pro_temp['pro_id'])
                                {
                                    ?>
                                    <li>
                                        <div class="product-container">
                                            <div class="left-block">
                                                <a href="/<?= rewrite_url($pro_temp['pro_name']); ?>-<?= $pro_temp['pro_id']; ?>.html">
                                                    <img class="img-responsive"  src="<?= $pro_temp['pro_image']; ?>" />
                                                </a>
                                                <!-- <div class="quick-view">
                                                        <a title="Add to my wishlist" class="heart" href="#"></a>
                                                        <a title="Add to compare" class="compare" href="#"></a>
                                                        <a title="Quick view" class="search" href="#"></a>
                                                </div> -->
                                                <div class="add-to-cart">
                                                    <a title="Add to Cart" href="/cart/addcart/<?= $pro_temp['pro_id']; ?>">Mua Ngay</a>
                                                </div>
                                            </div>
                                            <div class="right-block">
                                                <h5 class="product-name"><a href="/<?= rewrite_url($pro_temp['pro_name']); ?>-<?= $pro_temp['pro_id']; ?>.html"><?= $pro_temp['pro_name']; ?></a></h5>
                                                <!-- <div class="product-star">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div> -->
                                                <div class="content_price">
                                                    <span class="price product-price"><?= $pro_temp['pro_price_sale']!=0?number_format($pro_temp['pro_price_sale']):number_format($pro_temp['pro_price']); ?> đ</span>
                                                    <span class="price old-price"><?= $pro_temp['pro_price_sale']!=0?number_format($pro_temp['pro_price']).' đ':''; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                            </ul>
                        </div>
                        <!-- ./box product -->
                        <!-- box product -->
                        <div class="page-product-box">
                            <h3 class="heading">You might also like</h3>
                            <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                <?php
                                $random = array_rand($products,8);
                                foreach($random as $rand)
                                {
                                    ?>
                                    <li>
                                        <div class="product-container">
                                            <div class="left-block">
                                                <a href="/<?= rewrite_url($products[$rand]['pro_name']); ?>-<?= $products[$rand]['pro_id']; ?>.html">
                                                    <img class="img-responsive"  src="<?= $products[$rand]['pro_image']; ?>" />
                                                </a>
                                                <!-- <div class="quick-view">
                                                        <a title="Add to my wishlist" class="heart" href="#"></a>
                                                        <a title="Add to compare" class="compare" href="#"></a>
                                                        <a title="Quick view" class="search" href="#"></a>
                                                </div> -->
                                                <div class="add-to-cart">
                                                    <a title="Add to Cart" href="/cart/addcart/<?= $products[$rand]['pro_id']; ?>">Mua Ngay</a>
                                                </div>
                                            </div>
                                            <div class="right-block">
                                                <h5 class="product-name"><a href="/<?= rewrite_url($products[$rand]['pro_name']); ?>-<?= $products[$rand]['pro_id']; ?>.html"><?= $products[$rand]['pro_name']; ?></a></h5>
                                                <!-- <div class="product-star">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div> -->
                                                <div class="content_price">
                                                    <span class="price product-price"><?= $products[$rand]['pro_price_sale']!=0?number_format($products[$rand]['pro_price_sale']):number_format($products[$rand]['pro_price']); ?> đ</span>
                                                    <span class="price old-price"><?= $products[$rand]['pro_price_sale']!=0?number_format($products[$rand]['pro_price']).' đ':''; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- ./box product -->
                    </div>
                <!-- Product -->
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>