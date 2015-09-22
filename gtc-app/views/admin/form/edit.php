<section>
	<h2><?php echo empty($form->id) ? 'Add a New form' : 'Edit form ' . $form->account_no;?></h2>
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
  		<?php  echo form_fieldset('Account Opening'); ?>
		<?php echo form_label('Account Category','account_category'); ?>
		<?php echo form_dropdown('account_category', array('saving'=>'Saving Account','current'=>'Current Account','time_deposit'=>'Time Deposit','reinvestment'=>'Reinvestment'), $this->input->post('account_category') ? $this->input->post('account_category') : $form->account_category);?>
        <?php echo form_label('Account No','account_no'); ?>
        <?php $data=array('name'=>'account_no','title'=>'Account No','id'=>'account_no'); echo form_input($data,set_value('account_no',$form->account_no));?>						
   		<?php echo form_fieldset_close();  ?>
        
        <?php  echo form_fieldset('Customer Details'); ?>
       	<?php echo form_label('Customer Name','cus_name'); ?>
        <?php $data=array('name'=>'cus_name','title'=>'Customer Name','id'=>'cus_name'); echo form_input($data,set_value('cus_name',$form->cus_name));?>
		<?php echo form_label('Date of Birth','cus_dob'); ?>
        <?php $data=array('name'=>'cus_dob','cus_dob'=>'Date of Birth','id'=>'cus_dob','class'=>'datepicker'); echo form_input($data,set_value('cus_dob',$form->cus_dob)).'<br>';?>
		<?php echo form_label('Pin No','cus_pin_no'); ?>
		<?php $data=array('name'=>'cus_pin_no','title'=>'Pin No','id'=>'cus_pin_no'); echo form_input($data,set_value('cus_pin_no',$form->cus_pin_no));?>
		<?php echo form_label('Company Belongs to','cus_company_belong_to'); ?>
		<?php $data=array('name'=>'cus_company_belong_to','title'=>'Company Belong To','id'=>'cus_company_belong_to'); echo form_input($data,set_value('cus_company_belong_to',$form->cus_company_belong_to));?>
		<?php echo form_fieldset_close();  ?>
  
		<?php  echo form_fieldset('Names / Designations'); ?>
		<?php echo form_label('Name','tru_name'); ?>
        <?php $data=array('name'=>'tru_name','title'=>'Name','id'=>'tru_name'); echo form_input($data,set_value('tru_name',$form->tru_name));?>
        <?php echo form_label('Designation','tru_desig'); ?>
        <?php $data=array('name'=>'tru_desig','title'=>'Designation','id'=>'tru_desig'); echo form_input($data,set_value('tru_desig',$form->tru_desig)).'<br>';?>
        <?php echo form_label('S/o / W/o','tru_rel'); ?>
        <?php $data=array('name'=>'tru_rel','title'=>'Relation','id'=>'tru_rel'); echo form_input($data,set_value('tru_rel',$form->tru_rel));?>
		<?php echo form_fieldset_close();  ?>
        
        <?php  echo form_fieldset('Address'); ?>
		<?php echo form_label('Mailing Address','cus_mail_add'); ?>
        <?php $data=array('name'=>'cus_mail_add','title'=>'Mailing Address','id'=>'cus_mail_add'); echo form_input($data,set_value('cus_mail_add',$form->cus_mail_add));?>
        <?php echo form_label('Pin Code','cus_mail_add_pin'); ?>
        <?php $data=array('name'=>'cus_mail_add_pin','title'=>'Pincode','id'=>'cus_mail_add_pin'); echo form_input($data,set_value('cus_mail_add_pin',$form->cus_mail_add_pin)).'<br>';?>
        <?php echo form_label('Telephone','cus_mail_tel'); ?>
        <?php $data=array('name'=>'cus_mail_tel','title'=>'Telephone','id'=>'cus_mail_tel'); echo form_input($data,set_value('cus_mail_tel',$form->cus_mail_tel));?>
	    <?php echo form_label('Fax','cus_mail_fax'); ?>
        <?php $data=array('name'=>'cus_mail_fax','title'=>'Fax','id'=>'cus_mail_fax'); echo form_input($data,set_value('cus_mail_fax',$form->cus_mail_fax));?>
		<?php echo form_fieldset_close();  ?>
        
        <?php  echo form_fieldset('Introduction'); ?>
		<?php echo form_label('Introducer\'s Name','intro_name'); ?>
        <?php $data=array('name'=>'intro_name','title'=>'Introducer\'s Name','id'=>'cus_mail_add'); echo form_input($data,set_value('intro_name',$form->intro_name));?>
        <?php echo form_label('Account No','intro_acc_no'); ?>
        <?php $data=array('name'=>'intro_acc_no','title'=>'Pincode','id'=>'intro_acc_no'); echo form_input($data,set_value('cus_mail_add_pin',$form->cus_mail_add_pin)).'<br>';?>
        <?php echo form_label('Address','intro_add'); ?>
        <?php $data=array('name'=>'intro_add','title'=>'Address','id'=>'intro_add'); echo form_input($data,set_value('intro_add',$form->intro_add));?>
	    <?php echo form_label('Pin Code','intro_add_pin'); ?>
        <?php $data=array('name'=>'intro_add_pin','title'=>'Pin Code','id'=>'intro_add_pin'); echo form_input($data,set_value('intro_add_pin',$form->intro_add_pin));?>
		<?php echo form_fieldset_close();  ?>
        
        <?php  echo form_fieldset('Modus Operandi'); ?>
        <?php $data = array('name'=> 'modus_operandi', 'id'=> 'single','value' => 'single','checked'=> TRUE, 'style' => 'margin:10px',); echo form_checkbox($data);?>
		<?php echo form_label('Single','modus_operandi'); ?>
        <?php $data = array('name'=> 'modus_operandi', 'id'=> 'joint','value' => 'joint', 'style' => 'margin:10px',); echo form_checkbox($data);?>
        <?php echo form_label('Joint','modus_operandi'); ?>
        <?php $data = array('name'=> 'modus_operandi', 'id'=> 'either','value' => 'either','style' => 'margin:10px',); echo form_checkbox($data);?>
   		<?php echo form_label('Either','modus_operandi'); ?>
        <?php $data = array('name'=> 'modus_operandi', 'id'=> 'survivor','value' => 'survivor', 'style' => 'margin:10px',); echo form_checkbox($data);?>
        <?php echo form_label('Survivor','modus_operandi'); ?>
        <?php echo form_fieldset_close();  ?>
        
        <?php  echo form_fieldset('Document enclosed'); ?>
        <?php $data = array('name'=> 'documents_enclosed', 'id'=> 'documents_enclosed','value' => 'regidential proof','checked'=> TRUE, 'style' => 'margin:10px',); echo form_checkbox($data);?>
        <?php echo form_label('Document enclosed','documents_enclosed'); ?>
		<?php echo form_fieldset_close();  ?>

		<?php echo form_submit('submit','save','class="btn btn-success"');?>
    <?php echo form_close(); ?>
</section>
<script>
$(function() {
	$('.datepicker').datepicker({format : 'yyyy-mm-dd'});
});
</script>

