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
            <li id="nav3"><a href="serie" class="selected">Serie</a></li>
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

        <section class="seria">
            <h3>City</h3>
            <p>Seria wcześniej nosiła nazwy Legoland i Lego World. Obejmuje zestawy klocków, z których można budować pojazdy i scenki z życia mieszkańców.</p>
            <img src="static/images/city.png" alt="City"/>
        </section>
        <section class="seria">
            <h3>Kingdom</h3>
            <p>Zestawy opowiadające o walce dwóch średniowiecznych królestw.</p>
            <img src="static/images/kingdom.png" alt="Kingdom" />
        </section>
        <section class="seria">
            <h3>Creator</h3>
            <p>Seria charakteryzuje się tzw. 3 w 1. Dzięki temu z jednego modelu można zrobić kilka innych alternatywnych.</p>
            <img src="static/images/creator.png" alt="Creator" />
        </section>
        <section class="seria">
            <h3>Star Wars</h3>
            <p>Ta seria Lego przedstawia świat Gwiezdnych Wojen w połączeniu z klockami. Na początku powstawały zestawy nawiązujące do epizodów 4, 5 i 6.</p>
            <img src="static/images/starWars.png" alt="Star Wars" />
        </section>
        <section class="seria">
            <h3>Power miners</h3>
            <p>Seria opowiadająca o przygodach górników, których zaatakowały skalne potwory.</p>
            <img src="static/images/powerMiners.png" alt="Power miners" />
        </section>
        <section class="seria">
            <h3>Technic</h3>
            <p>Seria pozwalająca budować realistycznie działające konstrukcje i modele. Głównymi elementami są zębatki i elementy z nimi współpracujące.</p>
            <img src="static/images/technic.png" alt="Technic" />
        </section>
        <section class="seria">
            <h3>Pirates of the Caribbean</h3>
            <p>Seria przedstawiająca świat serii filmów pt.: Piraci z Karaibów.</p>
            <img src="static/images/piratesOfCaribbean.png" alt="Pirates of Caribbean" />
        </section>
        <section class="seria">
            <h3>Power Fuctions</h3>
            <p>Seria Power Functions to elektryczne i elektroniczne części Lego np. silnik, zdalne sterowanie i światła LED.</p>
            <img src="static/images/powerFunctions.png" alt="Power Functions" />
        </section>
        <section class="seria">
            <h3>Mindstorms</h3>
            <p>Seria pozwalająca na budowanie i programowanie własnoręcznie wymyślonych robotów.</p>
            <img src="static/images/mindstorms.png" alt="Mindstorms" />
        </section>
        <section class="seria">
            <h3>Duplo</h3>
            <p>Seria ta przeznaczona dla najmłodszych już od pierwszego roku życia. Są barwne i zachęcają dzieci do zabawy. Uczą myślenia.</p>
            <img src="static/images/duplo.png" alt="Duplo" />
        </section>
        <section class="seria">
            <h3>Large i Lego Architecture</h3>
            <p>Seria ta jest dla zaawansowanych budowniczych, którzy mogą odtworzyć sobie model np. Tadź Mahal czy Space Needle.</p>
            <img src="static/images/architecture.png" alt="Large i Architecture" />
        </section>
        <section class="seria">
            <h3>Harry Potter</h3>
            <p>Klocki na podstawie czarodzieja – Harry’ego Pottera.</p>
            <img src="static/images/harryPotter.png" alt="Harry Potter" />
        </section>
        <section class="seria">
            <h3>Minifigures</h3>
            <p>Seria w której dostępne są pojedyncze ludziki Lego, obecnie wydanych jest 13 serii. Figurki to m.in.: Marynarz, Tenisistka, Faraon, Zombie.</p>
            <img src="static/images/minifigures.png" alt="Minifigures" />
        </section>
        <section class="seria">
            <h3>Friends</h3>
            <p>Seria dla dziewczynek. W ramach zestawu dziewczynki mogą zbudować między innymi kawiarnię, weterynarza, domek na drzewie, salon piękności.</p>
            <img src="static/images/friends.png" alt="Friends" />
        </section>
        <section class="seria">
            <h3>Władca Pierścieni</h3>
            <p>Seria o przygodach hobbita Frodo Bagginsa i Drużyny Pierścienia.</p>
            <img src="static/images/wladcaPierscieni.png" alt="Władca Pierścieni" />
        </section>
        <section class="seria">
            <h3>Minecraft</h3>
            <p>Seria oparta na znanej grze Minecraft.</p>
            <img src="static/images/minecraft.png" alt="Minecraft" />
        </section>

    </div>



    <footer>
        Projekt i wykonianie: Tomasz Kononowicz
        <br>
        <small>© Copyright listopad 2015 Proszę nie kopiować</small>
    </footer>

</body>



</html>