$('#correo-user').change(function() {
    $('.info-f').remove();
    if ($(this).val().length > 60) {
        $("#correo-user").val($("#correo-user").val().substring(0, 60));
        $("#correo-user").after('<div class="info-f">Máximo de caracteres: 60</div>');
    }

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
            if (respuesta) {
                $("#correo-user").val("");
                (async () => {
                    const {value: pais} = await Swal.fire({
                        showConfirmButton: false,  
                        icon: 'info', 
                        html: '<b style="font-size: 1.1rem">Ya existe un usuario con ese correo</b>', 
                        backdrop: false, 
                        toast: true, 
                        position: 'top-left', 
                        showCloseButton: true,
                        width: 300, 
                        padding: '0.5rem',
                        background: '#fdfdfd',
                        timer: 5000, 
                        timerProgressBar: true
                    });
                })()
            }
        }
    });
})

$('#input-btn-switch').change(function(){
    if ($('#input-btn-switch')[0].checked == true) {
        $('.fisica').remove();
        $('#input-btn-switch').parent().parent().after().append(
            '<div class="input-group moral">' + 
                '<label for="name-user">Razón Social</label>' + 
                '<input type="text" name="name-user" id="name-user" required>' + 
            '</div>'
        );
    }else{
        $('.moral').remove();
        $('#input-btn-switch').parent().parent().after().append(
            '<div class="input-group fisica">' + 
                '<label for="name-user">Nombre</label>' + 
                '<input type="text" name="name-user" id="name-user" required>' + 
            '</div>' + 
            '<div class="input-group fisica">' + 
                '<label for="ape-user">Apellidos</label>' + 
                '<input type="text" name="ape-user" id="ape-user" required>' + 
            '</div>'
        );
    }
})

$('#input3').change(function() {
    var pro = $(this).val();
    var datos = new FormData();
    datos.append("validPro", pro);
    console.log(pro);
    

    $('.info-f').remove();
    if ($(this).val().length > 10) {
        $("#input3").val($("#input3").val().substring(0, 10));
        $("#input3").after('<div class="info-f">Máximo de caracteres: 10</div>');
    }

    $.ajax({
        url: "ajax/ajax.php", 
        method: "post", 
        data: datos, 
        cache: false, 
        contentType: false, 
        processData: false, 
        dataType: "json", 
        success: function(respuesta){
            if (respuesta) {
                $("#input3").val("");
                (async () => {
                    const {value: pais} = await Swal.fire({
                        showConfirmButton: false,  
                        icon: 'info', 
                        html: '<b style="font-size: 1.1rem">Ya existe un producto con el código ' + respuesta["codigo"] + '</b>', 
                        backdrop: false, 
                        toast: true, 
                        position: 'top-left', 
                        showCloseButton: true,
                        width: 300, 
                        padding: '0.5rem',
                        background: '#fdfdfd',
                        timer: 5000, 
                        timerProgressBar: true
                    });
                })()
            }
        }
    });
})

$('#input4').change(function() {
    $('.info-f').remove();
    if ($(this).val().length > 100) {
        $("#input4").val($("#input4").val().substring(0, 100));
        $("#input4").after('<div class="info-f">Máximo de caracteres: 100</div>');
    }
})

$('#input5').change(function() {
    $('.info-f').remove();
    if ($(this).val().length > 30) {
        $("#input5").val($("#input5").val().substring(0, 30));
        $("#input5").after('<div class="info-f">Máximo de caracteres: 30</div>');
    }
})

$('#input6').change(function() {
    $('.info-f').remove();
    var pro = $('#idpro').val();
    var precioMinimo;
    var proValPrecio = new FormData();
    proValPrecio.append("pro", pro);
    

    $.ajax({
        url: "ajax/ajax.php", 
        method: "post", 
        data: proValPrecio, 
        cache: false, 
        contentType: false, 
        processData: false, 
        dataType: "json", 
        success: function(r){
            if(r){
                precioMinimo = parseFloat(r["preciominimo"]);
                console.log(precioMinimo);
                if($('#input6').val() < precioMinimo){
                    
                    $("#input6").val(precioMinimo);
                    $("#input6").after('<div class="info-f">El precio no puede ser menor al de compra + 20% = $'+ precioMinimo +'</div>');
                    // $("#input6").autofocus();
                }
            }
        }
    });

    if ($(this).val().length > 9) {
        $("#input6").val($("#input6").val().substring(0, 9));
        $("#input6").after('<div class="info-f">Máximo de caracteres: 9</div>');
    }
})

$('#input7').change(function() {
    $('.info-f').remove();
    if ($(this).val().length > 250) {
        $("#input7").val($("#input7").val().substring(0, 250));
        $("#input7").after('<div class="info-f">Máximo de caracteres: 250</div>');
    }
})

$('#nameCategory').change(function() {
    $('.info-f').remove();
    if ($(this).val().length > 60) {
        $("#nameCategory").val($("#nameCategory").val().substring(0, 60));
        $("#nameCategory").after('<div class="info-f">Máximo de caracteres: 60</div>');
    }
})

$('#nameTrademark').change(function() {
    $('.info-f').remove();
    if ($(this).val().length > 60) {
        $("#nameTrademark").val($("#nameTrademark").val().substring(0, 60));
        $("#nameTrademark").after('<div class="info-f">Máximo de caracteres: 60</div>');
    }
})

$('#featureProduct').change(function() {
    $('.info-f').remove();
    if ($(this).val().length > 150) {
        $("#featureProduct").val($("#featureProduct").val().substring(0, 150));
        $("#featureProduct").after('<div class="info-f">Máximo de caracteres: 150</div>');
    }
})

$('#codeBuy').change(function() {
    $('.info-f').remove();
    if ($(this).val().length > 20) {
        $("#codeBuy").val($("#codeBuy").val().substring(0, 20));
        $("#codeBuy").after('<div class="info-f">Máximo de caracteres: 20</div>');
    }
})

$('#buyPrice').change(function() {
    $('.info-f').remove();
    if ($(this).val().length > 9) {
        $("#buyPrice").val($("#buyPrice").val().substring(0, 9));
        $("#buyPrice").after('<div class="info-f">Máximo de caracteres: 9</div>');
    }
})

$('#cuantity').change(function() {
    $('.info-f').remove();
    if ($(this).val().length > 9) {
        $("#cuantity").val($("#cuantity").val().substring(0, 9));
        $("#cuantity").after('<div class="info-f">Máximo de caracteres: 9</div>');
    }
})

$('#name-user').change(function() {
    $('.info-f').remove();
    if ($(this).val().length > 75) {
        $("#name-user").val($("#name-user").val().substring(0, 75));
        $("#name-user").after('<div class="info-f">Máximo de caracteres: 75</div>');
    }
})

$('#ape-user').change(function() {
    $('.info-f').remove();
    if ($(this).val().length > 75) {
        $("#ape-user").val($("#ape-user").val().substring(0, 75));
        $("#ape-user").after('<div class="info-f">Máximo de caracteres: 75</div>');
    }
})

$('#tel-user').change(function() {
    $('.info-f').remove();
    if ($(this).val().length > 10) {
        $("#tel-user").val($("#tel-user").val().substring(0, 10));
        $("#tel-user").after('<div class="info-f">Máximo de caracteres: 10</div>');
    }
})

$('#calle').change(function() {
    $('.info-f').remove();
    if ($(this).val().length > 100) {
        $("#calle").val($("#calle").val().substring(0, 100));
        $("#calle").after('<div class="info-f">Máximo de caracteres: 100</div>');
    }
})

$('#no-casa').change(function() {
    $('.info-f').remove();
    if ($(this).val().length > 6) {
        $("#no-casa").val($("#no-casa").val().substring(0, 6));
        $("#no-casa").after('<div class="info-f">Máximo de caracteres: 6</div>');
    }
})

$('#no-ext').change(function() {
    $('.info-f').remove();
    if ($(this).val().length > 6) {
        $("#no-ext").val($("#no-ext").val().substring(0, 6));
        $("#no-ext").after('<div class="info-f">Máximo de caracteres: 6</div>');
    }
})

$('#entre-calle1').change(function() {
    $('.info-f').remove();
    if ($(this).val().length > 60) {
        $("#entre-calle1").val($("#entre-calle1").val().substring(0, 60));
        $("#entre-calle1").after('<div class="info-f">Máximo de caracteres: 60</div>');
    }
})

$('#entre-calle2').change(function() {
    $('.info-f').remove();
    if ($(this).val().length > 60) {
        $("#entre-calle2").val($("#entre-calle2").val().substring(0, 60));
        $("#entre-calle2").after('<div class="info-f">Máximo de caracteres: 60</div>');
    }
})

$('#ref').change(function() {
    $('.info-f').remove();
    if ($(this).val().length > 250) {
        $("#ref").val($("#ref").val().substring(0, 250));
        $("#ref").after('<div class="info-f">Máximo de caracteres: 250</div>');
    }
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

function generateNameUser() {
    $('#correo-user').val('');
    var sizeNombre;
    var random;
    var fechaActual;
    var nombreGenerado;
    if ($('#no-email')[0].checked == true) {
        random = (Math.random()*99999).toFixed();
        fechaActual = new Date();
        if ($('#name-user').val() != '') {
            sizeNombre = $('#name-user').val().length;
            if (sizeNombre > 10) {
                nombreGenerado = $('#name-user').val().substring(0, 10) + '_' + fechaActual.getFullYear() + fechaActual.getMonth() + fechaActual.getDate() + fechaActual.getHours() + fechaActual.getMinutes() + fechaActual.getSeconds() + fechaActual.getUTCMilliseconds() + random;
                $('#correo-user').val(nombreGenerado);
            }else{
                nombreGenerado = $('#name-user').val().substring(0, sizeNombre) + '_' + fechaActual.getFullYear() + fechaActual.getMonth() + fechaActual.getDate() + fechaActual.getHours() + fechaActual.getMinutes() + fechaActual.getSeconds() + fechaActual.getUTCMilliseconds() + random;
                $('#correo-user').val(nombreGenerado);
            }
        }else{
            nombreGenerado = 'user_' + fechaActual.getFullYear() + fechaActual.getMonth() + fechaActual.getDate() + fechaActual.getHours() + fechaActual.getMinutes() + fechaActual.getSeconds() + fechaActual.getUTCMilliseconds() + random;
            $('#correo-user').val(nombreGenerado);
            
        }
        
    }
}

function noPhone() {
    $('#tel-user').val('');
    if ($('#no-phone')[0].checked == true) {
        $('#tel-user').prop('disabled', true);   
    }else{
        $('#tel-user').prop('disabled', false);   
    }
}

// $('#cp').change(function(){
//     inputCP = $(this).val();
//     var dataCP = new FormData();
//     dataCP.append("cp", inputCP);
//     $('#itemAddress').remove();
//     $.getJSON('http://api.geonames.org/postalCodeLookupJSON?postalcode=' + inputCP + '&country=MX&username=orakzai&style=full', function(data) { 
//         console.log(JSON.stringify(data)); 
//         var countries = data.postalcodes; 
//         var items = []; 
//         $.each(countries, function(key, val) {
//             $('#selAddress').append('<option id="itemAddress" value="' + val.placeName + '">' + val.placeName + '</option>');
//             // items.push('<li id="' + key + '">' + val.postalcode + '</li>');
//             console.log('Estado: ', val.adminName1);
//             console.log('Localidad o Municipio: ', val.adminName2);
//             console.log('Colonia: ', val.placeName);
            
//         }); 
//         // $('<ul/>', {
//         //     'class': 'my-new-list',
//         //     html: items.join('')
//         // }).appendTo('body');
//     })

//     // $.ajax({
//     //     url: 'http://api.geonames.org/postalCodeLookupJSON?postalcode=' + inputCP + '&country=MX&username=orakzai&style=full', 
//     //     method: "post", 
//     //     data: dataCP, 
//     //     cache: false, 
//     //     contentType: false, 
//     //     processData: false, 
//     //     dataType: "json", 
//     //     success: function(r){
//     //         if(r){
//     //             $.each(r.geonames, function(i, val){
//     //                 console.log('Respuesta');
//     //                 console.log(val.postalcode);
                    
//     //                 // console.log(JSON.parse(r));
//     //             })
//     //         }else{
//     //             console.log('Sin respuesta');
//     //         }
//     //     }
//     // });
// })

var searchInput = 'search_input';

$(document).ready(function () {
    var autocomplete;
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
        types: ['geocode'], 
        componentRestrictions: {
            country: "MX"
        }
    });
        
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var near_place = autocomplete.getPlace();
        var address = '';
        
          if (near_place.address_components) {
            // address = [
            //   (near_place.address_components[0] && near_place.address_components[0].short_name || ''),
            //   (near_place.address_components[1] && near_place.address_components[1].long_name || ''),
            //   (near_place.address_components[2] && near_place.address_components[2].short_name || ''), 
            //   (near_place.address_components[3] && near_place.address_components[3].long_name || ''), 
            //   (near_place.address_components[4] && near_place.address_components[4].short_name || '')
            // ].join(' ');
            $('#col').after().append(
                '<div id="super-form">' + 
                    '<div class="form-group">' + 
                        '<label>Estado:</label>' + 
                        '<div class="input-disabled"><span id="estado"></span></div>' + 
                    '</div>' + 
                    '<div class="form-group">' + 
                        '<label>Municipio:</label>' + 
                        '<div class="input-disabled"><span id="municipio"></span></div>' + 
                    '</div>' + 
                    '<div class="form-group">' + 
                        '<label>Localidad:</label>' + 
                        '<div class="input-disabled"><span id="localidad"></span></div>' + 
                    '</div>' + 
                    '<div class="form-group">' + 
                        '<label>Colonia:</label>' + 
                        '<div class="input-disabled"><span id="colonia"></span></div>' + 
                    '</div>' + 
                    '<div class="form-group">' + 
                        '<label>Código Postal:</label>' + 
                        '<div class="input-disabled"><span id="CP"></span></div>' + 
                    '</div>' + 
                    '<div class="form-group">' + 
                        '<label for="calle">Calle:</label>' + 
                        '<input type="text" id="calle" name="calle" required>' + 
                    '</div>' + 
                    '<div class="form-group">' + 
                        '<label for="no-casa">No. Casa:</label>' + 
                        '<input type="number" id="no-casa" name="no-casa" min="0" step="1">' + 
                    '</div>' + 
                    '<div class="form-group">' + 
                        '<label for="no-ext">No. Exterior (Opcional):</label>' + 
                        '<input type="number" id="no-ext" name="no-ext" min="0" step="0">' + 
                    '</div>' + 
                    '<h5>Entre Calles</h5>' + 
                    '<div class="form-group">' + 
                        '<label for="entre-calle1">Calle 1 (Opcional):</label>' + 
                        '<input type="text" id="entre-calle1" name="entre-calle1">' + 
                    '</div>' + 
                    '<div class="form-group">' + 
                        '<label for="entre-calle2">Calle 2 (Opcional):</label>' + 
                        '<input type="text" id="entre-calle2" name="entre-calle2">' + 
                    '</div>' + 
                    '<h5>Describa una referencia</h5>' + 
                    '<div class="form-group">' + 
                        '<label for="ref">Referencia:</label>' + 
                        '<textarea id="ref" name="ref" cols="50" rows="10" required></textarea>' + 
                    '</div>' + 
                '</div>'
            );
            // console.log(near_place);
            $('#colonia').text(near_place.address_components[0].short_name);
            $('#localidad').text(near_place.address_components[1].long_name);
            $('#municipio').text(near_place.address_components[1].short_name);
            $('#estado').text(near_place.address_components[2].long_name);

            $('#val-colonia').val(near_place.address_components[0].short_name);
            $('#val-localidad').val(near_place.address_components[1].long_name);
            $('#val-municipio').val(near_place.address_components[1].short_name);
            $('#val-estado').val(near_place.address_components[2].long_name);

            if (!near_place.address_components[4]) {
                $('#CP').text('Sin código postal');
                $('#val-CP').val('0');
            }else{
                $('#CP').text(near_place.address_components[4].long_name);
                $('#val-CP').val(near_place.address_components[4].long_name);
            }
        }
    });
});

$(document).on('change', '#'+searchInput, function () {
    $('#colonia').text('');
    $('#localidad').text('');
    $('#municipio').text('');
    $('#estado').text('');
    $('#CP').text('');
    
    $('#val-colonia').val('');
    $('#val-localidad').val('');
    $('#val-municipio').val('');
    $('#val-estado').val('');
    $('#val-CP').val('');
    $('#super-form').remove();
});