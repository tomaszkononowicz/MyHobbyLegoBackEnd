	<?php
	if (!empty($_GET['register'])) {
		$error = $_GET['register'];
		switch ($error) {
			case 1: $message = "Uzytkownik został dodany"; break;
			case 2: $message = "Proszę uzupełnić wszystkie pola"; break;
			case 3: $message = "Podany użytkownik już istnieje"; break;
			case 4: $message = "Powtórzone hasło jest nieprawidłowe"; break;
			default: $message = "Błąd rejestracji"; break;
		}
	}
	?>

<!DOCTYPE html>
<html>
<head>

    <title>Lego - Moje hobby</title>
    <meta charset="utf-8" />
    <meta name="author" content="Tomasz Kononowicz" />
    <meta name="description" content="Strona o moim hobby" />
    <meta name="keywords" content="Lego, klocki" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="copyright" content="" />
    <link rel="stylesheet" href="static/styles/style.css" type="text/css" />

</head>
<body>

    <header>
        <img src="static/images/logo.png" alt="Lego" />
        <div id="opisStrony">Strona poświęcona mojemu hobby - klockom Lego</div>
    </header>

    <nav id="menu">
        <ul>
            <li id="nav1"><a href="home">Strona główna</a></li>
            <li id="nav2"><a href="moje_modele">Moje modele</a></li>
            <li id="nav3"><a href="serie">Serie</a></li>
            <li id="nav4"><a href="galery">Galeria</a>
                <ul>
                    <li id="nav41"><a href="search">Szukaj</a></li>
                    <li id="nav42"><a href="galery_selected">Zapamiętane</a></li>
                </ul>
            </li>
			<?php if ($user['is_logged']): ?>
				<li id="nav5" class="login"><a href="logout">Wyloguj, <?= $user['login'] ?></a></li>
			<?php else: ?>
				<li id="nav5" class="login"><a href="login">Zaloguj</a></li>
			<?php endif ?>
        </ul>
    </nav>


	<div id="container" class="new_photo">


<form method="post">
	<label>Login: 
		<input type="text" name="login" required>
	</label><br/>
    <label>
       Hasło:
        <input type="password" name="password" required>
    </label><br />
	    <label>
       Powtórz hasło:
        <input type="password" name="passwordRepeat" required>
    </label><br />
	    <label>
       Adres e-mail:
        <input type="email" name="email" required>
    </label><br />
    <div>
        <input class="button" type="submit" value="Zarejestruj mnie"/><br/>
		<a href="galery" class="button">Anuluj</a>
    </div>

</form>

<div class="message"><?php if(isset($message)) echo $message; ?></div>


	</div>
   



    <footer>
        Projekt i wykonianie: Tomasz Kononowicz
        <br>
        <small>© Copyright grudzień 2015 Proszę nie kopiować</small>
    </footer>

</body>



</html>