async function pobierzWydarzenia() {
    const lista = document.getElementById('lista');
    lista.innerHTML = ''; // Wyczyść listę przed dodaniem nowych wydarzeń

    const pokazSport = document.getElementById('sport-checkbox').checked;
    const pokazEdukacja = document.getElementById('nauka-checkbox').checked;
    const pokazRozrywka = document.getElementById('rozrywka-checkbox').checked;

    let urls = [];

    // Jeśli żaden checkbox nie jest zaznaczony, pobierz wszystkie wydarzenia
    if (!pokazSport && !pokazEdukacja && !pokazRozrywka) {
        urls.push('http://localhost:3000/wydarzeniaSportowe');
        urls.push('http://localhost:3000/wydarzeniaEdukacyjne');
        urls.push('http://localhost:3000/wydarzeniaRozrywka');
    } else {
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

            let szczegoly = `<strong>${event.nazwa}</strong> <br> Opis: ${event.opis} <br>Liczba osób: ${event.ilosc} <br>`;

            if (event.sports) {
                szczegoly += `Sport: ${event.sports} <br>`;
            }
            if (event.przedmioty) {
                szczegoly += `Przedmiot: ${event.przedmioty} <br>`;
            }
            if (event.data) {
                szczegoly += `Data: ${event.data} <br>`;
            }
            if (event.rozrywka) {
                szczegoly += `Rodzaj rozrywki: ${event.rozrywka} <br>`;
            }

            // Używamy _id z MongoDB jako event_id
            if (event._id) {
                szczegoly += `<button onclick="usunWydarzenie('${event._id}')">Usuń wydarzenie</button> 
                <button onclick="window.location.href='podglad.php?id=${event._id}'">Podgląd</button>`;
            } else {
                console.error("Brak _id w wydarzeniu", event);
            }

            li.innerHTML = szczegoly;
            lista.appendChild(li);
        });

    } catch (error) {
        console.error("Błąd podczas pobierania danych:", error);
    }
}

// Funkcja do dołączania do wydarzenia (z _id)
async function dolaczDoWydarzenia(eventId) {
    try {
        const response = await fetch('http://localhost:3000/dolaczDoWydarzenia', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            credentials: 'include',  // Wysyła ciasteczka (PHPSESSID)
            body: JSON.stringify({ event_id: eventId })
        });

        const data = await response.json();
        alert(data.message);
    } catch (error) {
        console.error("Błąd dołączania do wydarzenia:", error);
    }
}
async function usunWydarzenie(eventId) {
    if (!confirm("Czy na pewno chcesz usunąć to wydarzenie?")) return;

    try {
        const response = await fetch('http://localhost:3000/usunWydarzenie', {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            },
            credentials: 'include',
            body: JSON.stringify({ event_id: eventId })
        });

        const data = await response.json();
        alert(data.message);

        // Odśwież listę po usunięciu
        pobierzWydarzenia();
    } catch (error) {
        console.error("Błąd usuwania wydarzenia:", error);
    }
}

// Po załadowaniu strony wywołaj funkcję, aby pobrać wszystkie wydarzenia, jeśli żadna opcja nie jest zaznaczona
document.addEventListener('DOMContentLoaded', pobierzWydarzenia);
