<section>
	<h2>All Transports</h2>
    <?php echo anchor('admin/transport/edit','<i class="glyphicon glyphicon-plus"></i> Add a New Transport'); ?>
    <table class="table table-hover table-responsive jumbotron">
    	<thead class="thead">
        	<tr>
                <th>View</th>
            	<th>Title</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="tbody">
        <?php if(count($transports)): foreach($transports as $transport):?>
        	<tr>
                <td><img src="<?php echo base_url('wc-upload/gallery').'/'.$transport->media_image; ?>" alt="<?php echo $transport->title;?>" class="thumbnail index-thumb"></td>
            	<td><?php echo anchor('admin/transport/edit/'.$transport->id,$transport->title);?></td>
                <?php $featureOpt = array('0'=>'No','1'=>'Yes'); ?>
                <td><?php echo $featureOpt[$transport->featured]; ?></td>
                <?php $activeOpt = array('0'=>'No','1'=>'Yes'); ?>
                <td><?php echo $activeOpt[$transport->active]; ?></td>
                <td><?php echo btn_edit('admin/transport/edit/'.$transport->id);?></td>
                <td><?php echo btn_delete('admin/transport/delete/'.$transport->id);?></td>
            </tr>
        <?php endforeach; ?>
        <?php else : ?>
        	<tr>
            	<td colspan="7">We could not find any transport</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</section>