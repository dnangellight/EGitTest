<?php $this->load->view('admin/components/page_head')?>
<body>

	<div class="navbar navbar-inverse navbar-default navbar-static-top"
		role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-inner">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target="#navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand"
				href="<?php echo site_url('admin/dashboard');?>"><?php echo $meta_title;?></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-right" id="navbar-collapse-1">
			<ul class="nav navbar-nav ">
				<li class="active"><a
					href="<?php echo site_url('admin/dashboard');?>">Dashboard</a></li>
					<li><?php echo anchor('admin/page/order','order pages');?></li>
						<li><?php echo anchor('admin/article','Articles');?></li>
				<li><?php echo anchor('admin/page','pages');?></li>
				<li><?php echo anchor('admin/user','users');?></li>
			</ul>


		</div>
		<!-- /.navbar-collapse -->
		
		
		
	</div>


	<div class="container">
		<div class="row">
			<!-- Main Column -->
			 <div class="col-md-9">
		<?php $this->load->view($subview)?>
					
				
			</div>

			<!-- Side Bar -->
			<div class="col-md-3">
			<section>
					<?php echo mailto('gg@ngyu.com','<i class="fa fa-user"></i> guoyansong')?><br>
						<?php echo anchor('admin/user/logout','<i class="fa fa-power-off"></i> Logout')?>
				</section>
			</div>
		</div>
	</div>

<?php $this->load->view('admin/components/page_tail')?>
