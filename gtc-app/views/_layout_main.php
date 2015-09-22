                                <?php $this->load->view('components/page_head'); ?>
	<body>
		<!--start-wrap-->
			<!--start-top-header-->
			<div class="top-header" id="header">
				<div class="wrap">
                              <div class="top-header-left">
                                    <ul>
                                    <?php if($this->user_m->loggedin() == FALSE): ?>
                                    	<?php $attributes = array('name'=>'login_form', 'class' => 'login-bar', 'id' => 'login_form'); ?>
										<?php echo form_open('user/login',$attributes); ?>
                                    	<li><?php $data=array('name'=>'username','title'=>'User Name','id'=>'username','class'=>'form-control','placeholder'=>'User Name','autofocus'=>'autofocus');
  											echo form_input($data);?></li>
                                        <li><?php $data=array('name'=>'password','title'=>'Password','id'=>'password','class'=>'form-control','placeholder'=>'Password'); ?>
				  							<?php echo form_password($data);?>
				  							<?php echo form_submit('submit','Log in','id = "submit", class ="btn"');?></li>
				 							
                                    	<li><input type="button" class="btn btn-default" value="Register" onclick="location.href='user/register'" /></li>
									<?php endif; ?>
									<?php if($this->user_m->loggedin() == TRUE): ?>
										<li><a href="/user/logout"><span></span><i class="glyphicon glyphicon-log-out"></i>Log Out</a></li>
                                        <li><a href="/user/profile"><span> </span>Profile</a></li>
                                        <li><a href="/shop"><span> </span>My Shop</a></li>
                                        <li><p class="cart_no"><?php if(count($this->cart->total_items())) echo $this->cart->total_items();?></p><a class="reg" href="/shop/cart">My Cart</a></li>
									<?php endif; ?>
                                          
                                          <li><p class="contact-info reg">Call Us: +91-11-4505-8058</p></li>
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
<div class="go_down">V</div>
<?php $this->load->view('components/page_foot'); ?>
                            