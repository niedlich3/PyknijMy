import fetch from 'node-fetch';

async function testFetch() {
   try {
       const response = await fetch('https://jsonplaceholder.typicode.com/todos/1');
       const data = await response.json();
       console.log('Test fetch - odpowiedź:', data);
   } catch (error) {
       console.error('Błąd fetch:', error);
   }
}

testFetch();
