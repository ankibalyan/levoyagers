<section>
<?php
   if(validation_errors()||$this->session->flashdata('error'))     
   {
?>      		
			<div class="alert alert-danger">
				<?php echo validation_errors(); ?>
                <?php echo $this->session->flashdata('error'); ?>
		    </div>
<?php } ?>
	<?php echo form_open(); ?>
    <table class="table table-hover jumbotron">
	    <tbody>
            <tr>
                <td colspan="3" ><h2><?php echo empty($product->id) ? 'Add a New Customer Product' : 'Edit '.$customers[$product->user_id].' Product ' . $product->title;?></h2></td>
                <td><?php echo form_submit('submit','Save Post','class="btn btn-lg btn-block btn-success"');?></td>
            </tr>
            <tr>
                <td><?php echo form_label('Title','title'); ?></td>
                <td ><?php $data=array('name'=>'title','title'=>'Enter Title','id'=>'title'); echo form_input($data,set_value('title',$product->title));?></td>
                <td><?php echo form_label('Price','price'); ?></td>
                <td ><?php $data=array('name'=>'price','title'=>'Enter Price','id'=>'price'); echo form_input($data,set_value('price',$product->price));?></td></td>
            <!--     <td><?php echo form_label('Publication Date','pub_date'); ?></td>
                <td colspan="2" ><?php $data=array('name'=>'pub_date','title'=>'Publication Date','id'=>'pub_date','class'=>'datepicker'); echo form_input($data,set_value('pub_date',$product->pub_date));?></td> -->
            </tr>
            <tr>
                <td><?php echo form_label('Title Image','image'); ?></td>
                <td ><?php echo '<input name ="image" type="hidden" class="actlink place index-thumb" value="'.$product->image.'"/>';?>
                    <?php echo '<img class="actlink place index-thumb" src="'.$product->image.'">';?></td>
                </td>
                <td><?php echo form_label('Customer','user_id'); ?></td>
                <td><?php echo form_dropdown('user_id', $customers, $product->user_id); ?></td>
            </tr>
            <tr>
                <td><?php echo form_label('Description','description'); ?></td>
                <td colspan="3"><?php $data=array('name'=>'description','title'=>'Products\' Description','id'=>'descrition','class'=>'tinymce'); echo form_textarea($data,set_value('product',$product->description));?></td>
            </tr>
		</tbody>
    </table>
    <?php //$data=array('name'=>'modified','id'=>'modified', 'disabled'=>'disabled'); echo form_input($data,set_value('modified', date('Y-m-d H:i:s')));?>
    <?php echo form_close(); ?>
</section>

<script>
$(function() {
	$('.datepicker').datepicker({dateFormat :'yy-mm-dd'});
});
</script>
<script>
$(function(){
          CKEDITOR.replace("description",{
            //uiColor: '#CaC1fa',
            filebrowserBrowseUrl: "/admin/gallery.jsp"
          })
});</script>