
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


// Wysyłanie formularza do serwera do DB na mongo

document.querySelector("form").addEventListener("submit", async function(event) {
    event.preventDefault();

    const formData = new FormData(this);
    const data = Object.fromEntries(formData.entries());

    const response = await fetch('http://localhost:3000/dodajWydarzenie', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    });

    const result = await response.json();
    alert(result.message || "Błąd podczas zapisu!");
});
