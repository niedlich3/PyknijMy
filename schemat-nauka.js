const mongoose = require('mongoose');

const eventEduSchema = new mongoose.Schema({
  nazwa: { type: String, required: true },
  ilosc: { type: Number, required: true },
  data: {type: String, required: true },
  opis: { type: String, required: true },
  przedmioty: { type: [String], required: true }
}, { collection: 'Edukacja' });

const EducationEvent = mongoose.model('EducationEvent', eventEduSchema);
module.exports = EducationEvent;
