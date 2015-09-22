<section>
	<h2>All Packages</h2>
    <?php echo anchor('admin/package/edit','<i class="glyphicon glyphicon-plus"></i> Add a New Package'); ?>
    <table class="table table-hover table-responsive">
    	<thead class="thead">
        	<tr>
                <th>View</th>
            	<th>Title</th>
            	<th>Slug</th>
                <th>Price</th>
                <th>Category</th>
                <th>Location</th>
                <th>Scheme</th>
                <th>Transport</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="tbody">
        <?php if(count($packages)): foreach($packages as $package):?>

        	<tr>
                <td ><img src="<?php echo base_url('wc-upload/gallery').'/'. $package->media_image;?>" alt="<?php echo $package->title;?>" class="thumbnail index-thumb"></td>
            	<td><?php echo anchor('admin/package/edit/'.$package->id,$package->title);?></td>
            	<td><?php echo $package->slug; ?></td>
                <td><?php echo $package->price; ?></td>
                <td><?php echo $package->package_category; ?></td>
                <td><?php echo $package->package_location; ?></td>
                <td><?php echo $package->package_scheme; ?></td>
                <td><?php echo $package->package_transport; ?></td>
                <?php $featureOpt = array('0'=>'No','1'=>'Yes'); ?>
                <td><?php echo $featureOpt[$package->featured]; ?></td>
                <?php $activeOpt = array('0'=>'No','1'=>'Yes'); ?>
                <td><?php echo $activeOpt[$package->active]; ?></td>
                <td><?php echo btn_edit('admin/package/edit/'.$package->id);?></td>
                <td><?php echo btn_delete('admin/package/delete/'.$package->id);?></td>
            </tr>
        <?php endforeach; ?>
        <?php else : ?>
        	<tr>
            	<td colspan="12">We could not find any package</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    
</section>