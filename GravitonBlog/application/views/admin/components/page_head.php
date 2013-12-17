<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<!-- Place inside the <head> of your HTML -->

<title><?php echo $meta_title;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<!------------------------------ WebTextEditor (TinyMce)-------------------------------->
<script type="text/javascript"
	src="<?php echo str_replace('index.php','',site_url()).'vendor/tinymce/tinymce.min.js';?>"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
  
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 
</script>
<!------------------------------ jQuery (necessary for Bootstrap's JavaScript plugins)-------------------------------->
	

<script src="http://code.jquery.com/jquery-latest.js"></script>



<!------------------------------ Sortable plugin-------------------------------->	
	<?php if (isset($sortable)&&$sortable==TRUE):?> 
		<script
	src="<?php echo str_replace('index.php','',site_url()).'js/jquery-ui-1.10.3.custom.min.js';?>"></script>
<script
	src="<?php echo str_replace('index.php','',site_url()).'vendor/nestedSortable/jquery.mjs.nestedSortable.js';?>"></script>
	<?php endif;?>

	<!-------------------------------- Bootstrap------------------------------>
<script
	src="<?php echo str_replace('index.php','',site_url()).'js/bootstrap.min.js';?>"></script>
<link
	href="<?php echo str_replace('index.php','',site_url()).'css/bootstrap.min.css';?>"
	rel="stylesheet">

<!-------------------------------- Font-awesome-iconpack -------------------------------->
<link rel="stylesheet"
	href="<?php echo str_replace('index.php','',site_url()).'vendor/font-awesome/css/font-awesome.min.css';?>">
	
<!--------------------------------Datapicker_bootstrap -------------------------------->
<link rel="stylesheet"
	href="<?php echo str_replace('index.php','',site_url()).'vendor/bootstrap_datepicker/datepicker.css';?>">
		<script
	src="<?php echo str_replace('index.php','',site_url()).'vendor/bootstrap_datepicker/bootstrap-datepicker.js';?>"></script>
	
<!-------------------------------- My packs-------------------------------->
<link rel="stylesheet"
	href="<?php echo str_replace('index.php','',site_url()).'mypacks/css/admin_pages_order.css';?>">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>