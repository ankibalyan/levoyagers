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
<?php $att = array('name'=>'package'); ?>
	<?php echo form_open('',$att); ?>
    <table class="table table-hover table-responsive jumbotron">
	    <tbody>
            <tr>
                <td colspan="3" ><h2><?php echo empty($package->id) ? 'Add a New Package' : 'Edit Package ' . $package->title;?></h2></td>
                <td><?php echo form_submit('submit','Save Package','class="btn btn-lg btn-block btn-success"');?></td></tr>
            <tr>
                <td><?php echo form_label('Status','active'); ?></td>
                <td><?php $options = array('0' =>'In Active','1' =>'Active' ); echo form_dropdown('active', $options,$this->input->post('active') ? $this->input->post('active') : $package->active); ?></td>
                <td><?php echo form_label('Featured','featured'); ?></td>
                <td><?php $options = array('0' =>'No','1' =>'Yes' ); echo form_dropdown('featured', $options, $this->input->post('featured') ? $this->input->post('featured') : $package->featured); ?></td>
            </tr>
            <tr>
                <td><?php echo form_label('Title','title'); ?></td>
                <td ><?php $data=array('name'=>'title','title'=>'Enter Title','id'=>'title'); echo form_input($data,set_value('title',$package->title));?></td>
                <td><?php echo form_label('slug','slug'); ?></td>
                <td colspan="2"><?php $data=array('name'=>'slug','title'=>'Slug','id'=>'slug'); echo form_input($data,set_value('slug',$package->slug));?></td>
            </tr>
            <tr>
                <td><?php echo form_label('Title Image','image'); ?></td>
                <?php (isset($package->image)) ? : $package->image=''; ?>
                <?php (isset($media->file_name)) ? : $media->file_name=0; ?>
                <td><?php echo '<input name ="image" type="hidden" class="actlink place index-thumb" value="'.$package->image.'"/>';?>
                    <?php echo '<img class="actlink place index-thumb" src="'.base_url('wc-upload/gallery').'/'.$package->media_image.'">';?>
                </td>
                <td><?php echo form_label('Location','location_id'); ?></td>
                <td ><?php echo form_dropdown('location_id', $locations, $this->input->post('location_id') ? $this->input->post('location_id') : $package->location_id);?></td>
            </tr>
            <tr>
                <td><?php echo form_label('Price','price'); ?></td>
                <td ><?php $data=array('name'=>'price','title'=>'Enter Price','id'=>'price'); echo form_input($data,set_value('price',$package->price));?></td>
                <td><?php echo form_label('Category','category_id'); ?></td>
                <td ><?php echo form_dropdown('category_id', $categorys, $this->input->post('category_id') ? $this->input->post('category_id') : $package->category_id);?></td>
            </tr>
            <tr>
                <td><?php echo form_label('Hotel','hotel_id'); ?></td>
                <td ><?php echo form_dropdown('hotel_id', $hotels, $this->input->post('hotel_id') ? $this->input->post('hotel_id') : $package->hotel_id);?></td>
                <td><?php echo form_label('Scheme','scheme_id'); ?></td>
                <td ><?php echo form_dropdown('scheme_id', $schemes, $this->input->post('scheme_id') ? $this->input->post('scheme_id') : $package->scheme_id);?></td>
            </tr>
            <?php  $js = 'onChange ="document.package.pub_date.style.visibility =\'hidden\'";  onblur="if (this.placeholder == \'\') {this.placeholder = \'Select date\';}"'; ?>    
            <tr>
                <td><?php echo form_label('Transport','transport_id'); ?></td>
                <td><?php echo form_dropdown('transport_id', $transports, $this->input->post('transport_id') ? $this->input->post('transport_id') : $package->transport_id);?></td>
                <td><?php echo form_label('Publication Date','pub_date'); ?></td>
                <td ><?php $data=array('name'=>'pub_date','title'=>'Enter Publication Date','id'=>'pub_date','class'=>'datepicker', 'placeholder'=>'Select date'); echo form_input($data,set_value('pub_date',$package->pub_date),$js);?></td>
            </tr>
            <tr>
                <td><?php echo form_label('Start Date','start_date'); ?></td>
                <td ><?php $data=array('name'=>'start_date','title'=>'Enter Starting Date','id'=>'start_date','class'=>'datepicker'); echo form_input($data,set_value('start_date',$package->start_date));?></td>
                <td><?php echo form_label('End Date','end_date'); ?></td>
                <td ><?php $data=array('name'=>'end_date','title'=>'Enter Ending Date','id'=>'end_date','class'=>'datepicker'); echo form_input($data,set_value('end_date',$package->end_date));?></td>
                
            </tr>

            <tr>
                <td><?php echo form_label('Description','description'); ?></td>
                <td colspan="3"><?php $data=array('name'=>'description','title'=>'package Body','id'=>'description','class'=>'tinymce'); echo form_textarea($data,set_value('description',$package->description));?></td>

            </tr>
		</tbody>
    </table>
    <?php //$data=array('name'=>'modified','id'=>'modified', 'disabled'=>'disabled'); echo form_input($data,set_value('modified', date('Y-m-d H:i:s')));?>
    <?php echo form_close(); ?>
</section>
<script>
$(document).ready(function() {
	$('#pub_date').datepicker({dateFormat : 'yy-mm-dd'});
    $('#start_date').datepicker({dateFormat : 'yy-mm-dd'});
    $('#end_date').datepicker({dateFormat : 'yy-mm-dd'});
    CKEDITOR.replace("description",{
        //uiColor: '#CaC1fa',
        filebrowserBrowseUrl: "/admin/media/gallery"
    });
});
</script>