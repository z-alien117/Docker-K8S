const express = require('express');
const bodyParser = require('body-parser');
const db = require('./db');
const routes = require('./routes');

const app = express();

app.use(bodyParser.json());
app.use(express.static('public'));  // Serve static files from the public directory
app.use('/', routes);

app.listen(3000, () => {
    console.log('Server started on port 3000');
});
