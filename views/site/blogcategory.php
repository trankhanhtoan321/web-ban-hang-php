<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Blog</span>
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
               <!--  <div class="block left-module">
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
                       <!--  <div class="layered">
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
                <h2 class="page-heading">
                    <span class="page-heading-title2">Bài Viết</span>
                </h2>
                <!-- <div class="sortPagiBar clearfix">
                    <span class="page-noite">Showing 1 to 7 of 45 (15 Pages)</span>
                    <div class="bottom-pagination">
                        <nav>
                          <ul class="pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">Next &raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div> -->
                <ul class="blog-posts">
                    <?php foreach($blogs as $blog){ ?>
                    <li class="post-item">
                        <article class="entry">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="entry-thumb image-hover2">
                                        <a href="/blog/<?= rewrite_url($blog['blog_name']); ?>-<?= $blog['blog_id']; ?>.html">
                                            <img src="<?= $blog['blog_image']; ?>" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="entry-ci">
                                        <h3 class="entry-title"><a href="/blog/<?= rewrite_url($blog['blog_name']); ?>-<?= $blog['blog_id']; ?>.html"><?= $blog['blog_name']; ?></a></h3>
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
                                        </div>
                                       <!--  <div class="post-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <span>(7 votes)</span>
                                        </div> -->
                                        <div class="entry-excerpt">
                                            <?= get_excerpt($blog['blog_content'],150); ?>
                                        </div>
                                        <div class="entry-more">
                                            <a href="/blog/<?= rewrite_url($blog['blog_name']); ?>-<?= $blog['blog_id']; ?>.html">Xem Tiếp</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </li>
                    <?php } ?>
                </ul>
                <!-- <div class="sortPagiBar clearfix">
                    <div class="bottom-pagination">
                        <nav>
                          <ul class="pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">Next &raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div> -->
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>