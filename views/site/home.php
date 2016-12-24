<!-- 
varible : categorys, products,slides
feature category: fashion,sports,electronic,digital,furniture,jewelry
 -->
<!-- Home slideder-->
<?php
$data = array();
$data['slides'] = $slides;
$this->load->view('site/home_slider.php',$data);
?>
<!-- END Home slideder-->
<!-- lastest deal -->
<?php //$this->load->view('site/lastest_deal'); ?>
<!--/lastest deal-->
<div class="content-page">
    <div class="container">
    	<?php 
    		$data['categorys'] = $categorys;
    		$ttt = array('fashion','sports','electronic','digital','furniture','jewelry');
    		$elevator = 0;
    		foreach($categorys as $cat)
    		{
    			if($cat['cat_parent_id'] == 0)
    			{
    				$data['category'] = $cat;
    				$data['products'] = array();
    				$data['type_cat'] = $ttt[($cat['cat_id']%6)];
    				$data['elevator'] = $elevator+1;
    				$elevator++;
    				$dem=1;
    				foreach($products as $pro)
    				{
    					if($dem > 8) break;
    					$t = json_decode($pro['pro_cat_ids']);
    					if(is_array($t) && in_array($cat['cat_id'], $t))
    					{
    						$data['products'][] = $pro;
    						$dem++;
    					}
    				}
    				$this->load->view('site/feature_category',$data);
    			}
    		}
    	?>
    </div>
</div>

<div id="content-wrap">
    <div class="container">
        <!-- Baner bottom -->
        <!-- <div class="row banner-bottom">
            <div class="col-sm-6 item-left">
                <div class="banner-boder-zoom">
                    <a href="#"><img alt="ads" class="img-responsive" src="assets/data/banner-botom1.jpg" /></a>
                </div>
            </div>
            <div class="col-sm-6 item-right">
                <div class="banner-boder-zoom">
                    <a href="#"><img alt="ads" class="img-responsive" src="assets/data/banner-bottom2.jpg" /></a>
                </div>
            </div>
        </div> -->
        <!-- end banner bottom -->

        <!-- blog list -->
        <?php
        $data['blogs'] = $blogs;
        $this->load->view('site/blog_list.php',$data);
        ?>
        <!-- ./blog list -->
    </div>
</div>