<section>
<h2><?php echo empty($page->id) ? 'Add a New Page' : 'Edit Page ' . $page->title;?></h2>
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
                <td><?php echo form_label('Parent','parent_id'); ?></td>
                <td ><?php echo form_dropdown('parent_id', $pages_no_parents, $this->input->post('parent_id') ? $this->input->post('parent_id') : $page->parent_id);?></td>
                <td><?php echo form_label('Template','template'); ?></td>
                <td ><?php echo form_dropdown('template', array('page'=>'Page','homepage'=>'Home Page','packages'=>'Packages','news_archive'=>'News Archive','contact'=>'Contact','blog'=>'Blog'), $this->input->post('template') ? $this->input->post('template') : $page->template);?></td>
            </tr>
            <tr>
                <td><?php echo form_label('Title','title'); ?></td>
                <td ><?php $data=array('name'=>'title','title'=>'Enter Title','id'=>'title'); echo form_input($data,set_value('title',$page->title));?></td>
                <td><?php echo form_label('slug','slug'); ?></td>
                <td colspan="2"><?php $data=array('name'=>'slug','title'=>'Slug','id'=>'slug'); echo form_input($data,set_value('slug',$page->slug));?></td>
            </tr>
            <tr>
                <td><?php echo form_label('Body','body'); ?></td>
                <td colspan="3"><?php $data=array('name'=>'body','title'=>'Page Body','id'=>'body','class'=>'tinymce'); echo form_textarea($data,set_value('body',stripslashes($page->body)));?></td>
            </tr>
            <tr>
            <td><?php echo form_label('Menu','menu'); ?></td>
                <td ><?php echo form_dropdown('menu', array('top'=>'Top Menu','side'=>'Side Menu'), $this->input->post('menu') ? $this->input->post('menu') : $page->menu);?></td>
            	<td colspan="4"  align="right"><?php echo form_submit('submit','save','class="btn btn-success"');?></td>   
            </tr>
		</tbody>
    </table>
    
    <?php echo form_close(); ?>
</section>
<script>
$(function(){
          CKEDITOR.replace("body",{
            //uiColor: '#CaC1fa',
            filebrowserBrowseUrl: "/browser"
          })
});</script>