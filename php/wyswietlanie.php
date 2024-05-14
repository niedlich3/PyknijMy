<?php
include("login/connection.php");
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
			 echo '<button class="zapisz" data-wydarzenie="' . $row['id'] . '"onclick="replaceButton(this)">';
			 echo 'Zapisz się';
			 echo '</button>';
			 echo '<div class="tttt">' . 'Godzina wydarzenia: ', $row['godzina'], ' ';
			 echo '</div>';
			 echo '<div class="rrrr">' . 'Wymagana ilość osób: ', $row['max_osoby'], ' ';
			 echo '</div>';
			 echo '<div  id="osoby-zapisane-' . $row['id'] . '" class="eeee">';
			 echo '<b>Osoby zapisane: </b>' . $row['osoby_zapisane'];
			 echo '</div>';
			 echo '</div>';
			 echo '</div>';
		 }
	 }
?>