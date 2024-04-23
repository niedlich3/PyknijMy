 $(document).ready(function(){ //zapisanie
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
		
		$(document).ready(function() { //kategorie
 	 		 $('#kategorie').val('');
		});


		$(document).ready(function(){
        $('#kategorie').change(function(){
            var selectedCategory = $(this).val();
            $.ajax({
                url: 'kategorie.php',
                type: 'POST',
                data: { category: selectedCategory },
                success: function(response){
                    $('.wydarzenia').hide(); // Ukryj wszystkie wydarzenia
                    $('.' + selectedCategory).show(); // Pokaż wydarzenia z wybranej kategorii
                }
            });
        });
    });