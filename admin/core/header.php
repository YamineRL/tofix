<?php
	include ('../connect.php');
	session_start();
	if (!isset($_SESSION['admin']))
	{
		header("Location:./index.php");
	}
?>

<html>
<head>
	<title>The Cave - Admin</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/trydotcss.css" />
</head>
<body>
<div class="clearfix"></div>
<?php include('core/menu.php');?>
</body>
