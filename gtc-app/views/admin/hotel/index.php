<section>
	<h2>All Hotels</h2>
    <?php echo anchor('admin/hotel/edit','<i class="glyphicon glyphicon-plus"></i> Add a New Hotel'); ?>
    <table class="table table-hover table-responsive jumbotron">
    	<thead class="thead">
        	<tr>
                <th>View</th>
            	<th>Title</th>
            	<th>Location</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="tbody">
        <?php if(count($hotels)): foreach($hotels as $hotel):?>
        	<tr>
                <td><img src="<?php echo base_url('wc-upload/gallery').'/'. $hotel->media_image;?>" alt="<?php echo $hotel->title;?>" class="thumbnail index-thumb"></td>
            	<td><?php echo anchor('admin/hotel/edit/'.$hotel->id,$hotel->title);?></td>
            	<td><?php echo $hotel->location_id; ?></td>
                <?php $featureOpt = array('0'=>'No','1'=>'Yes'); ?>
                <td><?php echo $featureOpt[$hotel->featured]; ?></td>
                <?php $activeOpt = array('0'=>'No','1'=>'Yes'); ?>
                <td><?php echo $activeOpt[$hotel->active]; ?></td>
                <td><?php echo btn_edit('admin/hotel/edit/'.$hotel->id);?></td>
                <td><?php echo btn_delete('admin/hotel/delete/'.$hotel->id);?></td>
            </tr>
        <?php endforeach; ?>
        <?php else : ?>
        	<tr>
            	<td colspan="7">We could not find any hotel</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</section>