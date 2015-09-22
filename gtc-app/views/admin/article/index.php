<section>
	<h2>News Articles</h2>
    <?php echo anchor('admin/article/edit','<i class="glyphicon glyphicon-plus"></i> Add an Article'); ?>
    <table class="table table-striped table-responsive">
    	<thead class="thead">
        	<tr>
            	<th>Title</th>
            	<th>Publication Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="tbody">
        <?php if(count($articles)): foreach($articles as $article):?>
        	<tr>
            	<td><?php echo anchor('admin/article/edit/'.$article->id,$article->title);?></td>
            	<td><?php echo $article->pub_date; ?></td>
                <td><?php echo btn_edit('admin/article/edit/'.$article->id);?></td>
                <td><?php echo btn_delete('admin/article/delete/'.$article->id);?></td>
            </tr>
        <?php endforeach; ?>
        <?php else : ?>
        	<tr>
            	<td colspan="3">We could not find any article</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</section>