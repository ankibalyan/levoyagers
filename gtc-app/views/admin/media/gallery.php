<section>
	<h2>Gallery</h2>
        <div id="gallery" class="jumbotron">
        	<div class="row">
		        <?php 
				if(isset($medias) && count($medias))
				{
					foreach($medias as $media)
					{?>
						<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
							<input type="checkbox" class="sel_img" value="<?php echo $media->id; ?>">
							<img value="<?php echo $media->id; ?>" src="<?php echo base_url('wc-upload/gallery').'/' . $media->file_name;?>" title="<?php echo $media->title;?>" alt="<?php echo $media->title;?>" class="index-thumb">
		                </div>
					<?php }
				}
				else
				{
				?>	<div id="blank_gallery">Please Upload an image file</div>
				<?php
				}
				?>
			</div>	
        </div>
        <input type="button" id="insert" name="insert" value="insert" class="btn btn-primary btn-lg pull-right" id="insert-btn">
        </section>
        <div class="print"></div>
<!-- </section><a href="<?php echo $image['url'] ; ?>"><img class="thumb" src="<?php echo $image['thumb_url'] ; ?>"></a> -->
<script>
	$(document).ready(function() {
		$('#insert').click(
			function(event) {
			var chImg='';
			$('.sel_img:checked').each(function(idx,ele){
				chImg+=$(this).siblings('img').attr('src');
				chId =$(this).val();

			});
			$('.place').val(chId).attr('src',chImg);
			$('.popup_gal').css('display','none');
			$('.popup_bk').css('display','none');
			//alert(chImg);
		});
		/*$('img').click(function(event) {
			var chImg=$(this).attr('src');
			chId =$(this).siblings('.sel_img:checked').val();
			$('.place').val(chID).attr('src',chImg);
			$('.popup_gal').css('display','none');
			$('.popup_bk').css('display','none');
		});
*/
	});
</script>
<?php 

/* 
$.ajax({
				url: 'http://gtc.app/admin/media/process',
				type: 'POST',
				data: {imgsrc: chImg},
				success : function(msg){
					alert(msg);
					$('.place').html(msg);		
				}
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
*/