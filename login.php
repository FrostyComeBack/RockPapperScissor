<?php
	session_start();
	if ((!isset($_POST['login'])) || (!isset($_POST['password'])))
	{
		header('Location: index.php');
		exit();
	}
	require('connect.php');
	$conn = @new mysqli($host, $db_user, $db_password, $db_name);
	if ($conn->connect_errno!=0)
	{
		echo "Error: ".$conn->connect_errno;
	}
	else {
		if(empty($_POST['login'] || $_POST['password'])){
			$_SESSION['error'] = "<span class='text-error'>Wprowadzasz puste dane!</span>";
			header('Location: index.php');
			exit();
		}
		$login = $_POST['login'];
		$password = $_POST['password'];
		echo($password);
        $password = SHA1($password);
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$password = htmlentities($password, ENT_QUOTES, "UTF-8");
		if ($result = @$conn->query(sprintf("SELECT * FROM users WHERE user='%s' AND pass='%s'",
		mysqli_real_escape_string($conn,$login),
		mysqli_real_escape_string($conn,$password))))
		{
			$how_users = $result->num_rows;
			if($how_users>0)
			{
				$_SESSION['zalogowany'] = true;
				$row = $result->fetch_assoc();
				$_SESSION['id'] = $row['id'];
				$_SESSION['user'] = $row['user'];
				$_SESSION['pass'] = $password;
				unset($_SESSION['error']);
				$result->free_result();
				header('Location: game.php');
			} else {
				$_SESSION['error'] = "<span class='text-error'>Błedny login lub hasło!</span>";
				header('Location: index.php');
			}
			$conn->close();
		}
	}
		
	
?>