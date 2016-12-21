<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="/" title="Return to Home">Trang Chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Đặt Hàng</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2">Đặt Hàng</span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content checkout-page">
            <form action="" method="post" class="form-horizontal form-label-left">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                <h3 class="checkout-sep">1. Nhập Thông Tin</h3>
                <div class="box-border">
                    <ul>
                        <li class="row">
                            <div class="col-sm-6">
                                <label for="customer_name">Họ Tên:</label>
                                <input type="text" class="input form-control" name="customer_name" id="customer_name" required />
                            </div>
                            <div class="col-sm-6">
                                <label for="customer_tel">Số Điện Thoại:</label>
                                <input type="text" name="customer_tel" class="input form-control" id="customer_tel" required />
                            </div>
                        </li>
                        <li class="row">
                            <div class="col-sm-6">
                                <label for="customer_email">Email: </label>
                                <input type="email" name="customer_email" class="input form-control" id="customer_email" />
                            </div>
                            <div class="col-sm-6">
                                <label for="customer_address">Địa Chỉ: </label>
                                <input type="text" name="customer_address" class="input form-control" id="customer_address" required />
                            </div>
                        </li>
                        <li class="row">
                            <div class="col-xs-12">
                                <label for="customer_note">Ghi Chú:</label>
                                <textarea class="input form-control" rows="3" name="customer_note" id="customer_note"></textarea>
                            </div>
                        </li>
                    </ul>
                </div>
                <h3 class="checkout-sep">2. Giỏ Hàng</h3>
                <div class="box-border">
                    <table class="table table-bordered table-responsive cart_summary">
                        <thead>
                            <tr>
                                <th class="cart_product">Sản Phẩm</th>
                                <th>Mô Tả</th>
                                <th>Đơn Giá</th>
                                <th>Số Lượng</th>
                                <th>Thành Tiền</th>
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
                                <td class="qty"><?= $item['qty'] ?></td>
                                <td class="price"><span><?= number_format($item['subtotal']) ?> đ</span></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2"><strong>Tổng Cộng:</strong></td>
                                <td colspan="1"><strong><?= number_format($this->cart->total()); ?> đ</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                    <input type="submit" name="ordered" class="btn btn-success pull-right" value="Hoàn Thành" />
                </div>
            </form>
        </div>
    </div>
</div>