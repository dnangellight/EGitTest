


<h3><?php echo empty($page->id)?'Add a new page ' : 'Edit page'.$page->title?></h3>
<p>PLEASE VERIFY</p>



<?php echo validation_errors();?>

 <?php echo  form_open();?>


<table class="table">

<tr>
		<td>Parent</td>
		<td><?php echo form_dropdown('pid',$pages_without_parents,$this->input->post('pid')?$this->input->post('pid') : $page->pid);?>
     
	
	</tr>
	
	<tr>
		<td>Template</td>
		<td><?php echo form_dropdown('template',array('page'=>'Page','article_archive'=>'Article archive','homepage'=>'Homepage'),$this->input->post('template')?$this->input->post('template'): $page->template);?>
     
	
	</tr>
	<tr>
		<td>Title</td>
		<td><?php echo form_input('title',set_value('title',$page->title));?>
     
	
	</tr>
	<tr>
		<td>Slug</td>
		<td><?php echo form_input('slug',set_value('slug',$page->slug));?>
     
	
	</tr>
	<tr>

		<td>Body</td>
		<td><?php echo form_textarea('body',set_value('body',$page->body));?></td>

	</tr>


	<tr>

		<td><?php echo form_submit('submit','Save', 'class="btn btn-primary"');?></td>


	</tr>


</table>

<?php echo form_close();?>

