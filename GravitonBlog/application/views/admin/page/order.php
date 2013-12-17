<section>

	<h2>Order pages</h2>
	<p class="alert alert-info">Drag and click save</p>
	<div id="orderResult"></div>
	<input type="button" id="save" value="Save Changes"
		class="btn btn-primary" />
</section>

<script>
$(function(){

	$.post('<?php echo site_url('admin/page/order_ajax');?>',{},function(data){ 

   $('#orderResult').html(data);

		});

	$('#save').click(function(){
		
           oSortable = $('.sortable').nestedSortable('toArray');
           $('#orderResult').slideUp(function(){
           $.post('<?php echo site_url('admin/page/order_ajax');?>',{sortable: oSortable}, function(data){
        	   $('#orderResult').html(data);
        	   $('#orderResult').slideDown();
               });

           });
		});
});


</script>