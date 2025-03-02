const express = require('express');
const mongoose = require('./db'); // Plik z połączeniem do MongoDB
const Event = require('./schemat'); // Model wydarzenia (jeśli w schemacie nazywa się "Event", używaj tej nazwy)
const bodyParser = require('body-parser');
const cors = require('cors');

const app = express();
app.use(cors());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Endpoint do dodawania wydarzeń sportowych
app.post('/dodajWydarzenie', async (req, res) => {
    console.log("Otrzymane dane:", req.body); // 👀 Sprawdź, co faktycznie przychodzi
    try {
        const { nazwa, ilosc, opis, sports } = req.body;

        // Tworzenie nowego wydarzenia
        const noweWydarzenie = new Event({
            nazwa,
            ilosc: Number(ilosc),
            opis,
            sports
        });

        // Zapisanie wydarzenia do bazy
        await noweWydarzenie.save();
        res.status(201).json({ message: "Dodano wydarzenie!" });
    } catch (error) {
        console.error("Błąd zapisu:", error); // 👀 Jeśli jest błąd, zobacz go w terminalu
        res.status(500).json({ message: "Błąd serwera", error });
    }
});

// Konfiguracja portu i uruchomienie serwera
const PORT = 3000;
app.listen(PORT, () => {
    console.log(`✅ Serwer działa na http://localhost:${PORT}`);
});
