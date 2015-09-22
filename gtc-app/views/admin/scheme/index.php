<section>
	<h2>All Schemes</h2>
    <?php echo anchor('admin/scheme/edit','<i class="glyphicon glyphicon-plus"></i> Add a New Scheme'); ?>
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
        <?php if(count($schemes)): foreach($schemes as $scheme):?>
        	<tr>
                <td><img src="<?php echo base_url('wc-upload/gallery').'/'. $scheme->media_image;?>" alt="<?php echo $scheme->title;?>" class="thumbnail index-thumb"></td>
            	<td><?php echo anchor('admin/scheme/edit/'.$scheme->id,$scheme->title);?></td>
                <?php $featureOpt = array('0'=>'No','1'=>'Yes'); ?>
                <td><?php echo $featureOpt[$scheme->featured]; ?></td>
                <?php $activeOpt = array('0'=>'No','1'=>'Yes'); ?>
                <td><?php echo $activeOpt[$scheme->active]; ?></td>
                <td><?php echo btn_edit('admin/scheme/edit/'.$scheme->id);?></td>
                <td><?php echo btn_delete('admin/scheme/delete/'.$scheme->id);?></td>
            </tr>
        <?php endforeach; ?>
        <?php else : ?>
        	<tr>
            	<td colspan="7">We could not find any scheme</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</section>