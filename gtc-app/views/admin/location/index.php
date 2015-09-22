<section>
	<h2>All Locations</h2>
    <?php echo anchor('admin/location/edit','<i class="glyphicon glyphicon-plus"></i> Add a New Location'); ?>
    <table class="table table-hover table-responsive jumbotron">
    	<thead class="thead">
        	<tr>
                <th>View</th>
            	<th>Title</th>
            	<th>Country</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="tbody">
        <?php if(count($locations)): foreach($locations as $location):?>
        	<tr>
                <td><img src="<?php echo base_url('wc-upload/gallery').'/'. $location->media_image;?>" alt="<?php echo $location->title;?>" class="thumbnail index-thumb"></td>
            	<td><?php echo anchor('admin/location/edit/'.$location->id,$location->title);?></td>
            	<td><?php echo $location->country; ?></td>
                <?php $featureOpt = array('0'=>'No','1'=>'Yes'); ?>
                <td><?php echo $featureOpt[$location->featured]; ?></td>
                <?php $activeOpt = array('0'=>'No','1'=>'Yes'); ?>
                <td><?php echo $activeOpt[$location->active]; ?></td>
                <td><?php echo btn_edit('admin/location/edit/'.$location->id);?></td>
                <td><?php echo btn_delete('admin/location/delete/'.$location->id);?></td>
            </tr>
        <?php endforeach; ?>
        <?php else : ?>
        	<tr>
            	<td colspan="7">We could not find any location</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</section>