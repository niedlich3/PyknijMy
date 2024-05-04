<?php


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