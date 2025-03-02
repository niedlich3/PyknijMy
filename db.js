const mongoose = require('mongoose');

const uri = 'mongodb+srv://remuwson:alibabson1337@asd.ihxas.mongodb.net/PyknijMy'

mongoose.connect(uri)
  .then(() => console.log('✅ Połączono z MongoDB'))
  .catch(err => console.error('❌ Błąd połączenia:', err));

  module.exports = mongoose;


