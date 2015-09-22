<section>
	<h2>Blog Post Comments</h2>
    <?php echo anchor('admin/comment/edit','<i class="glyphicon glyphicon-plus"></i> Add an Comment'); ?>
    <table class="table table-striped table-responsive">
    	<thead class="thead">
        	<tr>
            	<th>Post</th>
            	<th>Comment</th>
                <th>User</th>
                <th>Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="tbody">
        <?php if(count($comments)): foreach($comments as $comment):?>
        	<tr>
            	<td><?php echo anchor('admin/comment/edit/'.$comment->post_id,$comment->comment_post);?></td>
                <td><?php echo anchor('admin/comment/edit/'.$comment->id,$comment->comment);?></td>
                <td><?php echo anchor('admin/comment/edit/'.$comment->user_id,$comment->comment_user);?></td>
            	<td><?php echo $comment->created; ?></td>
                <td><?php echo btn_edit('admin/comment/edit/'.$comment->id);?></td>
                <td><?php echo btn_delete('admin/comment/delete/'.$comment->id);?></td>
            </tr>
        <?php endforeach; ?>
        <?php else : ?>
        	<tr>
            	<td colspan="3">We could not find any comment</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</section>