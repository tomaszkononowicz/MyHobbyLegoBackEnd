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
            <li id="nav2"><a href="moje_modele" class="selected">Moje modele</a></li>
            <li id="nav3"><a href="serie">Serie</a></li>
            <li id="nav4"><a href="galery">Galeria</a>
                <ul>
                    <li id="nav41"><a href="search">Szukaj</a></li>
                    <li id="nav42"><a href="/galery_selected">Zapamiętane</a></li>
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

        <h3>Złożonych modeli: <strong>3</strong></h3>
        <h3>Ulubiona seria: <strong>Creator</strong></h3>
        <p>Moją ulubioną serią jest seria Lego Technic, lecz najwięcej modeli (2) złożyłem z serii Lego Creator. Są to zestawy o numerach 65468 i 98498</p>

        <h3>Moje modele</h3>
        <section class="model">
            <h4>Koparka ładowarka</h4>
            <p class="daneTechniczne">Model z serii Lego Technic o numerze 42004 zawierający 246 części przeznaczony dla osób w wieku od 8 do 14 lat.</p>
            <img src="static/images/model1.png" alt="Koparka ładowarka" />
            <p>Ten model ma mnóstwo realistycznych szczegółów, takich jak podnoszenie, opuszczanie i opróżnianie przedniego oraz tylnego lemiesza.</p>
        </section>
        <section class="model">
            <h4>Transporter samochodów</h4>
            <p class="daneTechniczne">Model z serii Lego Creator o numerze 7347 zawierający 805 części przeznaczony dla osób w wieku od 9 do 12 lat.</p>
            <img src="static/images/model2.png" alt="Transporter samochodów" />
            <p>Zestaw umożliwia zbudowanie trzech pojazdów: lawety, ciężarówki z dźwigiem lub stylowego kabrioletu. Dołączone dwa świecące na żółto klocki.</p>
        </section>
        <section class="model">
            <h4>Śmigłowiec</h4>
            <p class="daneTechniczne">Model z serii Lego Creator o numerze 31020 zawierający 216 części przeznaczony dla osób w wieku od 7 do 12 lat.</p>
            <img src="static/images/model3.png" alt="Śmigłowiec" />
            <p>Rozkręć śmigła i wystartuj jak helikopter. Obróć silniki i ruszaj naprzód jako samolot, utrzymując równowagę dzięki tylnym stabilizatorom</p>
        </section>

    </div>



    <footer>
        Projekt i wykonianie: Tomasz Kononowicz
        <br>
        <small>© Copyright listopad 2015 Proszę nie kopiować</small>
    </footer>

</body>



</html>