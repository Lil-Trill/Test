// let urlFile;

// function downloadFile(file){
//     let data = file.files[0];
//     let reader = new FileReader();
//     urlFile = reader.readAsDataURL(data);
    
//     reader.onload = function(){
//         console.log(reader.result);
//     }
// }


const csv = require('csv-parser')
const fs = require('fs')
const results = [];

fs.createReadStream("./filesCSV/fileCSV.csv")
  .pipe(csv({separator:';'}))
  .on('data', (data) => results.push(data))
  .on('end', () => {
    console.log(results);
});

