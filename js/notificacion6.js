(async () => {
    const {value: pais} = await Swal.fire({
        showConfirmButton: false,  
        icon: 'info', 
        text: 'Ya existe una compra con esos datos!', 
        backdrop: false, 
        toast: false, 
        position: 'center', 
        showCloseButton: false,
        width: 400, 
        padding: '0.5rem',
        background: '#fdfdfd',
        backdrop: true, 
        showCloseButton: true, 
        timerProgressBar: true
    });
})()