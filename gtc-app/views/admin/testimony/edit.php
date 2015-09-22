<section>
<?php
   if(validation_errors()||$this->session->flashdata('error')||isset($error))     
   {
?>      		
			<div class="alert alert-danger">
				<?php echo validation_errors(); ?>
                <?php echo $this->session->flashdata('error'); ?>
                <?php if(isset($error)): ?>
                    <?php foreach ($error as $err): ?>
                        <?php echo "$err"; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
                </div>
<?php } ?>
	<?php echo form_open(); ?>
    <table class="table table-hover jumbotron">
	    <tbody>
            <tr>
                <td><?php echo form_label('Name','name'); ?></td>
                <td><?php $data=array('name'=>'name','title'=>'Name','id'=>'name','class'=>'name'); echo form_input($data,set_value('place',(isset($testimony->name)) ? $testimony->name : ''));?></td>
                <td><?php echo form_label('Place','place'); ?></td>
                <td><?php $data=array('name'=>'place','title'=>'Location','id'=>'place','class'=>'place'); echo form_input($data,set_value('place',(isset($testimony->place)) ? $testimony->place : ''));?></td>
            </tr>
            <tr>
            
            </tr>
            <tr>
                <td><?php echo form_label('Testimony','comment'); ?></td>
                <td colspan="3"><?php $data=array('name'=>'comment','title'=>'Comment\' Body','id'=>'comment','class'=>'tinymce'); echo form_textarea($data,set_value('comment',(isset($testimony->comment)) ? $testimony->comment : ''));?></td>
            </tr>
            <tr>
                <td><?php echo form_hidden('approved',0); ?>
                    <?php echo form_hidden('post_id',(isset($testimony->post_id)) ? $testimony->post_id : ''); ?>
                    <?php $options = array('0' =>'No','1'=>'Yes'); ?>
                <?php echo form_label('Approved','approved'); ?></td>
                <td colspan="2"><?php echo form_dropdown('approved', $options, (isset($testimony->Approved)) ? $testimony->approved : 'No'); ?></td>
                <td><?php echo form_submit('submit','Save testimony','class="btn btn-lg btn-block btn-success"');?></td>
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
          CKEDITOR.replace("comment",{
            //uiColor: '#CaC1fa',
            filebrowserBrowseUrl: "/admin/gallery.jsp"
          })
});</script>