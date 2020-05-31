(async () => {
    const {value: pais} = await Swal.fire({
        showConfirmButton: false,  
        icon: 'success', 
        text: 'Actualizado', 
        backdrop: false, 
        toast: true, 
        position: 'center', 
        showCloseButton: false,
        width: 150, 
        padding: '0.5rem',
        background: '#fdfdfd',
        timer: 3000
    });
})()