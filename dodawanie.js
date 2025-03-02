document.querySelector('form').addEventListener('submit', async (e) => {
  e.preventDefault();
  const formData = new FormData(e.target);
  const data = Object.fromEntries(formData);
  
  console.log("Dane do wysłania:", data); // 👀 Sprawdź w konsoli przeglądarki
  
  const response = await fetch('/dodajWydarzenie', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data)
  });

  const result = await response.json();
  alert(result.message);
});
