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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($conn, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					
		if (password_verify($password, $user_data['password'])) {
			$_SESSION['user_id'] = $user_data['user_id'];
			$_SESSION['user_name'] = $user_data['user_name'];
			$_SESSION['is_admin'] = $user_data['is_admin']; 
					
				header("Location: ../index.php");
				die;
		
					
        } else {
            $_SESSION['login_error'] = "Nieprawidłowa nazwa użytkownika lub hasło.";
            header("Location: ../login/login.php");
            exit();
        }
		} else {
        $_SESSION['login_error'] = "Nieprawidłowa nazwa użytkownika lub hasło.";
        header("Location: ../login/login.php");
        exit();
		}
		
		
		     }
		}
	}
		
?>


<!DOCTYPE html>
<html>
<head>
<a href = "index.php"><img src="../grafika/logopyknijmy.png" class="logo"></a>
	<title>Logowanie</title>
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
			<div style="font-size: 20px;margin: 10px;color: black;">Logowanie</div>

			<input id="text" type="text" placeholder="Nazwa użytkownika" name="user_name"><br><br>
			<input id="text" type="password" placeholder="Hasło" name="password"><br><br>

			<input id="button" type="submit" value="Zaloguj się"><br><br>
			<a href="signup.php" style="color: black;">
        	Zarejestruj się
    		</a><br><br>
		</form>
	</div>
</body>
</html>
