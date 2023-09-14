<?php
	session_start();
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
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
    <div class="container_game">
        <article>
            <div class="right-panel">
            <?php
                echo "<h1>Witaj ".$_SESSION['user'].'!<br> [<a href="logout.php">Wyloguj się!</a>]</h1><hr>';
            ?>
                <div id="change-pass">
                    <?php
                        if(isset($_SESSION['error3']))	echo $_SESSION['error3'];
                    ?> 
                    <span id="text-in-change-pass">Zmień hasło</span>
                    <form action="change_password.php" method="POST">
                        <label for="pass-old">Stare hasło:</label>
                            <input type="password" id="pass-old" name="pass-old" minlength="6">
                        <label for="pass-new">Nowe hasło:</label>
                            <input type="password" id="pass-new" name="pass-new" minlength="6"> <br>
                        <label for="pass-new-repeat">Powtorz nowe hasło:</label>
                            <input type="password" id="pass-new-repeat" name="pass-new-repeat" minlength="6"> <br> <br>
                        <input type="submit" id="sumbit-game" value="Zmień hasło">
                    </form>
                </div>
            </div>
        </article>
        <header>
            <div id="header">
                <h1>Prosta gra - papier kamień nożyce</h1>
                <h2 id="user">Twój wybor: <span id="user-choice"></span></h2>
                <h2 id="computer">Wybór komputera: <span id="computer-choice"></span></h2>
                <h2 id="resultx">Wynik: <span id="result"></span></h2>
            </div>
        </header>
        <main>
            <div id="main">
                <button id="papier"></button> <!-- id=papper -->
                <button id="kamien"></button> <!-- id=rock -->
                <button id="nozyce"></button> <!-- id=scissors -->
            </div>
        </main>
        <footer>
            <div class="footer">
                Created by: Sebastian
            </div>
        </footer>
    </div>
    <script src="app.js" charset="UTF-8"></script>
</body>
</html>
