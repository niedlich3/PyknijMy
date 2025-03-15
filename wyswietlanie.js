async function pobierzWydarzeniaSportowe() {
    try {
        const response = await fetch('http://localhost:3000/wydarzeniaSportowe');
        if (!response.ok) throw new Error('Błąd pobierania danych sportowych');
        const dane = await response.json();
        
        // Pobierz element listy w HTML
        const listaSportowa = document.getElementById('listaSportowa');
        listaSportowa.innerHTML = ''; // Wyczyszczenie starej zawartości

        // Dodaj wydarzenia do listy
        dane.forEach(event => {
            const li = document.createElement('li');
            li.innerHTML = `${event.nazwa} <br> opis: ${event.opis} <br>Liczba osób: ${event.ilosc} <br>sport: ${event.sports}`;
            listaSportowa.appendChild(li);
        });

    } catch (error) {
        console.error(error);
    }
}

async function pobierzWydarzeniaEdukacyjne() {
    try {
        const response = await fetch('http://localhost:3000/wydarzeniaEdukacyjne');
        if (!response.ok) throw new Error('Błąd pobierania danych edukacyjnych');
        const dane = await response.json();
        
        // Pobierz element listy w HTML
        const listaEdukacyjna = document.getElementById('listaEdukacyjna');
        listaEdukacyjna.innerHTML = ''; // Wyczyszczenie starej zawartości

        // Dodaj wydarzenia do listy
        dane.forEach(event => {
            const li = document.createElement('li');
            li.textContent = `${event.nazwa} - ${event.opis} (${event.ilosc} osób)`;
            listaEdukacyjna.appendChild(li);
        });

    } catch (error) {
        console.error(error);
    }
}

// Wywołaj funkcje po załadowaniu strony
document.addEventListener('DOMContentLoaded', () => {
    pobierzWydarzeniaSportowe();
    pobierzWydarzeniaEdukacyjne();
    pobierzWydarzeniaRozrywka();
});
