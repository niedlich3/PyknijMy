<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Opis wydarzenia</title>
	<link rel="stylesheet" href="styl_pyknijmy.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
	
<div class = "header"> 
  <nav>
   <a href = "index.php"><img src="logopyknijmy.png" class="logo"></a>
    <ul class="nav-links">
		<li><a href="tworzenie.php">Stwórz wydarzenie</a></li>
		<li><a href="">Wyszukaj wydarzenia</a></li>
		<li class="btn">Stwórz konto</li>
		<a href="logout.php">Logout</a>
	</ul>
  </nav>
  <script>
        $(document).ready(function(){
            $('.zapisz').click(function(){
                var idWydarzenia = $(this).data('wydarzenie'); 
                $.ajax({
                    url: 'zapisz.php',
                    type: 'POST',
                    data: { idWydarzenia: idWydarzenia }, 
                    success: function(response){
                       
                        location.reload(); 
                    }
                });
            });
        });
    </script>
<?php
	 $host = 'localhost'; 
	 $username = 'root';
	 $password = ''; 
	 $database = 'pyknijmy'; 
	 
	 $conn = mysqli_connect($host, $username, $password, $database);
	 
	 if (!$conn) {
		 die("Błąd połączenia: " . mysqli_connect_error());
	 }
	 $id = $_GET['id'];
	 $sql = "SELECT * FROM wydarzenia WHERE id = $id";
	 $result = mysqli_query($conn, $sql);
	 
	 
	 if(mysqli_num_rows($result) > 0) {
		 $row = mysqli_fetch_assoc($result);
		 echo '<div class="ogloszenie_miasto">' . 'Miasto: ', $row['miasto'], ' ';
		 echo '<div class="ogloszenie_ulica">' . 'Ulica: ', $row['ulica'], ' ';
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
		 echo '<div class="ogloszenie_opis">' . 'Opis wydarzenia: ', $row['opis'], '';
		 echo '</div>';
		 echo '<div class="ogloszenie_kategoria">' . 'Kategoria sportowa: ', $row['kategoria'], ' ';
		 echo '</div>';
		 echo '</div>';
	
	 }else{
		 echo 'Brak danych.';
	 }
	 ?>
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
</body>
</html>