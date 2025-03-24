<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#000000"/>
	<title>PyknijMy</title>
	<link rel="icon" type="image/png" href="grafika/ikonka_pyknijmy.png">
	<link rel="stylesheet" href="css/styl_pyknijmy3.css">
	<link rel="manifest" href="manifest.json">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
       <a href="index.php"><img src="grafika/logopyknijmy.png" alt="Logo" class="logo"></a>
        <nav class="nav-links">
            <a href="przegladaj.php">Przeglądaj</a>
            <a href="#">Dodaj</a>
            <a href="#">O nas</a>
        </nav>
        <a href="login.php"><img src="grafika/logicon.png" alt="Ikona użytkownika" class="icon"></a>
    </header>
    <section class="heroprz">
    <div class="container" id="scrollbar4">
        <div class="header">
            <i class="fas fa-bars"></i>
            <span>Przeglądaj wydarzenia</span>
            <i class="fas fa-search"></i>
        </div>
</br>
        <div class="filters">
            <span>Dodaj Filtry:</span>
            <i class="fas fa-plus"></i>
        </div>

        <div class="category" onclick="toggleSubcategories(event, 'sport')">
    <span>Sport</span>
    <input type="checkbox" id="sport-checkbox" value="Sport" onclick="event.stopPropagation(); toggleSubcategories(event, 'sport');">
</div>
        <div class="subcategory sport">
            <span>Piłka nożna</span>
            <input type="checkbox">
        </div>
        <div class="subcategory sport">
            <span>Koszykówka</span>
            <input type="checkbox">
        </div>
        <div class="subcategory sport">
            <span>Siatkówka</span>
            <input type="checkbox">
        </div>
        <div class="subcategory sport">
            <span>Boks</span>
            <input type="checkbox">
        </div>
        <div class="subcategory sport">
            <span>Golf</span>
            <input type="checkbox">
        </div>
        
        <div class="category" onclick="toggleSubcategories(event, 'nauka')">
    <span>Nauka</span>
    <input type="checkbox" id="nauka-checkbox" value="Nauka" onclick="event.stopPropagation(); toggleSubcategories(event, 'nauka');">
</div>

        <div class="subcategory nauka">
            <span>Matematyka</span>
            <input type="checkbox">
        </div>
        <div class="subcategory nauka">
            <span>J. polski</span>
            <input type="checkbox">
        </div>
        <div class="subcategory nauka">
            <span>J. angielski</span>
            <input type="checkbox">
        </div>
        <div class="subcategory nauka">
            <span>Informatyka</span>
            <input type="checkbox">
        </div>
        <div class="subcategory nauka">
            <span>Geografia</span>
            <input type="checkbox">
        </div>
        <div class="subcategory nauka">
            <span>Inne</span>
            <input type="checkbox">
        </div>
        
        <div class="category" onclick="toggleSubcategories(event, 'rozrywka')">
    <span>Rozrywka</span>
    <input type="checkbox" id="rozrywka-checkbox" onclick="event.stopPropagation(); toggleSubcategories(event, 'rozrywka');">
</div>
        <div class="subcategory rozrywka">
            <span>Imprezy</span>
            <input type="checkbox">
        </div>
        <div class="subcategory rozrywka">
            <span>Koncerty</span>
            <input type="checkbox">
        </div>
        <div class="subcategory rozrywka">
            <span>Spotkania towarzyskie</span>
            <input type="checkbox">
        </div>
        <div class="subcategory rozrywka">
            <span>Piwko</span>
            <input type="checkbox">
        </div>
        <div class="subcategory rozrywka">
            <span>Domówka</span>
            <input type="checkbox">
        </div>
        <div class="subcategory rozrywka">
            <span>Inne</span>
            <input type="checkbox">
        </div>
    </div>
    <div>
        <h2>Wydarzenia</h2>
        <ul id="lista"></ul>
    </div>
    <div>
    </div>
    <div >  
    </div>
 
    <script>
    function toggleSubcategories(event, category) {
        let checkbox = document.getElementById(category + '-checkbox');
        let subcategories = document.querySelectorAll('.' + category);

        // Odwracamy stan checkboxa TYLKO gdy kliknięto w div, nie w sam checkbox
        if (event.target !== checkbox) {
            checkbox.checked = !checkbox.checked;
        }

        // Przełączanie widoczności podkategorii
        subcategories.forEach(sub => {
            sub.style.display = checkbox.checked ? 'flex' : 'none';
        });
    }
</script>
    </section>
</body>
<script src="wyswietlanie.js"></script>
</html>
