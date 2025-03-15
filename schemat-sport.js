const mongoose = require('mongoose');

// Definicja schematu dla wydarzenia
const eventSchema = new mongoose.Schema({
  nazwa: { type: String, required: true },
  ilosc: { type: Number, required: true },
  opis: { type: String, required: true },
  sports: { type: [String], required: true }
}, { collection: 'Sporty' }); // << Wymusza nazwę kolekcji

const SportEvent = mongoose.model('Sporty', eventSchema);

module.exports = SportEvent;
