<section>
	<h2>All Medias</h2>
    <?php echo anchor('admin/media/upload','<i class="glyphicon glyphicon-plus"></i> Add a New Media'); ?>
    <table class="table table-hover table-responsive jumbotron">
    	<thead class="thead">
        	<tr>
                <th>View</th>
            	<th>Title</th>
            	<th>User</th>
                <th>Date</th>
                <th>Type</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="tbody">
        <?php if(count($medias)): foreach($medias as $media):?>
        	<tr>
                <td><img src="<?php echo $media->file_path .'/'. $media->file_name;?>" alt="<?php echo $media->title;?>" class="thumbnail index-thumb"></td>
            	<td><?php echo anchor('admin/media/edit/'.$media->id,$media->title);?></td>
            	<td><?php echo $media->user_id; ?></td>
                <td><?php echo $media->created; ?></td>
                <td><?php echo $media->file_type; ?></td>
                <?php $activeOpt = array('0'=>'No','1'=>'Yes'); ?>
                <!-- <td><?php //echo $activeOpt[$media->active]; ?></td> -->
                <td><?php echo btn_edit('admin/media/edit/'.$media->id);?></td>
                <td><?php echo btn_delete('admin/media/delete/'.$media->id);?></td>
            </tr>
        <?php endforeach; ?>
        <?php else : ?>
        	<tr>
            	<td colspan="7">We could not find any media</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</section>
