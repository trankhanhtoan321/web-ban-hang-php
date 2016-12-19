<!-- 
varible : categorys, products
feature category: fashion,sports,electronic,digital,furniture,jewelry
 -->
<!-- Home slideder-->
<?php $this->load->view('site/home_slider.php'); ?>
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