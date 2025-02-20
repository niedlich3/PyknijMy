
function znaki(event) {
  
    var inputField = event.target;   
    var maxLength = inputField.getAttribute('maxlength');
    var currentLength = inputField.value.length;
    var counterElement = document.getElementById(inputField.id + 'Count');
    var remainingCharacters = maxLength - currentLength;
    counterElement.innerHTML = 'Pozostało: ' + remainingCharacters + ' znaków';
}

document.getElementById('opis').addEventListener('keyup', znaki); 
//keyup to zdarzenie, które jest wywoływane, gdy użytkownik puści klawisz na klawiaturze po naciśnięciu.