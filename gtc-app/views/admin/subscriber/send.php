<section>
	<h2><?php echo 'Send News Letter'; ?></h2>
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
    <table class="table">
    	<tr>
        	<td><?php echo form_label('Subject','subject'); ?></td>
            <td><?php $data=array('name'=>'subject','title'=>'Subject','id'=>'subject'); echo form_input($data);?></td>
        </tr>
    	<tr>
        	<td><?php echo form_label('Message','message'); ?></td>
            <td colspan="3"><?php $data=array('name'=>'message','title'=>'Enter Message','id'=>'message','class'=>'tinymce'); echo form_textarea($data);?></td>           
        </tr>
    	<tr>
        	<td></td>
            <td><?php echo form_submit('submit','Send','class="btn btn-success"');?></td>
        </tr>                
    </table>
    
    <?php echo form_close(); ?>
</section>
<script>
$(function(){
          CKEDITOR.replace("message",{
            //uiColor: '#CaC1fa',
            filebrowserBrowseUrl: "/admin/gallery.jsp"
          })
});</script>