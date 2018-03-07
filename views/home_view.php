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
            <li id="nav1"><a href="home" class="selected">Strona główna</a></li>
            <li id="nav2"><a href="moje_modele">Moje modele</a></li>
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

        <section>
            <h3>Informacje ogólne</h3>
            <p>Lego – przedsiębiorstwo zabawkarskie, na początku zajmowało się produkcją drewnianych zabawek. Dziś firma znana z produkcji klocków.</p>
        </section>

        <section>
            <h3>Historia</h3>
            <p>Nazwę Lego przedsiębiorstwo przyjęło w 1934 r. Jest to skrót od duńskiego „Leg godt” (baw się dobrze), a po łacinie „Lego” znaczy „składam”.</p>
            <p>W 1947 przedsiębiorstwo Lego zaczęło produkować zabawki z tworzywa sztucznego. Wielki światowy sukces przyniosły przedsiębiorstwu klocki – cegiełki składane razem za pomocą systemu wypustek i odpowiadających im gniazd, pozwalające na uzyskiwanie wielu możliwych kombinacji połączeń. Pierwszy rodzaj klocków wyprodukowany został w 1949 roku, w ciągu następnych lat przedsiębiorstwo stopniowo poszerzało asortyment. Sposób łączenia klocków został opatentowany 28 stycznia 1958. Począwszy od lat 60. XX w., zestawy klocków Lego umożliwiają budowę miast z modelami między innymi: domów, samochodów, zawierały także figurki mieszkańców. W 1975 roku w zestawach pojawiły się pierwsze proste minifigurki (ludziki Lego), a obecną formę minifigurek z ruchomymi częściami ciała przybrały od 1978 roku. Asortyment produkowanych zabawek wciąż się powiększa, obejmując produkty przeznaczone dla różnych grup wiekowych.</p>
        </section>

        <section>
            <h3>Kalendarium</h3>
            <ul id="kalendarium">
                <li><strong>1958:</strong> Po śmierci założyciela, dyrektorem przedsiębiorstwa został jego syn, Godtfred Kirk Christiansen.</li>
                <li><strong>1968:</strong> Powstał pierwszy park rozrywki przedsiębiorstwa Legoland w Billund, a później następne (obecnie Lego to największy europejski i jeden z największych i najbardziej znanych producentów zabawek na świecie).</li>
                <li><strong>1978:</strong> Pojawiły się charakterystyczne ruchome minifigurki – ludziki Lego.</li>
                <li><strong>1986:</strong> Godfred Kirk Christiansen zrezygnował z funkcji prezesa zarządu, stanowisko to przejął Kjeld Kirk Kristiansen – wnuk założyciela przedsiębiorstwa.</li>
                <li><strong>2008:</strong> Europejski Sąd Pierwszej Instancji odebrał przedsiębiorstwu Lego wyłączność na kształt ich klocków.</li>
                <li><strong>2009:</strong> Pomimo światowego kryzysu gospodarczego przedsiębiorstwo odnotowało 22% wzrost sprzedaży oraz 63% wzrost zysków.</li>
            </ul>
        </section>


    </div>



    <footer>
        Projekt i wykonianie: Tomasz Kononowicz
        <br>
        <small>© Copyright grudzień 2015 Proszę nie kopiować</small>
    </footer>

</body>



</html>