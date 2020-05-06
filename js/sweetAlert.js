(async () => {
    const {value: pais} = await Swal.fire({
        title: 'Bienvenido!', 
        text: 'Selecciona tu país',
        // icon: 'question', 
        confirmButtonText: 'Seleccionar', 
        footer: '<span>Información importante</span>', 
        // width: '50%', 
        padding: '1rem', 
        backdrop: true, 
        // toast: true, 
        position: 'center', 
        allowOutsideClick: false, 
        allowEscapeKey: false, 
        allowEnterKey: false, 
        stopKeydownPropagation: false, 
        input: 'select', 
        inputPlaceholder: 'Categorías', 
        inputValue: '', 
        inputOptions: {
            México: 'México', 
            España: 'España'
        }
        // timer: 5000,
        // timerProgressBar: true
        // background: '#000000', 
        // grow: 'fullscreen'
        // html: '<b>Hola</b>'
    });

    if (pais) {
        Swal.fire({
            title: `Seleccionaste ${pais}`
        });
    }
})()