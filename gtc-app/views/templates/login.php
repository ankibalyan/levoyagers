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
  <?php $lform = array('name'=>'login','class' => 'form'); ?>
  <?php echo form_open('user/login',$lform); ?>
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
  <?php echo form_submit('submit','Log in','id = "submit", class ="btn"');?>
  <button type="button" class="btn" onclick="forget()">Forget Password</button>
  <button type="button" class="btn" onclick="reg()">Register</button>
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

                            