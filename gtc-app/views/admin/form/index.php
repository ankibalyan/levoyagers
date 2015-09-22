<section>
	<h2>Bank Accounts</h2>
    <?php echo anchor('admin/form/edit','<i class="glyphicon glyphicon-plus"></i> Add a new Account'); ?>
    <table class="table table-striped">
    	<thead>
        	<tr>
                <th>Sno.</th>            
            	<th>Account No</th>
                <th>A/c Holder Name</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php if(count($forms)): foreach($forms as $form):?>
      	<?php static $i=1; ?>
        	<tr>
                <td><?php echo $i //btn_edit('admin/form/edit/'.$form['id']);?></td>            
            	<td><?php echo anchor('admin/form/edit/'.$form['id'],$form['account_no']);?></td>
            	<td><?php echo anchor('admin/form/edit/'.$form['id'],$form['cus_name']);?></td>
                <td><?php echo btn_delete('admin/form/delete/'.$form['id']);?></td>
            </tr>
         <?php $i++; ?>
        <?php endforeach; ?>
        <?php else : ?>
        	<tr>
            	<td colspan="3">We could not find any form</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</section>