<section>
	<h2><?php  if($this->uri->segment(4)) echo strtoupper($this->uri->segment(4)); ?> Users</h2>
    <?php echo anchor('admin/user/edit','<i class="glyphicon glyphicon-plus"></i> Add a user'); ?>
    <table class="table table-striped">
    	<thead>
        	<tr>
            	<th>Username</th>
            	<th>Email</th>
            	<th>Role</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php if(isset($users)): foreach($users as $user):?>
        	<tr>
            	<td><?php echo anchor('admin/user/edit/'.$user->id,$user->username);?></td>
                  <td><?php echo anchor('admin/user/edit/'.$user->id,$user->email);?></td>
                  <td><?php echo anchor('admin/user/edit/'.$user->id,$user->role);?></td>
                <td><?php echo btn_edit('admin/user/edit/'.$user->id);?></td>
                <td><?php echo btn_delete('admin/user/delete/'.$user->id);?></td>
            </tr>
        <?php endforeach; ?>
        <?php else : ?>
        	<tr>
            	<td colspan="3">We could not find any <?php  if($this->uri->segment(4)) echo strtoupper($this->uri->segment(4)); ?> user</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</section>