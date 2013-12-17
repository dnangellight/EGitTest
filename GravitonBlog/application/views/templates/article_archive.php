<!-- Main Column -->
<div class="col-md-9">


<?php if ($pagination):?>
  <section class="pagination"><?php echo $pagination?></section>
<?php endif;?>

	<!-- Main Column -->
	<div class="row">
	<?php   if (count($articles)): foreach ($articles as $article): ?>
 <article class="col-md-9"><?php echo get_excerpt($article)?><hr></article>
<?php endforeach; endif;?>
	</div>
		</div>
			
		
	

<!-- Side Bar -->
<div class="col-md-3 sidebar">
<h2>Recent News</h2>

<?php $this->load->view('front_end/sidebar');?>
</div> 