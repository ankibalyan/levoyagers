<section>
<h2>Upload New Media</h2>
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
	<?php echo form_open_multipart(); ?>

    <table class="table tbale-fluid table-hover jumbotron">
	    <tbody>
            <tr>
                <td width="20"><?php echo form_label('File','userfile'); ?></td>
                <td><?php $data = array('name'=>'userfile'); ?>
                    <?php echo form_upload($data); ?>
                </td>
                <td><?php echo form_submit('submit','Save Upload ','class="btn btn-lg btn-block btn-success"');?></td>
            </tr>
		</tbody>
    </table>
    <p>You are using the browser’s built-in file uploader. Maximum upload file size: 2MB.</p>
    <?php //$data=array('name'=>'modified','id'=>'modified', 'disabled'=>'disabled'); echo form_input($data,set_value('modified', date('Y-m-d H:i:s')));?>
    <?php echo form_close(); ?>
</section>
<script>
$(function() {
	$('.datepicker').datepicker({dateFormat :'yy-mm-dd'});
});
</script>