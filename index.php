<?php
  
  session_start();

  include("connection.php");
  include("functions.php");
  $user_data = check_login($conn);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PyknijMy</title>
	<link rel="stylesheet" href="styl_pyknijmy.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div class = "header"> 
 <nav>
   <a href = "index.php"><img src="logopyknijmy.png" class="logo" style="margin-left: 10%;"></a>
   

   
    <ul class="nav-links">
		<li><a href="profil.php?id=<?php echo $user_data['id']?>" class="text" style="color: white;">Hello, <?php echo $user_data['user_name']; ?></a></li>
		<li><a href="tworzenie.php">Stwórz wydarzenie</a></li>
		<li><a href="wyszukiwanie.php">Wyszukaj wydarzenia</a></li>
		<li class="btn" style="color: black;">
			<a href="logout.php" style="color: black;">Logout</a>
		</li>

	</ul>
  </nav>
 

  <?php
  
	 
	 if (!$conn) {
		 die("Błąd połączenia: " . mysqli_connect_error());
	 }
	 
	  $del_time = "DELETE FROM wydarzenia WHERE data < CURRENT_DATE()";
	 
	 if(mysqli_query($conn, $del_time)){
        echo "";
    }

	$wynik = mysqli_query($conn, "SELECT * from wydarzenia ORDER BY data, godzina");
	
	$noga = "SELECT * FROM wydarzenia WHERE kategoria = 'Piłka nożna' ORDER BY data, godzina";
	 $wynik_noga = mysqli_query($conn, $noga);
	 
	 $siatka = "SELECT * FROM wydarzenia WHERE kategoria = 'Siatkówka' ORDER BY data, godzina";
	 $wynik_siatka = mysqli_query($conn, $siatka);
	 
	 $kosz = "SELECT * FROM wydarzenia WHERE kategoria = 'Koszykówka' ORDER BY data, godzina";
	 $wynik_kosz = mysqli_query($conn, $kosz);
	 
	 $inne = "SELECT * FROM wydarzenia WHERE kategoria = 'Inne' ORDER BY data, godzina";
	 $wynik_inne = mysqli_query($conn, $inne);
	 
	 
	 function funkcja($result) {
		 while ($row = mysqli_fetch_assoc($result)) {
			 echo '<div class="klasa">';
			 echo '<a href="ogloszenie.php?id=' . $row['id'] . '">';
			 echo '</a>';
			 echo '<div class="mmmm">' . 'Miasto: ', $row['miasto'], ' ';
			 echo '<div class="nnnn">' . 'Ulica: ', $row['ulica'], ' ';
			 echo '</div>';
			 echo '<a class="ogloszenie" href="ogloszenie.php?id=' . $row['id'] . '">';
			 echo 'Opis wydarzenia';
			 echo '</a>';
			 echo '<div class ="hhhh">' . '<b>Kategoria sportowa wydarzenia: </b>' . $row['kategoria'];
			 echo '</div>';
			 echo '<div class="wwww">' . 'Data wydarzenia: ', $row['data'], ' ';
			 echo '</div>';
			 echo '<button class="zapisz" data-wydarzenie="' . $row['id'] . '">';
			 echo 'Zapisz się';
			 echo '</button>';
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
	<div class="kategoria"><b>Aktywne wydarzenia </b></div>
		<?php funkcja($wynik); ?>
		
  </div>
  
</div>

<footer>
		<div class = "footerContainer">
		 <div class = "footerNav">
		  <ul>
		    <li><a href = "index.php">Home</a></li>	
			<li><a href= "https://linktr.ee/beatbuddy">About Us</a></li>
		
		  </ul>
		 </div>
		 
		</div>
		<div class = "footerBottom">
		  <p>Copyright &copy;2024; Designed by <span class = "designer">SCI</span></p>
		 </div>
		</footer>
		<script src="script.js"></script>
</body>
</html>
