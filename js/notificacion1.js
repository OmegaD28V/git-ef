(async () => {
    const {value: pais} = await Swal.fire({
        showConfirmButton: false,  
        icon: 'success', 
        text: 'Compra Cerrada!', 
        backdrop: false, 
        toast: true, 
        position: 'bottom', 
        showCloseButton: false,
        width: 150, 
        padding: '0.5rem',
        background: '#fdfdfd',
        timer: 3000
    });
})()