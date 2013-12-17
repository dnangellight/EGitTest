<?php $this->load->view('admin/components/page_head')?>
<body style="background: #555;">

<div class="modal-dialog">

 <div class="modal-content">
 <div class="model-header">
   <h3>Page</h3>
  </div>

<?php $this->load->view($subview);//subview is in controller?>
 <div class="model-footer">

   &copy;<?php echo $meta_title?>
   </div>
</div>
</div>
<?php $this->load->view('admin/components/page_tail')?>