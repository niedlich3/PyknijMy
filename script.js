 $(document).ready(function(){ //zapisanie
            $('.zapisz').click(function(){
                var idWydarzenia = $(this).data('wydarzenie'); 
                $.ajax({
                    url: 'php/zapisz.php',
                    type: 'POST',
                    data: { idWydarzenia: idWydarzenia }, 
                    success: function(response){
                       
                        location.reload(); 
                    }
                });
            });
        });
		
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
	
	 // Funkcja, która usuwa przycisk i tworzy nowy po kliknięciu
   function replaceButton(clickedButton) {
    var oldButton = clickedButton;
    var newButton = document.createElement("button");
	 newButton.className = "wydarzenie"; // Dodanie klasy do nowego przycisku
    newButton.innerHTML = "Nowy przycisk";
    newButton.onclick = function() {
        replaceButton(newButton);
    };
    oldButton.parentNode.replaceChild(newButton, oldButton);
}