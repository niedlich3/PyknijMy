const express = require('express');
const mongoose = require('./db'); // Plik z połączeniem do MongoDB
const SportEvent = require('./schemat-sport'); // Model wydarzenia sportowego
const EducationEvent = require('./schemat-nauka'); // Model wydarzenia edukacyjnego
const EntertainmentEvent = require('./schemat-rozrywka');
const bodyParser = require('body-parser');
const cors = require('cors');
const mysql = require('mysql2');
const session = require('express-session');
const cookieParser = require('cookie-parser');


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
        const { nazwa, ilosc, opis, rozrywka } = req.body;

        // Tworzenie nowego wydarzenia sportowego
        const noweWydarzenieRozrywka = new EntertainmentEvent({
            nazwa,
            ilosc: Number(ilosc),
            opis,
            rozrywka
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


// Dodaj przed konfiguracją innych middleware
app.use(session({
    secret: 'twój_klucz_sesji', // Użyj silnego sekretu
    resave: false,
    saveUninitialized: true,
    cookie: { secure: false } // Możesz ustawić `secure: true` w trybie produkcji z HTTPS
}));
app.post('/login', (req, res) => {
    const { username, password } = req.body;

    // Załóżmy, że masz proces logowania, który sprawdza dane użytkownika
    // Po zweryfikowaniu logowania ustawiasz user_id w sesji
    req.session.userId = '589910';  // Możesz pobrać userId z bazy danych

    res.status(200).json({ message: 'Zalogowano!' });
});

// Trasa, w której pobierasz aktualne user_id
app.get('/getUserId', (req, res) => {
    const userId = req.session.userId;  // Odczytujesz userId z sesji

    if (!userId) {
        return res.status(401).json({ message: "Brak zalogowanego użytkownika!" });
    }

    res.status(200).json({ userId: userId });  // Zwracasz userId
});



// Konfiguracja połączenia z MySQL
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'pyknijmy'
});

app.use(cookieParser());
app.use(express.json());  // Aby obsługiwać JSON w body

// Konfiguracja sesji
app.use(session({
    secret: 'your-secret-key',
    resave: false,
    saveUninitialized: true,
    cookie: { secure: false } // Ustaw na true przy użyciu HTTPS
}));

app.post('/dolaczDoWydarzenia', async (req, res) => {
    const sessionId = req.cookies.PHPSESSID;  // Odczytujemy ID sesji PHP

    if (!sessionId) {
        return res.status(401).json({ message: "Musisz być zalogowany, aby dołączyć do wydarzenia!" });
    }
    req.session.userId = '589910';
    // Odczytujemy userId z sesji, które jest już zapisane w sesji PHP
    const userId = req.session.userId;

    if (!userId) {
        return res.status(401).json({ message: "Nie znaleziono użytkownika w sesji!" });
    }

    const eventId = req.body.event_id;  // event_id z frontend

    // Wstawienie do bazy danych
    const query = 'INSERT INTO user_events (user_id, event_id) VALUES (?, ?)';
    db.query(query, [userId, eventId], (err, results) => {
        if (err) {
            console.error('Błąd podczas zapisywania użytkownika do wydarzenia:', err);
            return res.status(500).json({ message: "Błąd serwera" });
        }
        res.status(200).json({ message: "Dołączono do wydarzenia!" });
    });
});

// Konfiguracja portu i uruchomienie serwera
const PORT = 3000;
app.listen(PORT, () => {
    console.log(`✅ Serwer działa na http://localhost:${PORT}`);
});






// Uruchom serw