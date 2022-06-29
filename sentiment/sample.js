const { SentimentAnalyzer } = require('node-nlp');
const express = require('express')
const app = express()
const port = 3000

app.use(express.json()) // for parsing application/json
app.use(express.urlencoded({ extended: true })) // for parsing application/x-www-form-urlencoded
// Add headers before the routes are defined
app.use(function (req, res, next) {
  res.setHeader('Access-Control-Allow-Origin', 'http://localhost');
  res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE');
  res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,content-type');
  res.setHeader('Access-Control-Allow-Credentials', true);
  next();
});

const sentiment = new SentimentAnalyzer({ language: 'en' });

app.post('/', (req, res) => {
  sentiment
  .getSentiment(req.body.comment)
  .then(result => res.json(result));
})


app.listen(port, () => {
  console.log(`Example app listening on port ${port}`)
})