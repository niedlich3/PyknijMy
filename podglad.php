<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styl_pyknijmy3.css">
</head>
<body>
<h2>Uczestnicy wydarzenia:</h2>
<ul id="uczestnicy-lista"></ul>

<script>
async function ladujUczestnikow() {
    const params = new URLSearchParams(window.location.search);
    const eventId = params.get('id');

    if (!eventId) {
        document.getElementById('uczestnicy-lista').innerHTML = '<li>Nie podano ID wydarzenia</li>';
        return;
    }

    try {
        const res = await fetch(`http://localhost:3000/uczestnicy/${eventId}`);
        const uczestnicy = await res.json();

        const lista = document.getElementById('uczestnicy-lista');
        lista.innerHTML = '';  // Czyszczenie listy przed dodaniem nowych danych

        if (uczestnicy.length === 0) {
            lista.innerHTML = '<li>Brak uczestników</li>';
        } else {
            uczestnicy.forEach(u => {
    if (u) {
        const li = document.createElement('li');
        li.textContent = `${u}`;
        lista.appendChild(li);
    } else {
        const li = document.createElement('li');
        li.textContent = 'Nieznany użytkownik';
        lista.appendChild(li);
    }
});

        }

    } catch (err) {
        console.error("Błąd przy pobieraniu uczestników:", err);
        document.getElementById('uczestnicy-lista').innerHTML = '<li>Błąd ładowania danych</li>';
    }
}


ladujUczestnikow();

</script>

</body>
</html>