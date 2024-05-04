function replaceButton(button) {
    var idWydarzenia = $(button).data('wydarzenie');
    $.ajax({
        url: 'php/zapisz.php',
        type: 'POST',
        data: { idWydarzenia: idWydarzenia },
        success: function(response){
            console.log('Otrzymano odpowiedź z serwera:', response);
            if (response === "max") {
                // Wydarzenie osiągnęło maksymalną liczbę osób
                console.log("Wydarzenie osiągnęło maksymalną liczbę osób");
            } else {
                // Zaktualizuj liczbę osób zapisanych na stronie
                var osobyZapisane = parseInt(response);
                console.log('Liczba osób zapisanych:', osobyZapisane);
                $('#osoby-zapisane-' + idWydarzenia).html('<b>Osoby zapisane:</b> ' + osobyZapisane);

                
                // Zmiana tekstu przycisku na "Zapisano się"
                $(button).text('Zapisano się');
                $(button).prop('disabled', true); // Wyłączenie możliwości ponownego kliknięcia
            }
        },
        error: function(xhr, status, error) {
            // Obsługa błędu
            console.error('Błąd AJAX:', xhr.responseText);
        }
    });
}










		
		$(document).ready(function() { //kategorie
 	 		 $('#kategorie').val('');
		});


		$(document).ready(function(){
        $('#kategorie').change(function(){
            var selectedCategory = $(this).val();
            $.ajax({
                url: 'php/kategorie.php',
                type: 'POST',
                data: { category: selectedCategory },
                success: function(response){
                    $('.wydarzenia').hide(); // Ukryj wszystkie wydarzenia
                    $('.' + selectedCategory).show(); // Pokaż wydarzenia z wybranej kategorii
                }
            });
        });
    });
	
