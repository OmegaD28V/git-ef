(function(){
    var formulario = document.getElementsByName('nuevoProducto')[0], 
        elementos = formulario.elements, 
        boton = document.getElementById('btnRegistrarProducto');
    
    var validarCampos = function(e){
        if (
            formulario.category.value == 0 || 
            formulario.nameProduct.value == 0 || 
            formulario.price.value == 0
            ) {
            alert("Hay campos vacíos");
            e.preventDefault();
        }
    };

    formulario.addEventListener("submit", validarCampos);
}())