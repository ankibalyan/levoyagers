<section>
<h2><?php echo empty($article->id) ? 'Add a New Article' : 'Edit Article ' . $article->title;?></h2>

<?php
   if(validation_errors()||$this->session->flashdata('error'))     
   {
?>      		
			<div class="alert alert-danger">
				<?php echo validation_errors(); ?>
                <?php echo $this->session->flashdata('error'); ?>
		    </div>
<?php } ?>
	<?php echo form_open(); ?>
    <table class="table table-hover table-striped">
	    <tbody>
            <tr>
                <td><?php echo form_label('Publication Date','pub_date'); ?></td>
                <td colspan="2" ><?php $data=array('name'=>'pub_date','title'=>'Publication Date','id'=>'pub_date','class'=>'datepicker'); echo form_input($data,set_value('pub_date',$article->pub_date));?></td>
                <td><?php echo form_submit('submit','Save Article','class="btn btn-lg btn-block btn-success"');?></td>
            </tr>
            <tr>
                <td><?php echo form_label('Title','title'); ?></td>
                <td ><?php $data=array('name'=>'title','title'=>'Enter Title','id'=>'title'); echo form_input($data,set_value('title',$article->title));?></td>
                <td><?php echo form_label('slug','slug'); ?></td>
                <td colspan="2"><?php $data=array('name'=>'slug','title'=>'Slug','id'=>'slug'); echo form_input($data,set_value('slug',$article->slug));?></td>
    
            </tr>
            <tr>
                <td><?php echo form_label('Body','body'); ?></td>
                <td colspan="3"><?php $data=array('name'=>'body','title'=>'article Body','id'=>'body','class'=>'tinymce'); echo form_textarea($data,set_value('body',$article->body));?></td>
            </tr>
		</tbody>
    </table>
    <?php //$data=array('name'=>'modified','id'=>'modified', 'disabled'=>'disabled'); echo form_input($data,set_value('modified', date('Y-m-d H:i:s')));?>
    <?php echo form_close(); ?>
</section>

<script>
$(function() {
	$('.datepicker').datepicker({dateFormat :'yy-mm-dd'});
});
</script>
<script>
$(function(){
          CKEDITOR.replace("body",{
            //uiColor: '#CaC1fa',
            filebrowserBrowseUrl: "/admin/gallery.jsp"
          })
});</script>