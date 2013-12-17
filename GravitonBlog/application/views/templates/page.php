<!-- Main Column -->
<div class="col-md-9">
<article>
<h2><?php echo e($page->title)?></h2>

<?php echo $page->body?>
</article>
	</div>
			
		
	

<!-- Side Bar -->
<div class="col-md-3 sidebar">
<h2>Recent Articles</h2>
<?php $this->load->view('front_end/sidebar');?>
</div> 