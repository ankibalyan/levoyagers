<div class="modal-header">
	<h2>Resend Activation Code</h2>
    <p><a href="login">Login</a> or <a href="register">Register </a> or <a href="forget">Forget Password </a> </p>
</div>
<div class="modal-body">
<?php
   if(validation_errors()||$this->session->flashdata('error'))     
   {
?>      		
			<div class="alert alert-danger">
				<?php echo validation_errors(); ?>
                <?php echo $this->session->flashdata('error'); ?>
                <?php echo $this->session->flashdata('message'); ?>
		    </div>
<?php } ?>
	<?php echo form_open(); ?>
    	<?php echo form_fieldset('Generate New Activation Code'); ?>
		<?php echo form_label('User Name','username'); ?>
		<?php $data=array('name'=>'username','title'=>'User Name','class'=>'username'); echo form_input($data);?>
   		<?php echo form_label('','submit'); ?>
		<?php echo form_submit('submit','Request New Activation Code','class="btn btn-success"');?>
        <?php echo form_fieldset_close(); ?>
    <?php echo form_close(); ?>
</div>