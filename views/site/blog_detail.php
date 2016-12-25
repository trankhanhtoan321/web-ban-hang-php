<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Trang Chủ</a>
            
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
            <div class="column col-xs-12 col-sm-3" id="left_column">
                <!-- Blog category -->
                <div class="block left-module">
                    <p class="title_block">Blog Categories</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="tree-menu">
                                    <?php foreach($blogcategorys as $blogcat) { ?>
                                        <li><span></span><a href="/blogcat/<?= rewrite_url($blogcat['blogcat_name']); ?>-<?= $blogcat['blogcat_id']; ?>.html"><?= $blogcat['blogcat_name']; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                <!-- ./blog category  -->
                <!-- Popular Posts -->
                <div class="block left-module">
                    <p class="title_block">Popular Posts</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered">
                            <div class="layered-content">
                                <ul class="blog-list-sidebar clearfix">
                                    <?php $dem=0; foreach($popularblogs as $blogpop){ if(++$dem>=7) break; ?>
                                    <li>
                                        <div class="post-thumb">
                                            <a href="/blog/<?= rewrite_url($blogpop['blog_name']); ?>-<?= $blogpop['blog_id']; ?>.html"><img src="<?= $blogpop['blog_image']; ?>" /></a>
                                        </div>
                                        <div class="post-info">
                                            <h5 class="entry_title"><a href="/blog/<?= rewrite_url($blogpop['blog_name']); ?>-<?= $blogpop['blog_id']; ?>.html"><?= $blogpop['blog_name']; ?></a></h5>
                                            <div class="post-meta">
                                                <span class="date"><i class="fa fa-calendar"></i> <?= date("d/m/Y",$blogpop['blog_time']); ?></span>
                                                <!-- <span class="comment-count">
                                                    <i class="fa fa-comment-o"></i> 3
                                                </span> -->
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                <!-- ./Popular Posts -->
                <!-- Banner -->
                <!-- <div class="block left-module">
                    <div class="banner-opacity">
                        <a href="#"><img src="assets/data/slide-left.jpg" alt="ads-banner"></a>
                    </div>
                </div> -->
                <!-- ./Banner -->
                <!-- Recent Comments -->
                <!-- <div class="block left-module">
                    <p class="title_block">Recent Comments</p>
                    <div class="block_content"> -->
                        <!-- layered -->
                        <!-- <div class="layered">
                            <div class="layered-content">
                                <ul class="recent-comment-list">
                                    <li>
                                        <h5><a href="#">Lorem ipsum dolor sit amet</a></h5>
                                        <div class="comment">
                                            "Consectetuer adipis. Mauris accumsan nulla vel diam. Sed in..."
                                        </div>
                                        <div class="author">Posted by <a href="#">Admin</a></div>
                                    </li>
                                    <li>
                                        <h5><a href="#">Lorem ipsum dolor sit amet</a></h5>
                                        <div class="comment">
                                            "Consectetuer adipis. Mauris accumsan nulla vel diam. Sed in..."
                                        </div>
                                        <div class="author">Posted by <a href="#">Admin</a></div>
                                    </li>
                                    <li>
                                        <h5><a href="#">Lorem ipsum dolor sit amet</a></h5>
                                        <div class="comment">
                                            "Consectetuer adipis. Mauris accumsan nulla vel diam. Sed in..."
                                        </div>
                                        <div class="author">Posted by <a href="#">Admin</a></div>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                        <!-- ./layered -->
                    <!-- </div>
                </div> -->
                <!-- ./Recent Comments -->
                <!-- tags -->
                <!-- <div class="block left-module">
                    <p class="title_block">TAGS</p>
                    <div class="block_content">
                        <div class="tags">
                            <a href="#"><span class="level1">actual</span></a>
                            <a href="#"><span class="level2">adorable</span></a>
                            <a href="#"><span class="level3">change</span></a>
                            <a href="#"><span class="level4">consider</span></a>
                            <a href="#"><span class="level3">phenomenon</span></a>
                            <a href="#"><span class="level4">span</span></a>
                            <a href="#"><span class="level1">spanegs</span></a>
                            <a href="#"><span class="level5">spanegs</span></a>
                            <a href="#"><span class="level1">actual</span></a>
                            <a href="#"><span class="level2">adorable</span></a>
                            <a href="#"><span class="level3">change</span></a>
                            <a href="#"><span class="level4">consider</span></a>
                            <a href="#"><span class="level2">gives</span></a>
                            <a href="#"><span class="level3">change</span></a>
                            <a href="#"><span class="level2">gives</span></a>
                            <a href="#"><span class="level1">good</span></a>
                            <a href="#"><span class="level3">phenomenon</span></a>
                            <a href="#"><span class="level4">span</span></a>
                            <a href="#"><span class="level1">spanegs</span></a>
                            <a href="#"><span class="level5">spanegs</span></a>
                        </div>
                    </div>
                </div> -->
                <!-- ./tags -->
                <!-- Banner -->
                <!-- <div class="block left-module">
                    <div class="banner-opacity">
                        <a href="#"><img src="assets/data/slide-left2.jpg" alt="ads-banner"></a>
                    </div>
                </div> -->
                <!-- ./Banner -->
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <h1 class="page-heading">
                    <span class="page-heading-title2"><?= $blog['blog_name']; ?></span>
                </h1>
                <article class="entry-detail">
                    <div class="entry-meta-data">
                        <!-- <span class="author">
                        <i class="fa fa-user"></i> 
                        by: <a href="#">Admin</a></span> -->
                        <span class="cat">
                            <i class="fa fa-folder-o"></i>
                            <?php
                            $blogcat_cur = json_decode($blog['blog_cat_ids']);
                            foreach($blogcategorys as $blogcat)
                            {
                                if(!is_array($blogcat_cur)) break;
                                if(in_array($blogcat['blogcat_id'], $blogcat_cur))
                                {
                                    ?>
                                    <a href="/blogcat/<?= rewrite_url($blogcat['blogcat_name']); ?>-<?= $blogcat['blogcat_id']; ?>.html"><?= $blogcat['blogcat_name']; ?>, </a>
                                    <?php
                                }
                            }
                            ?>
                        </span>
                        <!-- <span class="comment-count">
                            <i class="fa fa-comment-o"></i> 3
                        </span> -->
                        <span class="date"><i class="fa fa-calendar"></i> <?= date("d/m/Y H:i",$blog['blog_time']); ?></span>
                        <!-- <span class="post-star">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(7 votes)</span>
                        </span> -->
                    </div>
                    <div class="entry-photo">
                        <img src="<?= $blog['blog_image']; ?>" />
                    </div>
                    <div class="content-text clearfix">
                        <?= $blog['blog_content']; ?>
                    </div>
                    <!-- <div class="entry-tags">
                        <span>Tags:</span>
                        <a href="#">beauty,</a>
                        <a href="#">medicine,</a>
                        <a href="#">health</a>
                    </div> -->
                </article>
                <!-- Related Posts -->
                <div class="single-box">
                    <h2>Bài Viết Khác</h2>
                    <ul class="related-posts owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":2},"1000":{"items":3}}'>
                        <?php
                        $dem=0;
                        $blogcat_cur = json_decode($blog['blog_cat_ids']);
                        foreach($blogs as $blog_temp)
                        {
                            if($dem>10) break;
                            $blogcat_temp = json_decode($blog_temp['blog_cat_ids']);
                            $kt=0;
                            if(is_array($blogcat_temp) && is_array($blogcat_cur))
                            {
                                foreach($blogcat_temp as $temp)
                                {
                                    if(in_array($temp, $blogcat_cur))
                                    {
                                        $dem++;
                                        $kt=1;
                                        break;
                                    }
                                }
                            }
                            if($kt==1 && $blog_temp['blog_id']!=$blog['blog_id'])
                            {
                                ?>
                                <li class="post-item">
                                    <article class="entry">
                                        <div class="entry-thumb image-hover2">
                                            <a href="/blog/<?= rewrite_url($blog_temp['blog_name']); ?>-<?= $blog_temp['blog_id']; ?>.html">
                                                <img src="<?= $blog_temp['blog_image']; ?>" />
                                            </a>
                                        </div>
                                        <div class="entry-ci">
                                            <h3 class="entry-title"><a href="/blog/<?= rewrite_url($blog_temp['blog_name']); ?>-<?= $blog_temp['blog_id']; ?>.html"><?= $blog_temp['blog_name']; ?></a></h3>
                                            <div class="entry-meta-data">
                                                <!-- <span class="comment-count">
                                                    <i class="fa fa-comment-o"></i> 3
                                                </span> -->
                                                <span class="date">
                                                    <i class="fa fa-calendar"></i> <?= date("d/m/Y",$blog_temp['blog_time']); ?>
                                                </span>
                                            </div>
                                            <div class="entry-more">
                                                <a href="/blog/<?= rewrite_url($blog_temp['blog_name']); ?>-<?= $blog_temp['blog_id']; ?>.html">Xem Thêm</a>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                <!-- ./Related Posts -->
                <!-- Comment -->
               <!--  <div class="single-box">
                    <h2 class="">Comments</h2>
                    <div class="comment-list">
                        <ul>
                            <li>
                                <div class="avartar">
                                    <img src="assets/data/avatar.png" alt="Avatar">
                                </div>
                                <div class="comment-body">
                                    <div class="comment-meta">
                                        <span class="author"><a href="#">Admin</a></span>
                                        <span class="date">2015-04-01</span>
                                    </div>
                                    <div class="comment">
                                        Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. 
                                    </div>
                                </div>
                            </li>
                            <li>
                                <ul>
                                    <li>
                                        <div class="avartar">
                                            <img src="assets/data/avatar.png" alt="Avatar">
                                        </div>
                                        <div class="comment-body">
                                            <div class="comment-meta">
                                                <span class="author"><a href="#">Admin</a></span>
                                                <span class="date">2015-04-01</span>
                                            </div>
                                            <div class="comment">
                                                Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. 
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="avartar">
                                            <img src="assets/data/avatar.png" alt="Avatar">
                                        </div>
                                        <div class="comment-body">
                                            <div class="comment-meta">
                                                <span class="author"><a href="#">Admin</a></span>
                                                <span class="date">2015-04-01</span>
                                            </div>
                                            <div class="comment">
                                                Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. 
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="avartar">
                                    <img src="assets/data/avatar.png" alt="Avatar">
                                </div>
                                <div class="comment-body">
                                    <div class="comment-meta">
                                        <span class="author"><a href="#">Admin</a></span>
                                        <span class="date">2015-04-01</span>
                                    </div>
                                    <div class="comment">
                                        Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. 
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="avartar">
                                    <img src="assets/data/avatar.png" alt="Avatar">
                                </div>
                                <div class="comment-body">
                                    <div class="comment-meta">
                                        <span class="author"><a href="#">Admin</a></span>
                                        <span class="date">2015-04-01</span>
                                    </div>
                                    <div class="comment">
                                        Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. 
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="single-box">
                    <h2>Leave a Comment</h2>
                    <div class="coment-form">
                        <p>Make sure you enter the () required information where indicated. HTML code is not allowed.</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label for="email">Email</label>
                                <input id="email" type="text" class="form-control">
                            </div>
                            <div class="col-sm-12">
                                <label for="website">Website URL</label>
                                <input id="website" type="text" class="form-control">
                            </div>
                            <div class="col-sm-12">
                                <label for="message">Message</label>
                                <textarea name="message" id="message"rows="8" class="form-control"></textarea>
                            </div>
                        </div>
                        <button class="btn-comment">Submit</button>
                    </div>
                </div> -->
                <!-- ./Comment -->
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>