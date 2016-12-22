<div id="home-slider">
    <div class="container">
        <div class="row">
            <!-- <div class="col-sm-3 slider-left"></div> -->
            <div class="col-sm-12 header-top-right">
                <div class="homeslider">
                    <ul id="contenhomeslider">
                      <?php
                      foreach($slides as $slide)
                      {
                        if($slide['slide_link']!='')
                        {
                          ?>
                          <li>
                            <a href="<?= $slide['slide_link']; ?>">
                              <img class="img-responsive" src="<?= $slide['slide_image']; ?>" />
                            </a>
                          </li>
                          <?php
                        }
                        else
                        {
                          ?>
                          <li>
                            <img class="img-responsive" src="<?= $slide['slide_image']; ?>" />
                          </li>
                          <?php
                        }
                      }
                      ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>