<div class="modal-header">
</div>
<div class="modal-body">
<?php  $attributes = array('name'=>'resend_form', 'class' => 'form', 'id' => 'resend_form'); ?>
  <?php echo form_open('user/resend',$attributes); ?>
    	<?php echo form_fieldset('Generate New Password Link'); ?>
		<?php echo form_label('User Name','username'); ?>
		<?php $data=array('name'=>'username','title'=>'User Name','class'=>'username'); 
    echo form_input($data);?>
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
   		<?php echo form_label('','submit'); ?>
		<?php echo form_submit('submit','Request New Password','class="btn btn-success"');?>
        <?php echo form_fieldset_close(); ?>
        <button type="button" class="btn" onclick="location.href='login'">Login</button>
  <button type="button" class="btn" onclick="reg()">Register</button>
    <?php echo form_close(); ?>
</div>