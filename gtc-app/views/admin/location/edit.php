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
    <table class="table table-hover table-responsive jumbotron">
	    <tbody>
            <tr>
                <td colspan="3" ><h2><?php echo empty($location->id) ? 'Add a New Location' : 'Edit Location ' . $location->title;?></h2></td>
                <td><?php echo form_submit('submit','Save Location','class="btn btn-lg btn-block btn-success"');?></td></tr>
            <tr>
                <td><?php echo form_label('Status','active'); ?></td>
                <td><?php $options = array('0' =>'In Active','1' =>'Active' ); echo form_dropdown('active', $options,$this->input->post('active') ? $this->input->post('active') : $location->active); ?></td>
                <td><?php echo form_label('Featured','featured'); ?></td>
                <td><?php $options = array('0' =>'No','1' =>'Yes' ); echo form_dropdown('featured', $options, $this->input->post('featured') ? $this->input->post('featured') : $location->featured); ?></td>
            </tr>
            <tr>
                <td><?php echo form_label('Title','title'); ?></td>
                <td ><?php $data=array('name'=>'title','title'=>'Enter Title','id'=>'title'); echo form_input($data,set_value('title',$location->title));?></td>
                <td><?php echo form_label('slug','slug'); ?></td>
                <td colspan="2"><?php $data=array('name'=>'slug','title'=>'Slug','id'=>'slug'); echo form_input($data,set_value('slug',$location->slug));?></td>
            </tr>
            <tr>
                <td><?php echo form_label('Title Image','image'); ?></td>
                <td><?php echo '<input name ="image" type="hidden" class="actlink place index-thumb" value="'.$location->image.'"/>';?>
                    <?php echo '<img class="actlink place index-thumb" src="'.base_url('wc-upload/gallery').'/'.$location->media_image.'">';?>
                </td>
                <td><?php echo form_label('Country','country'); ?></td>
                <td ><?php $data=array('name'=>'country','title'=>'Enter Country Name','id'=>'country'); echo form_input($data,set_value('country',$location->country));?></td>
            </tr>
            <tr>
                <td><?php echo form_label('Description','description'); ?></td>
                <td colspan="3"><?php $data=array('name'=>'description','title'=>'location Body','id'=>'description','class'=>'tinymce'); echo form_textarea($data,set_value('description',$location->description));?></td>
            </tr>
		</tbody>
    </table>
    <?php //$data=array('name'=>'modified','id'=>'modified', 'disabled'=>'disabled'); echo form_input($data,set_value('modified', date('Y-m-d H:i:s')));?>
    <?php echo form_close(); ?>
</section>

<script>
$(function() {
	$('.datepicker').datepicker({dateFormat : 'yy-mm-dd'});
});
</script>
<script>
$(function(){
          CKEDITOR.replace("description",{
            //uiColor: '#CaC1fa',
            filebrowserBrowseUrl: "/admin/gallery.jsp"
          })
});</script>