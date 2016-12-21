<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="/" title="Return to Home">Trang Chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Giỏ Hàng</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading no-line text-center">
            <span class="page-heading-title2">Giỏ Hàng</span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content page-order">
            <!-- <ul class="step">
                <li class="current-step"><span>01. Confirm</span></li>
                <li><span>02. Address</span></li>
                <li><span>03. Shipping</span></li>
                <li><span>04. Payment</span></li>
            </ul> -->
            <div class="heading-counter warning">Giỏ Hàng Bao Gồm:
                <span><?= $this->cart->total_items(); ?> Sản Phẩm</span>
            </div>
            <div class="order-detail-content">
                <form action="" method="post" class="form-horizontal form-label-left">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                    <table class="table table-bordered table-responsive cart_summary">
                        <thead>
                            <tr>
                                <th class="cart_product">Sản Phẩm</th>
                                <th>Mô Tả</th>
                                <th>Đơn Giá</th>
                                <th>Số Lượng</th>
                                <th>Thành Tiền</th>
                                <th class="action"><i class="fa fa-trash"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($this->cart->contents() as $item){ ?>
                            <tr>
                                <td class="cart_product">
                                    <a href="/<?= rewrite_url($item['name']); ?>-<?= $item['id']; ?>.html"><img style="width:100px" src="<?= $item['image']; ?>" /></a>
                                </td>
                                <td class="cart_description">
                                    <p class="product-name"><a href="/<?= rewrite_url($item['name']); ?>-<?= $item['id']; ?>.html"><?= $item['name']; ?></a></p>
                                    <small class="cart_ref">SKU : <?= $item['sku']; ?></small><br>
                                </td>

                                <td class="price"><span><?= number_format($item['price']); ?> đ</span></td>
                                <td class="qty">
                                <input name="item_<?= $item['rowid']; ?>" class="form-control input-sm" min="1" type="number" value="<?= $item['qty'] ?>" >
                                </td>
                                <td class="price">
                                    <span><?= number_format($item['subtotal']) ?> đ</span>
                                </td>
                                <td class="action">
                                    <a href="/cart/delete/<?= $item['rowid']; ?>">Delete item</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="text-center"><input class="btn btn-warning" type="submit" name="update_cart" value="Cập Nhật"></td>
                                <td colspan="2"><strong>Tổng Cộng:</strong></td>
                                <td colspan="2"><strong><?= number_format($this->cart->total()); ?> đ</strong></td>
                            </tr>
                        </tfoot>    
                    </table>
                </form>
                <div class="cart_navigation">
                    <a class="prev-btn" href="/">Tiếp Tục Mua Hàng</a>
                    <a class="next-btn" href="/order">Đặt Hàng</a>
                </div>
            </div>
        </div>
    </div>
</div>