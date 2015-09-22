<!--start-image-slider---->
                    <div class="image-slider">
                        <!-- Slideshow 1 -->
                        <ul class="rslides" id="slider1">
                          <li><img src="<?php echo base_url('wc-load/images/slider4.jpg');?>" alt=""></li>
                          <li><img src= "<?php echo base_url('wc-load/images/slider2.jpg');?>" alt=""></li>
                          <li><img src="<?php echo base_url('wc-load/images/slider3.jpg');?>"  alt=""></li>
                           <li><img src="<?php echo base_url('wc-load/images/slider1.jpg');?>" alt=""></li>
                         <!-- Slideshow 2 -->
                    </div>
            <!--End-image-slider---->

        <!----start-find-place---->
        <div class="find-place">
            <div class="wrap">
                <div class="p-h">
                    <span>FIND YOUR</span>
                    <label>HOLYDAYS</label>
                </div>
                <!---strat-date-piker---->
                  <script>
                  $(function() {
                    $( "#datepicker" ).datepicker();
                  });
                  </script>
                <!---/End-date-piker---->
                <div class="p-ww">
                    <form>
                        <span> Where</span>
                        <input class="dest" type="text" value="Distination" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Distination';}">
                        <span> When</span>
                        <input class="date" id="datepicker" type="text" value="Select date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Select date';}">
                        <input type="submit" value="Search" />
                    </form>
                </div>
                <div class="clear"> </div>
            </div>
        </div>
        <!----//End-find-place---->
        <div class="content_top">
                    <div class="wrap">
                        <h1><a href="#">WELCOME.</a></h1>
                        <p><?php echo $meta_description; ?></p>
                        <span><a class="learnmore" href="about-us">LEARN MORE</a></span>
                    </div>
                </div>
        <!----start-offers---->
        <div class="offers">
            <div class="offers-head">
                <h3>Special Offers</h3>
                <p>Best <?php echo date('Y'); ?> packages where people love to stay!</p>
            </div>
            <!-- start content_slider -->
            <!-- FlexSlider -->
             <!-- jQuery -->
               <script type="text/javascript">
              //   $(function(){
              //     SyntaxHighlighter.all();
              //   });
                $(window).load(function(){
                  $('.flexslider').flexslider({
                    animation: "slide",
                    animationLoop: true,
                    itemWidth:250,
                    itemMargin: 5,
                    start: function(slider){
                      $('body').removeClass('loading');
                    }
                  });
                });
              </script>
            <!-- Place somewhere in the <body> of your page -->
                 <section class="slider">
                <div class="flexslider carousel">
                  <ul class="slides">
                  <?php foreach ($packages as $package): ?>
                    <li onclick="location.href='#';">
                        <img src="<?php echo base_url('wc-upload/gallery').'/'.$package->media_image; ?>" alt="<?php echo $package->title; ?>" title="<?php echo $package->title; ?>" width="275" height="180" />
                        <!----place-caption-info---->
                        <div class="caption-info">
                             <div class="caption-info-head">
                                <div class="caption-info-head-left">
                                    <h4><a href="#"><?php echo $package->title; ?></a></h4>
                                    <span><?php echo $package->package_scheme ?>!</span>
                                </div>
                                <div class="caption-info-head-right">
                                    <span> </span>
                                </div>
                                <div class="clear"> </div>
                             </div>
                        </div>
                         <!----//place-caption-info---->
                        </li>
                  <?php endforeach; ?>
                  </ul>
                </div>
              </section>
              <!-- //End content_slider -->
        </div>
        <!----//End-offers---->
        
        <!---start-holiday-types---->
            <div class="holiday-types">
                <div class="wrap">
                    <div class="holiday-type-head">
                        <h3>Holidays Type</h3>
                        <span>get explore your dream to travel the world!</span>
                    </div>
                    <div class="holiday-type-grids">
                        <div class="holiday-type-grid" onclick="location.href='#';">
                            <span class="icon1"> </span>
                            <a href="#">High Hills</a>
                        </div>
                        <div class="holiday-type-grid" onclick="location.href='#';">
                            <span class="icon2"> </span>
                            <a href="#">Holliday</a>
                        </div>
                        <div class="holiday-type-grid" onclick="location.href='#';">
                            <span class="icon3"> </span>
                            <a href="#">Honeymoon</a>
                        </div>
                        <div class="holiday-type-grid" onclick="location.href='#';">
                            <span class="icon4"> </span>
                            <a href="#">Adventure</a>
                        </div>
                        <div class="holiday-type-grid" onclick="location.href='#';">
                            <span class="icon5"> </span>
                            <a href="#">Safari</a>
                        </div>
                        <div class="holiday-type-grid" onclick="location.href='#';">
                            <span class="icon6"> </span>
                            <a href="#">Beach</a>
                        </div>
                        <div class="clear"> </div>
                    </div>
                </div>
                </div>
        <!---//End-holiday-types---->
        <!----//End-images-slider---->
        <!----start-clients---->
        <div class="clients">
            <div class="client-head">
                <h3>Happy Clients</h3>
                <span>what customer say about us and why love our services!</span>
            </div>
            <div class="client-grids">
                <ul class="bxslider">
                <?php foreach ($testimonys as $testimony): ?>
                  <li>
                    <p><?php echo $testimony->comment; ?></p>
                    <a href="#"><?php echo e($testimony->name); ?></a>
                    <span><?php echo e($testimony->place); ?></span>
                    <label> Wonderful</label>
                  </li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <!----//End-clients---->
            <!----start-footer---->
    <div class="footer">
      <div class="wrap">
      <div class="footer-grids">
        <div class="footer-grid Newsletter">
          <h3>News letter </h3>
          <p>Subscribe to our Daily New letter to get the daily Updates</p>
          <form action="subscriber" method="POST">
            <input name="semail" type="text" placeholder="Subscribes.." /> <input type="submit" value="GO" />
          </form>
        </div>
        <div class="footer-grid Newsletter">
          <h3>Latest News </h3>
          <?php foreach($recent_news as $news): ?>
            <?php $url ='article/' . intval($news->id) . '/'.e($news->slug); ?>
          <div class="news">
            <div class="news-pic">
              <img src="<?php echo $news->title; ?>" title="<?php echo $news->title; ?>" /> 
            </div>
            <div class="news-info">
              <a href="#"><?php echo anchor($url,e($news->title)); ?></a>
              <span><?php echo $news->pub_date; ?></span>
            </div>
            <div class="clear"> </div>
          </div>
        <?php endforeach; ?>
        </div>
        <div class="footer-grid tags">
          <h3>Tags</h3>
          <ul>
            <li><a href="#">Agent login</a></li>
            <li><a href="#">Customer Login</a></li>
            <li><a href="#">Not a Member?</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">New Horizons</a></li>
            <li><a href="#">Lanscape</a></li>
            <li><a href="#">Tags</a></li>
            <li><a href="#">Nice</a></li>
            <li><a href="#">Some</a></li>
            <li><a href="#">Portrait</a></li>
            <div class="clear"> </div>
          </ul>
        </div>
        <div class="footer-grid address">
          <h3>Address </h3>
          <div class="address-info">
            <span><?php $meta_addresses[0]; ?> </span>
            <span><i>E-mail:</i><a href="mailto:<?php echo $meta_emails[0];?>"><?php echo $meta_emails[0];?></a></span>
          </div>
          <div class="footer-social-icons">
            <ul>
              <li><a class="face1 simptip-position-bottom simptip-movable" data-tooltip="facebook" href="#"><span> </span></a></li>
              <li><a class="twit1 simptip-position-bottom simptip-movable" data-tooltip="twitter" href="#"><span> </span></a></li>
              <li><a class="tub1 simptip-position-bottom simptip-movable" data-tooltip="tumblr" href="#"><span> </span></a></li>
              <li><a class="pin1 simptip-position-bottom simptip-movable" data-tooltip="pinterest" href="#"><span> </span></a></li>
              <div class="clear"> </div>
            </ul>
          </div>
        </div>
        <div class="clear"> </div>
      </div>
      </div>
    </div>
    <!----//End-footer---->