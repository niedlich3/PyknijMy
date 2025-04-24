const mongoose = require('mongoose');

const eventEntSchema = new mongoose.Schema({
  nazwa: { type: String, required: true },
  ilosc: { type: Number, required: true },
  data: {type: String, required: true },
  opis: { type: String, required: true },
  rozrywka: { type: [String], required: true }
}, { collection: 'Rozrywka' });

const EntertainmentEvent = mongoose.model('EntertainmentEvent', eventEntSchema);
module.exports = EntertainmentEvent;
