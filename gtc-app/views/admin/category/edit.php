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
                <td colspan="3" ><h2><?php echo empty($category->id) ? 'Add a New Category' : 'Edit Category ' . $category->title;?></h2></td>
                <td><?php echo form_submit('submit','Save Category','class="btn btn-lg btn-block btn-success"');?></td></tr>
            <tr>
                <td><?php echo form_label('Status','active'); ?></td>
                <td><?php $options = array('0' =>'In Active','1' =>'Active' ); echo form_dropdown('active', $options,$this->input->post('active') ? $this->input->post('active') : $category->active); ?></td>
                <td><?php echo form_label('Featured','featured'); ?></td>
                <td><?php $options = array('0' =>'No','1' =>'Yes' ); echo form_dropdown('featured', $options, $this->input->post('featured') ? $this->input->post('featured') : $category->featured); ?></td>
            </tr>
            <tr>
                <td><?php echo form_label('Title','title'); ?></td>
                <td ><?php $data=array('name'=>'title','title'=>'Enter Title','id'=>'title'); echo form_input($data,set_value('title',$category->title));?></td>
                <td><?php echo form_label('slug','slug'); ?></td>
                <td colspan="2"><?php $data=array('name'=>'slug','title'=>'Slug','id'=>'slug'); echo form_input($data,set_value('slug',$category->slug));?></td>
            </tr>
            <tr>
                <td><?php echo form_label('Title Image','image'); ?></td>
                <td><?php echo '<input name ="image" type="hidden" class="actlink place index-thumb" value="'.$category->image.'"/>';?>
                    <?php echo '<img class="actlink place index-thumb" src="'.base_url('wc-upload/gallery').'/'.$category->media_image.'">';?></td>
                </td>
                <td><?php echo form_label('Parent Category','parent_id'); ?></td>
                <td ><?php echo form_dropdown('parent_id', $category_no_parents, $this->input->post('parent_id') ? $this->input->post('parent_id') : $category->parent_id);?></td>
            </tr>
            <tr>
                <td><?php echo form_label('Description','description'); ?></td>
                <td colspan="3"><?php $data=array('name'=>'description','title'=>'category Body','id'=>'description','class'=>'tinymce'); echo form_textarea($data,set_value('description',$category->description));?></td>
            </tr>
		</tbody>
    </table>
    <?php //$data=array('name'=>'modified','id'=>'modified', 'disabled'=>'disabled'); echo form_input($data,set_value('modified', date('Y-m-d H:i:s')));?>
    <?php echo form_close(); ?>
</section>
<div class="item"><p>ITem</p></div>
<div class="item">ITem</div>
<script>
$(document).ready(function() {
	$('.datepicker').datepicker({dateFormat : 'yy-mm-dd'});
    CKEDITOR.replace("description",{filebrowserBrowseUrl: "/admin/gallery.jsp"});
        /* Act on the event */
});

</script>