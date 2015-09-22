<section>
	<h2>Order Side Menu Pages  <input type="button"  id="save" value="Save" class="btn btn-primary"></h2> 
    <p class="alert alert-info"> Drag to Order Pages and then click 'Save'</p>

     <div id="OrderResult" ></div>
</section>

<script>

$(function()
{
	$.post('<?php echo site_url('admin/page/order_ajax/side'); ?>', {}, function(data)
	{
		$('#OrderResult').html(data);
	});

	$('#save').click(function(){
		oSortable=$('.sortable').nestedSortable('toArray');
		$('#OrderResult').hide('slow',function()
		{
			$.post('<?php echo site_url('admin/page/order_ajax/side'); ?>', {sortable: oSortable}, function(data)
			{
				$('#OrderResult').html(data);
				$('#OrderResult').show('slow');
			});
		});
		
	});

});
</script>

