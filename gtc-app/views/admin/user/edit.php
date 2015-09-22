<section>
	<h2><?php echo empty($user->id) ? 'Add a New User' : 'Edit '.' User ' . $user->username;?></h2>
    <div class="aricle col-md-9">
<?php
   if($this->session->flashdata('error'))     
   {
?>      		
			<div class="alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
		    </div>
<?php } ?>
	<?php $attributes = array('name'=>'edit_form', 'class' => 'register_form', 'id' => 'edit_form'); ?>
	<?php echo form_open('',$attributes); ?>
    	<?php echo form_fieldset('Save your credentials'); ?>

           <?php if(form_error('username')): ?>
    		<div class="alert alert-danger"><?php echo form_error('username'); ?> </div>
            <?php endif; ?>
			<?php echo form_label('User Name*','username'); ?>
            <?php $data=array('name'=>'username','title'=>'User Name','class'=>'username'); echo form_input($data,set_value('username', $user->username));?>
			<br>
           <?php if(form_error('email')): ?>
    		<div class="alert alert-danger"><?php echo form_error('email'); ?> </div>
            <?php endif; ?>
			<?php echo form_label('Email*','email'); ?>
            <?php $data=array('name'=>'email','title'=>'Email','class'=>'email'); echo form_input($data,set_value('email', $user->email));?>
			<br>
           <?php if(form_error('password')): ?>
    		<div class="alert alert-danger"><?php echo form_error('password'); ?> </div>
            <?php endif; ?>
            <?php echo form_label('Password*','password'); ?>
            <?php echo form_password('password');?>
			<br>
           <?php if(form_error('password_confirm')): ?>
    		<div class="alert alert-danger"><?php echo form_error('password_confirm'); ?> </div>
            <?php endif; ?>
            <?php echo form_label('Confirm Password*','password_confirm'); ?>
            <?php echo form_password('password_confirm');?>
		<?php echo form_fieldset_close(); ?>
       	<?php echo form_fieldset('User Profile'); ?>

           <?php if(form_error('first_name')): ?>
    		<div class="alert alert-danger"><?php echo form_error('first_name'); ?> </div>
            <?php endif; ?>
        	<?php echo form_label('First Name*','first_name'); ?>
            <?php $data=array('name'=>'first_name','title'=>'First Name','class'=>'first_name'); echo form_input($data,set_value('first_name', $user->first_name));?>	
			<br>
           <?php if(form_error('last_name')): ?>
    		<div class="alert alert-danger"><?php echo form_error('last_name'); ?> </div>
            <?php endif; ?>
            <?php echo form_label('Last Name*','last_name'); ?>
            <?php $data=array('name'=>'last_name','title'=>'Last Name','class'=>'last_name'); echo form_input($data,set_value('last_name', $user->last_name));?><br>
			<br>
           <?php if(form_error('company')): ?>
    		<div class="alert alert-danger"><?php echo form_error('company'); ?> </div>
            <?php endif; ?>
            <?php echo form_label('Company Name','company'); ?>
            <?php $data=array('name'=>'company','title'=>'Company Name','class'=>'company'); echo form_input($data,set_value('company', $user->company));?>
			<br>
           <?php if(form_error('phone')): ?>
    		<div class="alert alert-danger"><?php echo form_error('phone'); ?> </div>
            <?php endif; ?>
            <?php echo form_label('Phone Number','phone'); ?>
            <?php $data=array('name'=>'phone','title'=>'Phone Number','class'=>'phone'); echo form_input($data,set_value('phone', $user->phone));?>
            <br>
            <?php echo form_label('','submit'); ?>
            <?php echo form_submit('submit','Sign Up','class="btn btn-success"');?>        
        <?php echo form_fieldset_close(); ?>
        <p>* fields are mandatory</p>
    <?php echo form_close(); ?>
    </div>
</section>