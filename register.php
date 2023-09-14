<?php
	session_start();
	if(!isset($_POST['register'], $_POST['password1'])){
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
		if(empty($_POST['register'] || $_POST['password1'])){
			$_SESSION['error1'] = "<span class='text-error'>Wprowadzasz puste dane!</span>";
			header('Location: index.php');
			exit();
		}
		$register = $_POST['register'];
		$sql = "SELECT `user` FROM `users` WHERE user='$register'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$_SESSION['error1'] = "<span class='text-error'>Ten login jest już zajęty!</span>";
			header('Location: index.php');
		} else{
			$password = $_POST['password1'];
			$date = date("Y-m-d");
			$register = htmlentities($register, ENT_QUOTES, "UTF-8");
			$password = htmlentities($password, ENT_QUOTES, "UTF-8");
			$password = SHA1($password);
			$conn ->query("INSERT INTO users (id, user, pass, creation_date) VALUES (NULL, '$register', '$password', '$date')");
			session_unset();
			header('Location: index.php');
		}
		$conn->close();
    }
?>