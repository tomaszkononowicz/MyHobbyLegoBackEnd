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


	<div id="container">

	<section class="galery_menu">
		<a href="new_photo" class="button">Dodaj nowe zdjęcie</a>
	</section>
    <?php if ($galery->count()): ?>
		<form method="post">
		<section class="galery_menu">
			<input class="button" type="submit" value="Zapamiętaj wybór"/>
		</section>
        <?php foreach ($galery as $photo): ?>
			<?php if (($user['is_logged'] && isset($photo['sender']) && $photo['sender']==$user['login']) || ($photo['private']=="false")): ?>
			<section class="photo">
				<a href="images/watermark-<?= $photo['image'] ?>"><img src="images/miniature-<?= $photo['image'] ?>" alt=<?= $photo['title'] ?>/></a>
				<div class="data">
					<div class="title">Tytuł: <?= $photo['title'] ?></div>
					<div class="author">Autor: <?= $photo['author'] ?></div>
					<div class="private"><?php if ($photo['private']=="true") echo "Prywatne"; else echo "Publiczne"; ?></div>
					<?php if ($user['is_logged'] && isset($photo['sender']) && $photo['sender']==$user['login']) : ?>
						<div class="edit"><a href="edit?id=<?= $photo['_id'] ?>">Edycja</a></div>
						<div class="delete"><a href="delete?id=<?= $photo['_id'] ?>">Usuń</a></div>
					<?php endif ?>
					<div class="select">Zapamiętaj: <input type="checkbox" name="select[]" value="<?= $photo['_id'] ?>" <?php if ( in_array($photo['_id'], $user['selected'])) echo "checked"; ?>/></div>
				</div>
			</section>
			<?php endif ?>
        <?php endforeach ?>
    <?php else: ?>
        <div class="empty">Brak zdjęć</div>
    <?php endif ?>
	<?php if ($galery->count()): ?>
		</form>
	<?php endif ?>

	</div>
   



    <footer>
        Projekt i wykonianie: Tomasz Kononowicz
        <br>
        <small>© Copyright grudzień 2015 Proszę nie kopiować</small>
    </footer>

</body>



</html>