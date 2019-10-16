<?php
session_start();
include 'config.php';
$connection = connection();
$message = [];

if (isset($_POST['register'])) {

	$name 		= $_POST['name'];
	$username 	= $_POST['username'];
	$password 	= $_POST['password'];


	if (empty($name)) {
		array_push($message, '<p style="color: red; font-size: 15px;">Name must not be empty</p>');

	}elseif (empty($username)) {
		array_push($message, '<p style="color: red; font-size: 15px;">Username must not be empty</p>');

	}elseif (empty($password)) {
		array_push($message, '<p style="color: red; font-size: 15px;">Password must not be empty</p>');

	}elseif (strlen($password) < 3) {
		array_push($message, '<p style="color: green; font-size: 15px;">Password must not be less then 3 characters</p>');
	}else{
		$password = md5($password);
		$query = "insert into users(name,username,password) values('$name','$username','$password') ";
		$status = $connection ->query($query) or die($connection ->error);
		if ($status) {

			$_SESSION['login'] =  true;
			$_SESSION['name'] =   $name;
			$_SESSION['username'] =   $username;
			header("Location: index.php");
		} else {

			array_push($message, '<p style="color: green; font-size: 15px;">Unexpected error occured. Please try again');
		}
	}

}
?>

<html>
<head>
	<title> Registration</title>
	<link rel="stylesheet" href="web.css"  ></link>
	<h2 class="h" align="center">Welcome to Registration</h2>
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

		<form action="register.php" method="POST" >
			<img src="http://cag.org.bd/newdesign/assets/img/profile/default.jpg" align="center">
			<br>
			<br>
			<b><label class="o"> Name</label></b><br>
			<input name="name" type="text" id="form" placeholder="Enter your name" ><br>

			<b><label class="o"> Username</label></b><br>
			<input name="username" type="text" id="form" placeholder="Enter your Username" ><br>


			<b><label class="o">Password</label></b><br>
			<input  name="password" type="password" id="form"  placeholder="Enter your Password" ><br>

			<input  name="register" type="submit" id="button" value="Register">

			<a href="login.php"><input name="Reg" type="button" id="button" value= "Go to login" ></input>
			</a>


			<?php foreach ($message as $value) {?>
				
				<?php echo $value; ?>
			<?php } ?>

			
		</form>

	</div>
</body>
</html>