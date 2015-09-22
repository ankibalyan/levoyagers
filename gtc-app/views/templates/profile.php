<div class="table-div">
<?php $lform = array('name'=>'user-data','id' => 'user-data'); ?>
<?php echo form_open('/user/edit',$lform); ?>
	<table class="table">
	<thead>
		<tr>
			<th style="">Account Details</th>
			<td><?php echo form_submit('submit','Edit','class="btn" id = "userdata"');?></td>
		</tr>
	</thead>
	<tbody class="table-body">
		<tr>
			<th>
			<?php echo form_label('User Name','username'); ?></th>
			<td><?php $data=array('name'=>'username','title'=>'User Name','class'=>'table-input','disabled'=>'disabled');
			echo form_input($data,set_value('username', $user->username));?></td>
		</tr>
		<tr>
			<th><?php echo form_label('Email','email'); ?></th>
			<td><?php $data=array('name'=>'email','title'=>'Email','class'=>'table-input','disabled'=>'disabled');
			echo form_input($data,set_value('email', $user->email));?></td>
		</tr>
		<tr>
			<th><?php echo form_label('First Name*','first_name'); ?></th>
			<td><?php $data=array('name'=>'first_name','title'=>'First Name','class'=>'table-input','disabled'=>'disabled');
			echo form_input($data,set_value('first_name', $user->first_name));?></td>
		</tr>
		<tr>
			<th><?php echo form_label('Last Name*','last_name'); ?></th>
			<td><?php $data=array('name'=>'last_name','title'=>'Last Name','class'=>'table-input','disabled'=>'disabled');
			echo form_input($data,set_value('last_name', $user->last_name));?></td>
		</tr>
		<tr>
			<th><?php echo form_label('Company Name','company'); ?></th>
			<td><?php $data=array('name'=>'company','title'=>'Company Name','class'=>'table-input','disabled'=>'disabled');
			echo form_input($data,set_value('company', $user->company));?></td>
		</tr>
		<tr>
			<th><?php echo form_label('Phone Number','phone'); ?></th>
			<td><?php $data=array('name'=>'phone','title'=>'Phone Number','class'=>'table-input','disabled'=>'disabled');
			echo form_input($data,set_value('phone', $user->phone));?>
			</td>
		</tr>
	</tbody>
	</table>
<?php echo form_close(); ?>
</div>

<div class="table-div">
	<table class="table">
	<thead>
		<tr>
			<th style="">Shipping Data</th>
			<td><button id="edit-shipping">Edit</button></td>
		</tr>
	</thead>
	<tbody class="table-body">
		<tr>
			<th><?php echo form_label('Address','address'); ?></th>
			<td><?php $data=array('name'=>'address','title'=>'Shipping Address','class'=>'table-input','disabled'=>'disabled');
			echo form_input($data,set_value('address', $shipping->address));?></td>
		</tr>
		<tr>
			<th><?php echo form_label('City','city'); ?></th>
			<td><?php $data=array('name'=>'city','title'=>'City','class'=>'table-input','disabled'=>'disabled');
			echo form_input($data,set_value('city', $shipping->city));?></td>
		</tr>
		<tr>
			<th><?php echo form_label('State','state'); ?></th>
			<td><?php $data=array('name'=>'state','title'=>'State','class'=>'table-input','disabled'=>'disabled');
			echo form_input($data,set_value('state', $shipping->state));?></td>
		</tr>
		<tr>
			<th><?php echo form_label('Postal Zip','zip'); ?></th>
			<td><?php $data=array('name'=>'zip','title'=>'Postal Zip','class'=>'table-input','disabled'=>'disabled');
			echo form_input($data,set_value('zip', $shipping->zip));?></td>
		</tr>
		<tr>
			<th><?php echo form_label('Country','country'); ?></th>
			<td><?php $data=array('name'=>'country','title'=>'Country','class'=>'table-input','disabled'=>'disabled');
			echo form_input($data,set_value('country', $shipping->country));?></td>
		</tr>
	</tbody>
	</table>
</div>

<div class="table-div">
	<table class="table">
	<thead>
		<tr>
			<th style="">Billing Data</th>
			<td><button id="edit-billing">Edit</button></td>
		</tr>
	</thead>
	<tbody class="table-body">
		<tr>
			<th><?php echo form_label('Address','address'); ?></th>
			<td><?php $data=array('name'=>'address','title'=>'Shipping Address','class'=>'table-input','disabled'=>'disabled');
			echo form_input($data,set_value('address', $billing->address));?></td>
		</tr>
		<tr>
			<th><?php echo form_label('City','city'); ?></th>
			<td><?php $data=array('name'=>'city','title'=>'City','class'=>'table-input','disabled'=>'disabled');
			echo form_input($data,set_value('city', $billing->city));?></td>
		</tr>
		<tr>
			<th><?php echo form_label('State','state'); ?></th>
			<td><?php $data=array('name'=>'state','title'=>'State','class'=>'table-input','disabled'=>'disabled');
			echo form_input($data,set_value('state', $billing->state));?></td>
		</tr>
		<tr>
			<th><?php echo form_label('Postal Zip','zip'); ?></th>
			<td><?php $data=array('name'=>'zip','title'=>'Postal Zip','class'=>'table-input','disabled'=>'disabled');
			echo form_input($data,set_value('zip', $billing->zip));?></td>
		</tr>
		<tr>
			<th><?php echo form_label('Country','country'); ?></th>
			<td><?php $data=array('name'=>'country','title'=>'Country','class'=>'table-input','disabled'=>'disabled');
			echo form_input($data,set_value('country', $billing->country));?></td>
		</tr>
	</tbody>
	</table>
</div>
<script>
$(document).ready(function() {
	$("#userdata").toggle(
	function(){
	$('.table-input').removeAttr('disabled');    
	                                   $(this).val('Save');
	},
	function(){    
	$('.table-input').attr('disabled','disabled');
	$(this).val('Edit');  
	});
	$("#userdata").submit(function(event) {
			alert($(this).val());
			event.preventDefault();
	});
	$("#edit-shipping").toggle(
	                               function(){
	$('.table-input').removeAttr('disabled');    
	                                   $(this).text('Save');
	},
	function(){    
	$('.table-input').attr('disabled','disabled');
	                                   $(this).text('Edit');    
	});
	$("#edit-billing").toggle(
	                               function(){
	$('.table-input').removeAttr('disabled');    
	                                   $(this).text('Save');
	},
	function(){    
	$('.table-input').attr('disabled','disabled');
	                                   $(this).text('Edit');    
	});
});
	
</script>