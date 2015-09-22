<style type="text/css">
	div.inline.show_text {
    display: inline;
}
	div.inline.show_text P{
    display: inline;
}
</style>				
<div class="container container-fluid">
	<div class="row"><div class="col-md-3"><button id="btn-edit" class="btn btn-default btn-block btn-edit">Edit</button></div></div>
	<form name="setting" action="#" method="POST">
	<?php foreach ($settings as $key):?>
	<?php $field = substr($key->title,9); ?>
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-10">
			<label for="<?php echo $field; ?>"><?php echo strtoupper($field); ?></label>	
		</div>
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-10">
			<div class="show_text"><p><?php echo $key->value;?></p></div>
			<div class="in_ele">
				<input class="getDtfl" type="text" name="<?php echo $key->title;?>" value = "<?php echo $key->value;?>" class ="hide_input">	
			</div>
				
		</div>
	</div>
<?php endforeach; ?>
	</form>
</div>

<script type="text/javascript">
//alert('this');
$(document).ready(function() {
//		alert('this');
		//alert(inpV);
		//alert(inpN);
		$("#btn-edit").html("Edit");
		$('.in_ele').hide();
		$('.btn-edit').click(
			function(event){
				event.preventDefault();
				$('.show_text').toggle();
				if($('.show_text').css("display")=="none")
					{
						$("#btn-edit").html("Save");
						$('.btn-edit').click(function(event) {
							event.preventDefault();
							var inpV = '';
							var inpN = '';
							$('.getDtfl').each(function(index, el) {
									//inp = $(this).siblings('input').attr('value');
									inpV = inpV + $(this).change().val()+'|';
									inpN = inpN + $(this).attr('name')+'|';
								});
							$.ajax({
								url: '/admin/setting/save',
								type: 'POST',
								// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
								data:{fields:inpN, values: inpV}
							})
							.done(function(msg) {
								console.log("success");
							})
							.fail(function() {
								console.log("error");
							})
							.always(function() {
								console.log("complete");
							});			
						});
				
					}
				else{$("#btn-edit").html("Edit");}
				$('.in_ele').toggle();
		}).html("Edit");
});
</script>