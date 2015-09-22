<section>
	<h2><?php  if($this->uri->segment(4)) echo strtoupper($this->uri->segment(4)); ?> Users</h2>
    <?php echo anchor('admin/user/edit','<i class="glyphicon glyphicon-plus"></i> Add a user'); ?>
    <table class="table table-striped">
    	<thead>
        	<tr>
            	<th>Username</th>
            	<th>Email</th>
            	<th>Active</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        <?php if(count($users)): foreach($users as $user):?>
        	<tr>
            	<td><?php echo anchor('admin/user/edit/'.$user->id,$user->username);?></td>
                  <td><?php echo anchor('admin/user/edit/'.$user->id,$user->email);?></td>
                  <td><?php echo anchor('admin/user/edit/'.$user->id,$user->active);?></td>
                <td><?php echo btn_edit('admin/user/edit/'.$user->id);?></td>
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