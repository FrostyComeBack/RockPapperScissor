<?php
	session_start();
	if(!isset($_POST['pass-new'], $_POST['pass-old'], $_POST['pass-new-repeat'])){
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
        if(empty($_POST['pass-old'] && $_POST['pass-new'] && $_POST['pass-new-repeat'])){
			$_SESSION['error3'] = "<span class='text-error'>Wprowadzasz bledne dane!</span>";
			header('Location: index.php');
			exit();
		}
        $id = $_SESSION['id'];
        $pass_login = $_SESSION['pass'];
        $pass_old = $_POST['pass-old'];
        $pass_new = $_POST['pass-new'];
        $pass_new_repeat = $_POST['pass-new-repeat'];
        $pass_old = SHA1($pass_old);
        $pass_new = SHA1($pass_new);
        $pass_new_repeat = SHA1($pass_new_repeat);
		if($pass_new_repeat !== $pass_new){
			$_SESSION['error3'] = "<span class='text-error'>Wprowadzasz bledne dane!</span>";
            header('Location: game.php');
		    exit();
		}
        if($pass_login !== $pass_old && $pass_new !== $pass_new_repeat){
            $_SESSION['error3'] = "<span class='text-error'>Wprowadzasz bledne dane!</span>";
            header('Location: game.php');
		    exit();
        }else{
			session_unset();
			$_SESSION['pass'] = $pass_new;
            $sql = "UPDATE `users` SET `pass` = '$pass_new' WHERE `users`.`id` = $id";
		    $result = $conn->query($sql);
            header('Location: game.php');
        }
		$conn->close();
    }
?>