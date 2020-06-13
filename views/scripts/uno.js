$('#email-user').change(function() {
    var email = $(this).val();
    var datos = new FormData();
    datos.append("validEmail", email);

    $.ajax({
        url: "ajax/ajax.php", 
        method: "post", 
        data: datos, 
        cache: false, 
        contentType: false, 
        processData: false, 
        dataType: "json", 
        success: function(respuesta){
            console.log("R: ", respuesta);
        }
    });

})

// Validar Imagen Producto.
$("#imageProduct").change(function () {
    $(".aviso").remove();
    var imagen = this.files[0];
    console.log("Imagen", imagen);
    // Validar formato de imagen.
    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
        $("#imageProduct").val("");
        $("#imageProduct").parent().after('<div class="aviso"><span>Solo admite formato JPG o PNG</span></div>');
        return;
    }else if(imagen["size"] > 2000000){
    // Validar tamaño de almacenamiento de imagen.
        $("#imageProduct").val("");
        $("#imageProduct").parent().after('<div class="aviso"><span>Superó el peso soportado (2MB)</span></div>');
        return;
        
    }else{
        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);
        $(datosImagen).on("load", function(event){
            var rutaImagen = event.target.result;
            $(".prevImagen").attr("src", rutaImagen);
        })
    }
})