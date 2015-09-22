<section>
<div id="myMenuTabs">
    <ul>
        <li><a href="#top_menu">Top Menu Pages</a></li>
        <li><a href="#side_menu">Side Menu Pages</a></li>
    </ul>
    <div id="top_menu">
        <?php echo anchor('admin/page/edit/top/','<i class="glyphicon glyphicon-plus"></i> Add a page'); ?>
        <table class="table table-hover table-responsive">
            <thead class="thead">
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Parent</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class="tbody">
            <?php if(count($pages)): foreach($pages as $page):?>
                <tr>
                    <td><?php echo anchor('admin/page/edit/top/'.$page->id,$page->title);?></td>
                    <td><?php echo $page->slug; ?></td>
                    <td><?php echo $page->parent_slug; ?></td>
                    <td><?php echo btn_edit('admin/page/edit/top/'.$page->id);?></td>
                    <td><?php echo btn_delete('admin/page/delete/'.$page->id);?></td>
                </tr>
            <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3">We could not find any page</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div id="side_menu">
        <?php echo anchor('admin/page/edit/side','<i class="glyphicon glyphicon-plus"></i> Add a page'); ?>
        <table class="table table-hover table-responsive">
            <thead class="thead">
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Parent</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class="tbody">
            <?php if(count($side)): foreach($side as $page):?>
                <tr>
                    <td><?php echo anchor('admin/page/edit/side/'.$page->id,$page->title);?></td>
                    <td><?php echo $page->slug; ?></td>
                    <td><?php echo $page->parent_slug; ?></td>
                    <td><?php echo btn_edit('admin/page/edit/side/'.$page->id);?></td>
                    <td><?php echo btn_delete('admin/page/delete/'.$page->id);?></td>
                </tr>
            <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3">We could not find any page</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</section>
<script>
    $(document).ready(function() {
        $('#myMenuTabs').tabs();
    });
</script>