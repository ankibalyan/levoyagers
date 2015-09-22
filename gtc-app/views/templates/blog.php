<!---start-Blog---->
		<div class="blog">
			<div class="destination-head">
				<div class="wrap">
					<h3>Blog</h3>
				</div>
				<!---End-destinatiuons---->
				<div class="find-place dfind-place">
					<div class="wrap">
						<div class="p-h">
							<span>FIND YOUR</span>
							<label>HOLYDAYS</label>
						</div>
						<!---strat-date-piker---->
						  <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
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
			</div>
			<div class="blog-grids">
				<div class="wrap">
					<div class="blog-grids-head">
						<h3>Recent Posts</h3>
					</div>
					<?php if(isset($page)) // echo get_page($page); ?>
					<div class="blog-grids-box">
					<?php foreach ($posts as $post):?>
			<?php if(isset($post)) echo get_post($post); ?>
					<?php endforeach; ?>
					</div>
            
					
						<div class="clear"> </div>
					</div>
					<div class="criuse-grid-load">
							<a href="#">Loading More</a>
					</div>
				</div>
			</div>
		</div>
		<!----//End-Blog---->