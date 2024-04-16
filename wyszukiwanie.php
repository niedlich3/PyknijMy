<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Wyszukaj wydarzenie</title>
	<link rel="stylesheet" href="styl_pyknijmy.css">


</head>
<body>
	
<div class = "header"> 
  <nav>
   <img src="logo.png" class="logo">
    <ul class="nav-links">
		<li><a href="tworzenie.php">Stwórz wydarzenie</a></li>
		<li><a href="">Wyszukaj wydarzenia</a></li>
		<li class="btn">Stwórz konto</li>
	</ul>
  </nav>
  <?php
	 $host = 'localhost'; 
	 $username = 'root';
	 $password = ''; 
	 $database = 'pyknijmy'; 
	 
	 $conn = mysqli_connect($host, $username, $password, $database);
	 
	 if (!$conn) {
		 die("Błąd połączenia: " . mysqli_connect_error());
	 }

	$wynik = mysqli_query($conn, "SELECT * from wydarzenia");
	 function funkcja($result) {
		 while ($row = mysqli_fetch_assoc($result)){
			 echo '<div class="klasa">';
			 echo '<a href="ogloszenie.php?id=' . $row['id'] . '">';
			 echo '</a>';
			 echo '<div class="mmmm">' . 'Miasto: ', $row['miasto'], ' ';
			 echo '<div class="nnnn">' . 'Ulica: ', $row['ulica'], ' ';
			 echo '</div>';
			 echo '<a class="ogloszenie" href="ogloszenie.php?id=' . $row['id'] . '">';
			 echo 'Opis wydarzenia';
			 echo '</a>';
			 echo '<div class="wwww">' . 'Data wydarzenia: ', $row['data'], ' ';
			 echo '</div>';
			 echo '<div class="tttt">' . 'Godzina wydarzenia: ', $row['godzina'], ' ';
			 echo '</div>';
			 echo '<div class="rrrr">' . 'Wymagana ilość osób: ', $row['max_osoby'], ' ';
			 echo '</div>';
			 echo '<div class="eeee">' . '<b>Osoby zapisane: </b>', $row['osoby_zapisane'], ' ';
			 echo '</div>';
			 echo '</div>';
			 
			 echo '</div>';
		 }
	 }
	// echo '<table class="EventTable"><tr><th>Miasto</th><th>Ulica</th><th>Data</th><th>Godzina</th><th>Osoby zapisane</th><th>Max liczba osób</th></tr>';
	// while($row = mysqli_fetch_array($wynik)) {
	//	echo "<tr><td>{$row['miasto']}</td><td>{$row['ulica']}</td><td>{$row['data']}</td><td>{$row['godzina']}<td>{$row['osoby_zapisane']}<td>{$row['max_osoby']}</tr>";
	// }
	// echo '</table>';
 
	mysqli_close($conn);
	?>
	<div class="conteiner">
	<div class="kategoria">Piłka nożna </div>
		<?php funkcja($wynik); ?>
  </div>
</div>

 
<footer>
		<div class = "footerContainer">
		 <div class = "footerNav">
		  <ul>
		    <li><a href = "index.html">Home</a></li>	
			<li><a href= "https://linktr.ee/beatbuddy">About Us</a></li>
		
		  </ul>
		 </div>
		 
		</div>
		<div class = "footerBottom">
		  <p>Copyright &copy;2024; Designed by <span class = "designer">SCI</span></p>
		 </div>
		</footer>
</body>
</html>
