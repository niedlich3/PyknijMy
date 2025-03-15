document.querySelector('form').addEventListener('submit', async (e) => {
  e.preventDefault();
  
  // Pobierz dane z formularza
  const formData = new FormData(e.target);
  
  // Zmiana: W przypadku pól, które mogą być tablicami (np. 'przedmioty'), musisz upewnić się, że są one traktowane poprawnie
  const data = Object.fromEntries(formData);

  // Jeśli pole "przedmioty" jest wyborem wielu opcji, to przekonwertuj je na tablicę
  if (data.przedmioty) {
    data.przedmioty = Array.isArray(data.przedmioty) ? data.przedmioty : [data.przedmioty];
  }
  
  console.log("Dane do wysłania:", data); // 👀 Sprawdź w konsoli przeglądarki
  
  // Wysłanie danych na serwer
  const response = await fetch('http://localhost:3000/dodajWydarzenie', {

    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(data) // Wyślij dane w formacie JSON
  });

  // Odbierz odpowiedź z serwera
  const result = await response.json();
  
  // Pokaż komunikat użytkownikowi
  alert(result.message);
});
