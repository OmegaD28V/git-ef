(async () => {
    const {value: pais} = await Swal.fire({
        showConfirmButton: false,  
        icon: 'info', 
        text: 'Restaurado', 
        backdrop: false, 
        toast: true, 
        position: 'center', 
        showCloseButton: false,
        width: 150, 
        padding: '0.5rem',
        background: '#fdfdfd',
        timer: 3000, 
        timerProgressBar: true
    });
})()