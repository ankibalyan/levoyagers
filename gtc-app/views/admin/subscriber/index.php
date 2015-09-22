<section>
	<h2>subscribers</h2>
    <?php echo anchor('admin/subscriber/newsletter','<i class="glyphicon glyphicon-plus"></i> Create News Letter '); ?>
    <table class="table table-striped">
    	<thead>
        	<tr>
                <th>Sno.</th>            
            	<th>Subscriber Email</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php if(count($subscribers)): foreach($subscribers as $subscriber):?>
      	<?php static $i=1; ?>
        	<tr>
                <td><?php echo $i //btn_edit('admin/subscriber/edit/'.$subscriber['id']);?></td>            
            	<td><?php echo anchor('admin/subscriber/edit/'.$subscriber['id'],$subscriber['semail']);?></td>
                <td><?php echo btn_delete('admin/subscriber/delete/'.$subscriber['id']);?></td>
            </tr>
         <?php $i++; ?>
        <?php endforeach; ?>
        <?php else : ?>
        	<tr>
            	<td colspan="3">We could not find any subscriber</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</section>
