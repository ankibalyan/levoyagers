<section>
	<h2>All Categories</h2>
    <?php echo anchor('admin/category/edit','<i class="glyphicon glyphicon-plus"></i> Add a New Category'); ?>
    <table class="table table-hover table-responsive jumbotron">
    	<thead class="thead">
        	<tr>
                <th>View</th>
            	<th>Title</th>
            	<th>Parent</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="tbody">
        <?php if(count($categorys)): foreach($categorys as $category):?>
        	<tr>
                <td ><img src="<?php echo base_url('wc-upload/gallery').'/'. $category->media_image;?>" alt="<?php echo $category->title;?>" class="thumbnail index-thumb"></td>
            	<td><?php echo anchor('admin/category/edit/'.$category->id,$category->title);?></td>
            	<td><?php echo $category->parent_title; ?></td>
                <?php $featureOpt = array('0'=>'No','1'=>'Yes'); ?>
                <td><?php echo $featureOpt[$category->featured]; ?></td>
                <?php $activeOpt = array('0'=>'No','1'=>'Yes'); ?>
                <td><?php echo $activeOpt[$category->active]; ?></td>
                <td><?php echo btn_edit('admin/category/edit/'.$category->id);?></td>
                <td><?php echo btn_delete('admin/category/delete/'.$category->id);?></td>
            </tr>
        <?php endforeach; ?>
        <?php else : ?>
        	<tr>
            	<td colspan="7">We could not find any category</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</section>