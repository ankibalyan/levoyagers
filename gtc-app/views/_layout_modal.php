                                <?php $this->load->view('components/page_head'); ?>
	<body>
		<!--start-wrap-->
			<!--start-top-header-->
			<div class="top-header" id="header">
				<div class="wrap">
                              <div class="top-header-left">
                                    <ul>
                                    <?php if($this->user_m->loggedin() == FALSE): ?>
                                    	<li><a href="/admin"><span> </span> Meta Login</a></li>
									<?php endif; ?>
									<?php if($this->user_m->loggedin() == TRUE): ?>
										<li><a href="/user/logout"><span> </span> Log Out</a></li>
                                        <li><a href="/user/profile"><span> </span>Profile</a></li>
                                        <li><p class="cart_no"><?php if(count($this->cart->total_items())) echo $this->cart->total_items();?></p><a class="reg" href="/shop/cart">My Cart</a></li>
									<?php endif; ?>
                                          
                                          <li><p class="contact-info">Call Us Now :+91-11-4505-8058</p></li>
                                          <div class="clear"> </div>
                                    </ul>
                              </div>
                              <div class="top-header-right">
                                    <ul>
                                          <li><a class="face" href="#"><span> </span></a></li>
                                          <li><a class="twit" href="#"><span> </span></a></li>
                                          <li><a class="thum" href="#"><span> </span></a></li>
                                          <li><a class="pin" href="#"><span> </span></a></li>
                                          <div class="clear"> </div>
                                    </ul>
                              </div>
                              <div class="clear"> </div>
				</div>
			</div>
			<!----//End-top-header----->
			<!---start-header---->
			<div class="header">
				<div class="wrap">
				<!--- start-logo---->
				<div class="logo">
					<a href="<?php echo site_url(); ?>">
						<img src="<?php echo base_url('wc-load/images/logo.png');?>" title="voyage" />
					</a>
					<div><p><?php echo $meta_tagline; ?></p></div>
				</div>
				<!--- //End-logo---->
<!--- start-top-nav---->
				<div class="top-nav">
				<ul class="flexy-menu thick orange">
						<?php echo get_menu($top_menu); ?>
				</ul>
						<div class="search-box">
							<div id="sb-search" class="sb-search">
								<form>
									<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
									<input class="sb-search-submit" type="submit" value="">
									<span class="sb-icon-search"> </span>
								</form>
							</div>
						</div>
						<!----search-scripts---->
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>
						<!----//search-scripts---->
				</div>

				<!--- //End-top-nav---->
				<div class="clear"> </div>

			</div>

			<!---//End-header---->
		</div>
<?php $this->load->view('templates/'.$subview); ?>
</div>
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
<div class="go_down">V</div>
<?php $this->load->view('components/page_foot'); ?>
                            