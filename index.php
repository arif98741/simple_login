<?php
session_start();
include 'config.php';
$connection = connection();
if (!isset($_SESSION['login'])) {
	header('location: login.php');
}
$message = [];

?>


<html>
<head>
	<title> Log-in</title>
	<link rel="stylesheet" href="web.css"  ></link>
	<h2 class="h" align="center">Welcome to Log-in </h2>
	<style>
		#d{
			width: 50%;
			margin: 0 auto;
		}
		form{
			border: 1px solid #000;
			padding: 10px;
			width:400px;
			margin: 0 auto;
			border-radius: 5px;
			background: #bde4cbde;
		}
		input[type="email"],input[type="password"]{
			padding: 4px;
			margin-top: 3px;
		}

		input[type="submit"]{
			padding: 2px;
			margin-top: 3px;
			color: #1fb12a;
			background: #ddd;
			width: 100px;
			height: 30px;

			cursor: pointer;
		}

		form img{
			width: 100px; height: 100px;
			border-radius: 100%;
			text-align: center;
			margin-left: 150px;
		}

		input[type="button"]{
			padding: 2px;
			margin-top: 3px;
			color: #1fb12a;
			background: #ddd;
			width: 120px;
			height: 30px;
		}
	</style>
</head>

<body id="b">
	<div id="d">

		<form action="#" method="POST" >
			<h2>Welcome <?php echo $_SESSION['username']; ?></h2>
			<a href="logout.php">logout</a>
			
		</form>

	</div>
</body>
</html>