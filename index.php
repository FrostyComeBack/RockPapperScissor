<?php
	session_start();
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: game.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papier - kamien - nozyce</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <main>
            <div class="panel">
            <?php
            if(isset($_SESSION['error1']))	echo $_SESSION['error1'];
            ?>
            <h1>Zarejestruj się!</h1>
                <form action="register.php" method="POST">
                    <label for="register">Nazwa użytkownika:</label>
                        <input type="text" id="register" name="register" minlength="3">
                    <label for="password">Hasło:  <?php if(isset($_SESSION['error2']))	echo $_SESSION['error2']; ?> </label>
                        <input type="password" id="password" name="password1" minlength="6"> <br>
                        <input type="submit" id="sumbit-index" value="Zarejestruj">
                </form>
            </div>
            <div class="panel">
            <?php
            if(isset($_SESSION['error']))	echo $_SESSION['error'];
            ?> 
            <h1>Zaloguj się!</h1>
            <form action="login.php" method="POST">
                <label for="login">Nazwa użytkownika:</label>
                    <input type="text" id="login" name="login" minlength="3">
                <label for="password">Hasło:</label>
                    <input type="password" id="password" name="password" minlength="6"> <br>
                    <input type="submit" id="sumbit-index" value="Zaloguj">
            </form>
            </div>
        </main>
    </div>
    <script src="app.js" charset="UTF-8"></script>
</body>
</html>