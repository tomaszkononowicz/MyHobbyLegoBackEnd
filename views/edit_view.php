﻿	<?php
	if (!empty($_GET['ed'])) {
		$error = $_GET['ed'];
		switch ($error) {
			case 1: $message = "Plik został zedytowany"; break;
			default: $message = "Błąd edycji pliku"; break;
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
            <li id="nav4"><a href="galery" class="selected">Galeria</a>
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

<form method="post" enctype="multipart/form-data">
	<label>Edytujesz plik: 
		<?= $photo['title'] ?><br/>
	</label><br/>
    <label>
       Tytul:
        <input type="text" name="title" value="<?= $photo['title'] ?>"required>
    </label><br />
    <label>
        Autor:
        <input type="text" name="author" value="<?= $photo['author'] ?>" required>
    </label><br />
    <label>
        Prywatność
		<input type="radio" name="private" value="true" <?php if($photo['private']=="true") echo "checked"; ?>> Prywatne
        <input type="radio" name="private" value="false" <?php if($photo['private']=="false") echo "checked"; ?>> Publiczne
	</label>
    <div>
        <input  class="button" type="submit" value="Zapisz zmiany"/>
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