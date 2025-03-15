const express = require('express');
const mongoose = require('./db'); // Plik z połączeniem do MongoDB
const SportEvent = require('./schemat-sport'); // Model wydarzenia sportowego
const EducationEvent = require('./schemat-nauka'); // Model wydarzenia edukacyjnego
const EntertainmentEvent = require('./schemat-rozrywka');
const bodyParser = require('body-parser');
const cors = require('cors');

const app = express();
app.use(cors());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Endpoint do dodawania wydarzeń sportowych
app.post('/dodajWydarzenieSportowe', async (req, res) => {
    console.log("Otrzymane dane (Sportowe):", req.body);
    try {
        const { nazwa, ilosc, opis, sports } = req.body;

        // Tworzenie nowego wydarzenia sportowego
        const noweWydarzenieSportowe = new SportEvent({
            nazwa,
            ilosc: Number(ilosc),
            opis,
            sports
        });

        // Zapisanie wydarzenia sportowego do bazy
        await noweWydarzenieSportowe.save();
        res.status(201).json({ message: "Dodano wydarzenie sportowe!" });
    } catch (error) {
        console.error("Błąd zapisu wydarzenia sportowego:", error);
        res.status(500).json({ message: "Błąd serwera", error });
    }
});

// Endpoint do dodawania wydarzeń edukacyjnych
app.post('/dodajWydarzenieEdukacyjne', async (req, res) => {
    console.log("Otrzymane dane (Edukacyjne):", req.body);
    try {
        const { nazwa, ilosc, opis, przedmioty } = req.body;

        // Tworzenie nowego wydarzenia edukacyjnego
        const noweWydarzenieEdukacyjne = new EducationEvent({
            nazwa,
            ilosc: Number(ilosc),
            opis,
            przedmioty
        });

        // Zapisanie wydarzenia edukacyjnego do bazy
        await noweWydarzenieEdukacyjne.save();
        res.status(201).json({ message: "Dodano wydarzenie edukacyjne!" });
    } catch (error) {
        console.error("Błąd zapisu wydarzenia edukacyjnego:", error);
        res.status(500).json({ message: "Błąd serwera", error });
    }
});

// Endpoint do dodawania wydarzeń dot. rozrywki
app.post('/dodajWydarzenieRozrywka', async (req, res) => {
    console.log("Otrzymane dane (Rozrywka):", req.body);
    try {
        const { nazwa, ilosc, opis, rozrywkas } = req.body;

        // Tworzenie nowego wydarzenia sportowego
        const noweWydarzenieRozrywka = new EntertainmentEvent({
            nazwa,
            ilosc: Number(ilosc),
            opis,
            rozrywkas
        });

        // Zapisanie wydarzenia sportowego do bazy
        await noweWydarzenieRozrywka.save();
        res.status(201).json({ message: "Dodano wydarzenie rozrywka!" });
    } catch (error) {
        console.error("Błąd zapisu wydarzenia rozrywka:", error);
        res.status(500).json({ message: "Błąd serwera", error });
    }
});


// Endpoint do pobierania wydarzeń sportowych
app.get('/wydarzeniaSportowe', async (req, res) => {
    try {
        const wydarzenia = await SportEvent.find();
        res.json(wydarzenia);
    } catch (error) {
        res.status(500).json({ message: "Błąd serwera", error });
    }
});

// Endpoint do pobierania wydarzeń edukacyjnych
app.get('/wydarzeniaEdukacyjne', async (req, res) => {
    try {
        const wydarzenia = await EducationEvent.find();
        res.json(wydarzenia);
    } catch (error) {
        res.status(500).json({ message: "Błąd serwera", error });
    }
});

// Endpoint do pobierania wydarzeń rozrywkowych
app.get('/wydarzeniaRozrywka', async (req, res) => {
    try {
        const wydarzenia = await EntertainmentEvent.find();
        res.json(wydarzenia);
    } catch (error) {
        res.status(500).json({ message: "Błąd serwera", error });
    }
});






// Konfiguracja portu i uruchomienie serwera
const PORT = 3000;
app.listen(PORT, () => {
    console.log(`✅ Serwer działa na http://localhost:${PORT}`);
});
