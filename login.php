<?php
session_start();
include 'config.php';
$connection = connection();
$message = [];
if (isset($_SESSION['login'])) {
	header('location: index.php');
}
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];


	if (empty($username) || empty($password)) {
		array_push($message, '<p style="color: red; font-size: 15px;">Username or password must not be empty');
	}else{
		$password = md5($password);
		$query = "select * from users where username ='$username' and password = '$password'";
            $status = $connection ->query($query) or die($connection ->error);
            if ($status->num_rows > 0) {
                $data = $status->fetch_assoc();
                //Session::init();
                $_SESSION['login'] =  true;
                $_SESSION['username'] =   $data['username'];
                $_SESSION['name'] =   $data['name'];
                header("Location: index.php");
            } else {
                
               array_push($message, '<p style="color: green; font-size: 15px;">Username or password not matched');
        }
	}

}
?>

<html>
<head>
	<title> Log-in</title>
	<link rel="stylesheet" href="web.css"  ></link>
	<h2 class="h" align="center">Welcome to Login</h2>
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

		<form action="login.php" method="POST" >
			<img src="http://cag.org.bd/newdesign/assets/img/profile/default.jpg" align="center">
			<br>
			<br>
			<b><label class="o"> User-Email</label></b><br>
			<input name="username" type="text" id="form" placeholder="Enter your Email" ><br>

			<b><label class="o">User-Password</label></b><br>
			<input  name="password" type="password" id="form"  placeholder="Enter your Password" ><br>

			<input name="login" name="login" type="submit" id="button" value="Log-in">

			<a href="register.php"><input name="Reg" type="button" id="button" value= "Go to registration" ></input>
			</a>

		
			<?php foreach ($message as $value) {?>
				
				<?php echo $value; ?>
			<?php } ?>

			
		</form>

	</div>
</body>
</html>