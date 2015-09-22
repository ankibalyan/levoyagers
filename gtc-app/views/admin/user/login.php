                                <div class="modal-body container jumbotron trans">
<span></span>
<?php
   if($this->session->flashdata('error'))     
   {
?>      		
			<div class="alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
		    </div>
<?php } ?>
	<?php //Login form Starts ?>
  <?php $attributes = array('name'=>'login_form', 'class' => 'login_form form-signin', 'id' => 'login_form'); ?>
	<?php echo form_open('',$attributes); ?>
  <h2 class="form-signin-heading" align="center">Please Log in Here</h2>
  <?php if(form_error('username')): ?>
	<div class="alert alert-danger small" id="username_error"><?php echo form_error('username'); ?> </div>
  <?php endif; ?>
  <?php $data=array('name'=>'username','title'=>'User Name','id'=>'username','class'=>'form-control','placeholder'=>'User Name','autofocus'=>'autofocus');
  echo form_input($data);?>

  <?php if(form_error('password')): ?>
  <div class="alert alert-danger small" id="password_error"><?php echo form_error('password'); ?> </div>
  <?php endif; ?>
  <?php $data=array('name'=>'password','title'=>'Password','id'=>'password','class'=>'form-control','placeholder'=>'Password'); ?>
  <?php echo form_password($data);?>
  <?php echo form_submit('submit','Log in','id = "submit", class ="btn btn-lg btn-primary btn-block"');?>
  <label></label>
  <button type="button" class="btn btn-default btn-lg btn-block" onclick="forget()">Forget Password</button>
  <button type="button" class="btn btn-default btn-lg btn-block" onclick="reg()">Register</button>
  <?php echo form_close(); ?>
</div>
<script type="text/javascript">
  function reg()
  {
    location.href = "register";
  }
  function forget()
  {
    location.href = "forget";
  }
</script>
<script type="text/javascript">
  $("#login_form").submit(function{
    //assume there are no errors
    var errors = false;

    //hide all errors
    $('.error').hide();

    //check each field to make sure they are not blank
    if($("#username").val ==''){
      $("#username_error").show();
      errors = true;
    }
    if($("#password").val ==''){
      $("#password_error").show();
      errors = true;
    }

    if(error){
      $("span").text("Oops, Ya Missed Something, Try Again").fadeOut(5000);
      return false;
    }
  });
</script>

                            