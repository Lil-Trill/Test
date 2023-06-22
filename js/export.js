$('.btn-export').on('click', function(event){
    const obj = event.target.closest('.product');
    let idProduct = obj.dataset.id;

    $.ajax({
        url: 'api/controllers/controllerExport.php',
        type: 'POST',
        dataType: 'text',
        data: {
            idProduct: idProduct
        },
        success: function(data){
            console.log(data);
        }
    })
})