async function pobierzWydarzenia() {
    const lista = document.getElementById('lista');
    lista.innerHTML = ''; // Wyczyść listę

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

        // Filtruj po dacie
        const wydarzenia = filtrujPoDacie(dane.flat());

        // Wyświetl przefiltrowane wydarzenia
        wydarzenia.forEach(event => {
            const li = document.createElement('li');

            let szczegoly = `<strong>${event.nazwa}</strong> <br> Opis: ${event.opis} <br>Liczba osób: ${event.ilosc} <br>`;

            if (event.sports) {
                szczegoly += `Sport: ${event.sports} <br>`;
            }
            if (event.przedmioty) {
                szczegoly += `Przedmiot: ${event.przedmioty} <br>`;
            }
            if (event.data) {
                szczegoly += `Data: ${event.data.split('T')[0]} <br>`; // Formatowanie daty
            }
            if (event.rozrywka) {
                szczegoly += `Rodzaj rozrywki: ${event.rozrywka} <br>`;
            }

            if (event._id) {
                szczegoly += `
                    <button onclick="dolaczDoWydarzenia('${event._id}')">Dołącz</button> 
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

function filtrujPoDacie(wydarzenia) {
    const wybranaData = document.getElementById('data-wydarzenia').value;
    if (!wybranaData) return wydarzenia;

    return wydarzenia.filter(event => {
        if (!event.data) return false;
        const dataWydarzenia = event.data.split('T')[0];
        return dataWydarzenia === wybranaData;
    });
}

// Dołączanie do wydarzenia
async function dolaczDoWydarzenia(eventId) {
    try {
        const response = await fetch('http://localhost:3000/dolaczDoWydarzenia', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            credentials: 'include',
            body: JSON.stringify({ event_id: eventId })
        });

        const data = await response.json();
        alert(data.message);
    } catch (error) {
        console.error("Błąd dołączania do wydarzenia:", error);
    }
}

// Nasłuchiwacze na checkboxy i datę
document.getElementById('sport-checkbox').addEventListener('change', pobierzWydarzenia);
document.getElementById('nauka-checkbox').addEventListener('change', pobierzWydarzenia);
document.getElementById('rozrywka-checkbox').addEventListener('change', pobierzWydarzenia);
document.getElementById('data-wydarzenia').addEventListener('change', pobierzWydarzenia);

// Załaduj wydarzenia przy starcie
document.addEventListener('DOMContentLoaded', pobierzWydarzenia);
