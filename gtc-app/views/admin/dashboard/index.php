<?php $email = $this->session->userdata('email'); 
	$name = $this->session->userdata('name');
?>
<div  class="jumbotron">
	<h3>Recently Modified Articles </h3>
	<?php if(count($recent_articles)) : ?>
	<?php foreach($recent_articles as $article): ?>
	<ul>
	<li><?php echo anchor('admin/article/edit/'.$article->id, e($article->title));?> - <?php echo date('Y-M-d',strtotime(e($article->modified))); ?></li>
	</ul>
	<?php endforeach; ?>
	<?php endif; ?>	
</div>
