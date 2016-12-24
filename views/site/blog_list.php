<div class="blog-list">
    <h2 class="page-heading">
        <span class="page-heading-title">Bài Viết</span>
    </h2>
    <div class="blog-list-wapper">
        <ul class="owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
            <?php $dem=0; foreach($blogs as $blog){ if(++$dem==10) break;?>
            <li>
                <div class="post-thumb image-hover2">
                    <a href="/blog/<?= rewrite_url($blog['blog_name']); ?>-<?= $blog['blog_id']; ?>.html"><img src="<?= $blog['blog_image']; ?>" ></a>
                </div>
                <div class="post-desc">
                    <h5 class="post-title">
                        <a href="/blog/<?= rewrite_url($blog['blog_name']); ?>-<?= $blog['blog_id']; ?>.html"><?= $blog['blog_name']; ?></a>
                    </h5>
                    <div class="post-meta">
                        <span class="date"><?= date("d/m/Y H:i",$blog['blog_time']); ?></span>
                        <!-- <span class="comment">27 comment</span> -->
                    </div>
                    <div class="readmore">
                        <a href="/blog/<?= rewrite_url($blog['blog_name']); ?>-<?= $blog['blog_id']; ?>.html">Xem Thêm</a>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>