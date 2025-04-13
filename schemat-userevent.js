const mongoose = require('mongoose');

const Usereventschema = new mongoose.Schema({
  userid: { type: Number, required: true },
  eventid: { type: String, required: true }
}, { collection: 'Userevent' }); // << Wymusza nazwę kolekcji

const Userevent = mongoose.model('Userevent', Usereventschema);

module.exports = Userevent;
