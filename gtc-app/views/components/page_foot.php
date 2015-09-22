		<!---start-subfooter---->
		<div class="subfooter">
			<div class="wrap">
				<?php echo get_bottom_menu($bottom_menu); ?>
				<p class="copy-right">&copy; <?php echo date('Y')." ".'<a href="#">'.strtoupper($meta_site).'</a></div><div class="footer-txt2">Proudly Powered By <a href="http://facebook.com/ankibalyan" class="copy-right">Ankit Balyan</a></p>';?>
				<a class="to-top" href="#header"><span> </span> </a>
			</div>
		</div>
		<!---//End-subfooter---->
		<!----//End-wrap---->
<!---smoth-scrlling---->
	<script type="text/javascript">
		$(document).ready(function(){
			$('a[href^="#"]').on('click',function (e) {
			    e.preventDefault();
			    var target = this.hash,
			    $target = $(target);
			    $('html, body').stop().animate({
			        'scrollTop': $target.offset().top
			    }, 1000, 'swing', function () {
			        window.location.hash = target;
			    });
			});
		});
		</script>
<!---//smoth-scrlling---->
	</body>
</html>
