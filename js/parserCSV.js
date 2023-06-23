const csv = require('csv-parser')
const fs = require('fs')
const results = [];


fs.readFile('./filesCSV/fl.txt','utf-8',(err,data)=>{
    console.log(data);
});

fs.createReadStream('./filesCSV/fileCSV1.csv')
  .pipe(csv({separator:';'}))
  .on('data', (data) => results.push(data))
  .on('end', () => {
    console.log(results);
  });