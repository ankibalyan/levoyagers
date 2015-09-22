<section>
	<h2>News Product</h2>
    <?php echo anchor('admin/product/edit','<i class="glyphicon glyphicon-plus"></i> Add an Product'); ?>
    <table class="table table-striped table-responsive">
    	<thead class="thead">
        	<tr>
            	<th>Title</th>
            	<th>Description</th>
                <th>Price</th>
                <th>Customer</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="tbody">
        <?php if(count($products)): foreach($products as $product):?>
        	<tr>
            	<td><?php echo anchor('admin/product/edit/'.$product->id,$product->title);?></td>
            	<td><?php echo $product->description; ?></td>
                <td><?php echo "Rs. ".$product->price." /-"; ?></td>
                <td><?php echo $customers[$product->user_id]; ?></td>
                <td><?php echo btn_edit('admin/product/edit/'.$product->id);?></td>
                <td><?php echo btn_delete('admin/product/delete/'.$product->id);?></td>
            </tr>
        <?php endforeach; ?>
        <?php else : ?>
        	<tr>
            	<td colspan="3">We could not find any product</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</section>