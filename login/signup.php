<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($conn, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
<a href = "index.php"><img src="logopyknijmy.png" class="logo"></a>
	<title>Rejestracja</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

	background-color: #000;
    color: #fff600;
    border: 2px solid #000;
    border-radius: 20px;
    padding: 10px 20px;
    cursor: pointer;
    margin-top: 10px;
	}

	#box{
		background-color: #fff600;
		margin: auto;
		width: 300px;
		padding: 20px;
        border-radius: 10%;
	}

	body{
	background-color: #191919;

	}
	.logo{
		width: 200px;
		margin-left: 42vw;
	}
	input[name="user_name"], input[name="password"]{
	background-color: #191919;
	border: 1px solid #000;
	color:#fff;
	}
	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: black;">Rejestracja</div>

			<input id="text" type="text" placeholder="Nazwa użytkownika" name="user_name"><br><br>
			<input id="text" type="password" placeholder="Hasło" name="password"><br><br>

			<input id="button" type="submit" value="Zarejestruj się"><br><br>

			<a href="login.php" style="color: black;">
        	Zaloguj się
    		</a><br><br>
		</form>
	</div>
</body>
</html>
