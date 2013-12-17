<?php $this->load->view('front_end/components/page_head')?>


<body>


	<div class="container">
		<section>
			<h1><?php echo anchor('',strtoupper(config_item('site_name')))  ?></h1>
		</section>
	
 		
		<?php echo get_menu($menu);?>		

				




	</div>


	<div class="container">
		<div class="row">
	<?php $this->load->view('templates/'.$subview)?>	
		</div>
	</div>
<?php $this->load->view('front_end/components/page_tail')?>