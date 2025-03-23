
async function pobierzWydarzeniaSportowe() {
    try {
        const response = await fetch('http://localhost:3000/wydarzeniaSportowe');
        if (!response.ok) throw new Error('Błąd pobierania danych sportowych');
        const dane = await response.json();
        
        // Pobierz element listy w HTML
        const lista = document.getElementById('lista');

        // Dodaj wydarzenia do listy
        dane.forEach(event => {
            const li = document.createElement('li');
            li.innerHTML = `<strong>${event.nazwa}</strong> <br> opis: ${event.opis} <br>Liczba osób: ${event.ilosc} <br>sport: ${event.sports}`;
            lista.appendChild(li);
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
        const lista = document.getElementById('lista');

        // Dodaj wydarzenia do listy
        dane.forEach(event => {
            const li = document.createElement('li');
            li.innerHTML = `<strong>${event.nazwa}</strong> <br> opis: ${event.opis} <br>Liczba osób: ${event.ilosc} <br> przedmiot: ${event.przedmioty}`;
            lista.appendChild(li);
        });

    } catch (error) {
        console.error(error);
    }
}
async function pobierzWydarzeniaRozrywka() {
    try {
        const response = await fetch('http://localhost:3000/wydarzeniaRozrywka');
        if (!response.ok) throw new Error('Błąd pobierania danych edukacyjnych');
        const dane = await response.json();
        
        // Pobierz element listy w HTML
        const lista = document.getElementById('lista');

        // Dodaj wydarzenia do listy
        dane.forEach(event => {
            const li = document.createElement('li');
            li.innerHTML = `<strong>${event.nazwa}</strong> <br> opis: ${event.opis} <br>Liczba osób: ${event.ilosc} <br> przedmiot: ${event.rozrywka}`;
            lista.appendChild(li);
        });

    } catch (error) {
        console.error(error);
    }
}

// Wywołaj funkcje po załadowaniu strony
document.addEventListener('DOMContentLoaded', () => {
    pobierzWydarzeniaRozrywka();
    pobierzWydarzeniaEdukacyjne();
    pobierzWydarzeniaSportowe();
});


async function pobierzWydarzenia() {
    const lista = document.getElementById('lista');
    lista.innerHTML = ''; // Wyczyść listę przed dodaniem nowych wydarzeń

    const pokazSport = document.getElementById('sport-checkbox').checked;
    const pokazEdukacja = document.getElementById('nauka-checkbox').checked;
    const pokazRozrywka = document.getElementById('rozrywka-checkbox').checked;

    let urls = [];

    // Sprawdź, czy żaden checkbox nie jest zaznaczony
    if (!pokazSport && !pokazEdukacja && !pokazRozrywka) {
        // Jeśli żaden checkbox nie jest zaznaczony, pobierz wszystkie wydarzenia
        urls.push('http://localhost:3000/wydarzeniaSportowe');
        urls.push('http://localhost:3000/wydarzeniaEdukacyjne');
        urls.push('http://localhost:3000/wydarzeniaRozrywka');
    } else {
        // Jeśli checkboxy są zaznaczone, dodaj tylko odpowiednie URL do listy
        if (pokazSport) urls.push('http://localhost:3000/wydarzeniaSportowe');
        if (pokazEdukacja) urls.push('http://localhost:3000/wydarzeniaEdukacyjne');
        if (pokazRozrywka) urls.push('http://localhost:3000/wydarzeniaRozrywka');
    }

    try {
        const responses = await Promise.all(urls.map(url => fetch(url)));
        const dane = await Promise.all(responses.map(res => res.json()));

        // Wyświetlamy wszystkie pobrane wydarzenia
        dane.flat().forEach(event => {
            const li = document.createElement('li');
            
            // Zmienna do trzymania szczegółowych informacji
            let szczegoly = `<strong>${event.nazwa}</strong> <br> Opis: ${event.opis} <br>Liczba osób: ${event.ilosc}`;
            
            // Dodaj szczegóły w zależności od kategorii
            if (event.sports) {
                szczegoly += `<br>Sport: ${event.sports}`;
            }
            if (event.przedmioty) {
                szczegoly += `<br>Przedmiot: ${event.przedmioty}`;
            }
            if (event.rozrywka) {
                szczegoly += `<br>Rodzaj rozrywki: ${event.rozrywka}`;
            }

            li.innerHTML = szczegoly;
            lista.appendChild(li);
        });

    } catch (error) {
        console.error("Błąd podczas pobierania danych:", error);
    }
}

// Dodajemy nasłuchiwacze na zmiany checkboxów
document.getElementById('sport-checkbox').addEventListener('change', pobierzWydarzenia);
document.getElementById('nauka-checkbox').addEventListener('change', pobierzWydarzenia);
document.getElementById('rozrywka-checkbox').addEventListener('change', pobierzWydarzenia);

// Po załadowaniu strony wywołaj funkcję, aby pobrać wszystkie wydarzenia, jeśli żadna opcja nie jest zaznaczona
document.addEventListener('DOMContentLoaded', pobierzWydarzenia);

