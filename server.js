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
const fetch = require('node-fetch'); // Użycie require w CommonJS
const Userevent = require('./schemat-userevent');

// Middleware
app.use(cookieParser());
app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(cors({
    origin: 'http://localhost',  // Dostosuj do swojego frontendu
    credentials: true
}));

// Połączenie z MySQL
db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'pyknijmy'
});

db.connect((err) => {
    if (err) {
        console.error("Błąd połączenia z MySQL:", err);
        return;
    }
    console.log("✅ Połączono z bazą MySQL");
});

// Pobieranie user_id z sesji PHP
const getUserIdFromSession = async (sessionId) => {
    try {
        const response = await fetch('http://localhost/pyknijmy-main/session_check.php', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Cookie': `PHPSESSID=${sessionId}`
            },
            credentials: 'include' // Wymagane, aby przesłać sesję!
        });

        // Logowanie odpowiedzi tekstowej przed próbą parsowania JSON
        const text = await response.text();
        console.log("Odpowiedź z serwera:", text);

        // Parsowanie tylko, jeśli odpowiedź jest w formacie JSON
        const data = JSON.parse(text);
        console.log("Odpowiedź z session_check.php:", data);

        return data.user_id || null;
    } catch (error) {
        console.error("Błąd pobierania sesji:", error);
        return null;
    }
};



// Endpoint do dołączania do wydarzenia
app.post('/dolaczDoWydarzenia', async (req, res) => {
    try {
        console.log("Ciasteczka otrzymane w żądaniu:", req.cookies);
        const sessionId = req.cookies.PHPSESSID;
        console.log("Pobrany PHPSESSID:", sessionId);

        if (!sessionId) {
            return res.status(401).json({ message: "Nie znaleziono sesji!" });
        }

        const userId = await getUserIdFromSession(sessionId);
        console.log("Pobrane user_id:", userId);

        if (!userId) {
            return res.status(401).json({ message: "Brak zalogowanego użytkownika!" });
        }

        const eventId = req.body.event_id;
        if (!eventId) {
            return res.status(400).json({ message: "Brak ID wydarzenia!" });
        }

        // Sprawdzenie w MongoDB, czy użytkownik już dołączył
        const istnieje = await Userevent.findOne({ userid: userId, eventid: eventId });

        if (istnieje) {
            return res.status(400).json({ message: "Jesteś już zapisany!" });
        }

        // Dodanie do MongoDB
        const nowyZapis = new Userevent({ userid: userId, eventid: eventId });
        await nowyZapis.save();

        res.status(200).json({ message: "Dołączono do wydarzenia!" });

    } catch (error) {
        console.error("Nieoczekiwany błąd:", error);
        res.status(500).json({ message: "Wystąpił nieoczekiwany błąd" });
    }
});


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


app.get('/uczestnicy/:eventid', async (req, res) => {
    const eventid = req.params.eventid;

    try {
        const userEvents = await Userevent.find({ eventid });
        const userIds = userEvents.map(entry => entry.userid);

        console.log("Znalezione userIds:", userIds);

        if (userIds.length === 0) {
            return res.json([]);
        }

        // Dynamiczne podstawienie tylu znaków zapytania ile userów
        const placeholders = userIds.map(() => '?').join(',');
        const sql = `SELECT user_name FROM users WHERE user_id IN (${placeholders})`;

        db.query(sql, userIds, (err, results) => {
            if (err) {
                console.error("Błąd zapytania MySQL:", err);
                return res.status(500).json({ message: "Błąd bazy danych" });
            }

            console.log("Znalezieni użytkownicy:", results);
            res.json(results.map(row => row.user_name));  // Zmieniamy login na user_name
        });

    } catch (err) {
        console.error("Błąd pobierania uczestników:", err);
        res.status(500).json({ message: "Błąd serwera" });
    }
});


// Konfiguracja portu i uruchomienie serwera
const PORT = 3000;
app.listen(PORT, () => {
    console.log(`✅ Serwer działa na http://localhost:${PORT}`);
});






// Uruchom serw