<section>
	<h2>Testimonies</h2>
    <?php echo anchor('admin/testimony/edit','<i class="glyphicon glyphicon-plus"></i> Add an Testimony'); ?>
    <table class="table table-striped table-responsive">
    	<thead class="thead">
        	<tr>
            	<th>Name</th>
            	<th>Testimony</th>
                <th>Place</th>
                <th>Date</th>
                <th>Approved</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="tbody">
        <?php if(count($testimonys)): foreach($testimonys as $testimony):?>
        	<tr>
            	<td><?php echo anchor('admin/testimony/edit/'.$testimony->id,$testimony->name);?></td>
                <td><?php echo anchor('admin/testimony/edit/'.$testimony->id,$testimony->comment);?></td>
                <td><?php echo anchor('admin/testimony/edit/'.$testimony->id,$testimony->place);?></td>
            	<td><?php echo $testimony->created; ?></td>
                <?php $approved = array('0'=> 'No','1'=>'Yes'); ?>
                <td><?php echo $approved[$testimony->approved]; ?></td>
                <td><?php echo btn_edit('admin/testimony/edit/'.$testimony->id);?></td>
                <td><?php echo btn_delete('admin/testimony/delete/'.$testimony->id);?></td>
            </tr>
        <?php endforeach; ?>
        <?php else : ?>
        	<tr>
            	<td colspan="7">We could not find any testimony</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</section>