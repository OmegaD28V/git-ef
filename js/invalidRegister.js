(async () => {
    const {value: pais} = await Swal.fire({
        showConfirmButton: false,  
        icon: 'error', 
        text: 'Error al registrar, ha ingresado datos inválidos', 
        backdrop: false, 
        toast: false, 
        position: 'center', 
        showCloseButton: true,
        width: 400, 
        padding: '0.5rem',
        background: '#fdfdfd',
        timer: 5000, 
        timerProgressBar: true
    });
})()