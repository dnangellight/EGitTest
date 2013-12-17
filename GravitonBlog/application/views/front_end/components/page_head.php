<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<!-- Place inside the <head> of your HTML -->

<title><?php echo config_item('site_name');?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">



<!------------------------------ jQuery (necessary for Bootstrap's JavaScript plugins)-------------------------------->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->



	<!-------------------------------- Bootstrap------------------------------>
<script
	src="<?php echo str_replace('index.php','',site_url()).'js/bootstrap.min.js';?>"></script>
<link
	href="<?php echo str_replace('index.php','',site_url()).'css/bootstrap.min.css';?>"
	rel="stylesheet">

<!-------------------------------- Font-awesome-iconpack -------------------------------->
<link rel="stylesheet"
	href="<?php echo str_replace('index.php','',site_url()).'vendor/font-awesome/css/font-awesome.min.css';?>">
	

	
<!-------------------------------- My packs-------------------------------->
<link rel="stylesheet"
	href="<?php echo str_replace('index.php','',site_url()).'mypacks/css/styles.css';?>">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>