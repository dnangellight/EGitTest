<!-- Main Column -->
<div class="col-md-9">
<!-------MainContent------>
	<!-- Main Column -->
	<div class="row"><div class="col-md-9"><?php if(isset($articles[0])) echo get_excerpt($articles[0])?></div></div>

	<div class="row">	<div class="col-md-5"><?php if(isset($articles[1])) echo get_excerpt($articles[1])?></div>
	<div class="col-md-4"><?php if(isset($articles[2])) echo get_excerpt($articles[2],30)?></div>
	</div>
			
		
	
</div>
<!-- Side Bar -->
<div class="col-md-3 sidebar">
<h2>Recent News</h2>
<?php echo anchor($article_archieve_link, '+ Article Archive')?>
<?php $articles = array_slice($articles, 3)?>
</div> 