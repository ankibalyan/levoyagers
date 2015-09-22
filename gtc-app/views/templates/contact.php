		<!---start-contact---->
		<div class="contact">
				<div class="contact-info">
					<?php if(isset($page)) echo get_page($page); ?>
					<div class="wrap">
					 <div class="contact-grids">
							 <div class="col_1_of_bottom span_1_of_first1">
								    <h5>Address</h5>
								    <ul class="list3">
								    <?php foreach ($meta_addresses as $address): ?>
										<li>
											<img src="<?php echo base_url('wc-load/theme/images/home.png'); ?>" alt="">
											<div class="extra-wrap">
											 <p><?php echo $address; ?></p>
											</div>
										</li>
									<?php endforeach; ?>
									</ul>
							    </div>
								<div class="col_1_of_bottom span_1_of_first1">
								    <h5>Phones</h5>
									<ul class="list3">
									<?php foreach ($meta_telephones as $phone): ?>
										<li>
											   <img src="<?php echo base_url('wc-load/theme/images/phone.png'); ?>" alt="">
											<div class="extra-wrap">
												<p><span>Telephone:</span><?php echo $phone; ?></p>
											</div>
										</li>
									<?php endforeach; ?>
									</ul>
								</div>
								<div class="col_1_of_bottom span_1_of_first1">
									 <h5>Email</h5>
								    <ul class="list3">
								    <?php foreach ($meta_emails as $email): ?>
										<li>
											<img src="<?php echo base_url('wc-load/theme/images/email.png'); ?>" alt="">
											<div class="extra-wrap">
											  <p><span class="mail"><a href="mailto:<?php echo $email; ?>">info@<?php echo $meta_site; ?></a></span></p>
											</div>
										</li>
									<?php endforeach; ?>
									</ul>
							    </div>
								<div class="clear"></div>
					 </div>
					 <?php
   if(validation_errors()||$this->session->flashdata('error'))     
   {
?>      		
			<div class="alert alert-danger">
				<?php echo validation_errors(); ?>
                <?php echo $this->session->flashdata('error'); ?>
		    </div>
<?php } ?>
					 	<form method="post" action="">
					          <div class="contact-form">
								<div class="contact-to">
			                     	<input name="name" type="text" class="text" placeholder = "Name..." value="" >
								 	<input name="email" type="text" class="text" placeholder = "Email..." value="">
								 	<input name="subject" type="text" class="text" placeholder = "Subject..." value="">
								</div>
								<div class="text2">
									<textarea name="message" value="Message:" placeholder = "Message..." value=""></textarea>
				                </div>
				               <span><input type="submit" class="" value="Send"></span>
				                <div class="clear"></div>
				               </div>
				           </form>
							</div>
			</div>
		</div>
		<!----//End-contact---->