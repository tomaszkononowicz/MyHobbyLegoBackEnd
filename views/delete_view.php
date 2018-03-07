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

<form method="post">
    <div class="message">Czy usunąć zdjęcie: <?= $photo['title'] ?>?</div>
	<img src="images/miniature-<?= $photo['image'] ?>" alt=<?= $photo['title'] ?>/>

    <div>
        <a href="galery" class="button">Anuluj</a>
        <input class="button" type="submit" value="Potwierdź"/>
    </div>
</form>

	</div>
   



    <footer>
        Projekt i wykonianie: Tomasz Kononowicz
        <br>
        <small>© Copyright grudzień 2015 Proszę nie kopiować</small>
    </footer>

</body>



</html>