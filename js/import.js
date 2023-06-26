// $("form[name = 'uploader']").submit(function(event){
//     event.preventDefault()
//     let formData = new FormData($(this)[0]);



//     console.log(formData)
// })

function downloadFile(file){
    var file = document.getElementById("upload-file").files[0],
      ext = "не определилось",
      parts = file.name.split('.');
    if (parts.length > 1) ext = parts.pop();

    console.log(ext);

    let reader = new FileReader();
    reader.readAsText(file);

    reader.onload = function(){
      pushData(reader.result);
    }

    // $.ajax({
    //   url: "api/controllers/controllerImport.php",
    //   type: 'POST',
    //   dataType: 'text',
    //   data: {
    //       tableCSV: text
    //   },
    //   success:function(data){
    //     console.log(data);
    //   }
    // })

}

function pushData(text){
  $.ajax({
    url: "api/controllers/controllerImport.php",
    type: 'POST',
    dataType: 'text',
    data: {
        tableCSV: text
    },
    success:function(data){
      alert(data);
    }
  })
}

// function parserCVS(file){
//   let path = file.name.split('/');
//   // "/Test/filesCSV/"+file.name
//   return file;
//   fetch(file.name)
//     .then(function(response) {
//       if (response.ok) {
//         return response.text();
//       }
//       throw new Error('Не удалось загрузить файл.');
//     }).then(function(text) {
//       renderTable(text);
//     })
//     .catch(function(error) {
//       console.error('Произошла ошибка при попытке отобразить файл: ' + error.message);
//     });
// }

// function updateSize() {
//     console.log('start');
//     var file = document.getElementById("upload-file").files[0],
//       ext = "не определилось",
//       parts = file.name.split('.');
//     if (parts.length > 1) ext = parts.pop();

//     console.log(ext);
//     // document.getElementById("e-fileinfo").innerHTML = [
//     //   "Размер файла: " + file.size + " B",
//     //   "Расширение: " + ext,
//     //   "MIME тип: " + file.type
//     // ].join("<br>");
//   }

//   document.getElementById('uploader').addEventListener('change', updateSize);