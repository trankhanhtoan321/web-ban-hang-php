<div class="category-featured <?= $type_cat ?>">
    <nav class="navbar nav-menu show-brand">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-brand">
            <a href="/danh-muc/<?= rewrite_url($category['cat_name']); ?>-<?= $category['cat_id']; ?>.html"><?= $category['cat_name']; ?></a>
        </div>
          <span class="toggle-menu"></span>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">           
          <!-- <ul class="nav navbar-nav">
            <li class="active"><a data-toggle="tab" href="#tab-4">Best salers</a></li>
            <li><a data-toggle="tab" href="#tab-5">Specials</a></li>
            <li><a data-toggle="tab" href="#tab-4">New Arrivals</a></li>
            <li><a data-toggle="tab" href="#tab-5">Most Reviews</a></li>
            <li><a data-toggle="tab" href="#tab-4">On Sales</a></li>
            <li><a data-toggle="tab" href="#tab-5">Trending</a></li>
          </ul> -->
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
      <div id="elevator-<?= $elevator; ?>" class="floor-elevator">
            <a href="#<?= ($elevator-1)>0?'elevator-'.($elevator-1):''; ?>" class="btn-elevator up fa fa-angle-up"></a>
            <a href="#elevator-<?= $elevator+1; ?>" class="btn-elevator down fa fa-angle-down"></a>
      </div>
    </nav>
   <div class="product-featured clearfix">
        <div class="row">
            <div class="col-sm-2 sub-category-wapper">
                <ul class="sub-category-list">
                    <?php foreach($categorys as $cat){ if($cat['cat_parent_id']==$category['cat_id']){ ?>
                    <li><a href="/danh-muc/<?= rewrite_url($cat['cat_name']); ?>-<?= $cat['cat_id']; ?>.html"><?= $cat['cat_name']; ?></a></li>
                    <?php } } ?>
                </ul>
            </div>
            <div class="col-sm-10 col-right-tab">
                <div class="product-featured-tab-content">
                    <div class="tab-container">
                        <div class="tab-panel active" id="tab-4">
                           <!-- <div class="box-left">
                               <div class="banner-img">
                                    <a href="#"><img src="assets/data/banner-product1.jpg" alt="Banner Product"></a>
                                </div>
                           </div> -->
                           <div >
                               <ul class="product-list row">
                                    <?php foreach($products as $pro){ ?>
                                    <li class="col-sm-3">
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="/<?= rewrite_url($pro['pro_name']); ?>-<?= $pro['pro_id']; ?>.html"><?= $pro['pro_name']; ?></a></h5>
                                            <div class="content_price">
                                                <span class="price product-price"><?= $pro['pro_price_sale']!=0?number_format($pro['pro_price_sale']):number_format($pro['pro_price']); ?> đ</span>
                                                <span class="price old-price"><?= $pro['pro_price_sale']!=0?number_format($pro['pro_price']).' đ':''; ?></span>
                                            </div>
                                        </div>
                                        <div class="left-block">
                                            <a href="/<?= rewrite_url($pro['pro_name']); ?>-<?= $pro['pro_id']; ?>.html">
                                                <img class="img-responsive" src="<?= $pro['pro_image']; ?>" />
                                            </a>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="/cart/addcart/<?= $pro['pro_id']; ?>">Mua Ngay</a>
                                            </div>
                                            <?php if($pro['pro_price_sale']!=0){ ?>
                                            <div class="price-percent-reduction2">
                                                -<?= (int)((($pro['pro_price']-$pro['pro_price_sale'])/$pro['pro_price'])*100) ?>%
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </li>
                                    <?php } ?>
                               </ul>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>