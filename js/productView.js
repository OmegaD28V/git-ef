// const proView1 = document.getElementById('view1');
// const proView2 = document.getElementById('view2');

// // El valor del item proView será 1 para lista y 0 para fichas

// document.addEventListener('DOMContentLoaded', () => {
//     // Obtener la vista actual
//     if (localStorage.getItem('proView') === '1') {
//         console.log('lista');
//     }else{
//         console.log('fichas');
//     }
// })

// if (proView1 && proView2) {
//     proView1.addEventListener('click', () => {
//         // Guardar el modo actual en el localStorage
//         proView1.value = '1';
//         proView2.value = '0';

//         if (proView1.value = '1') {
//             localStorage.setItem('proView', '1');
//         }else{
//             localStorage.setItem('proView', '0');
//         }

//         var valView = proView1.val();
//         var dataView = new FormData();
//         dataView.append("dataView", valView);

//         $.ajax({
//             url: "index.php", 
//             method: "post", 
//             data: dataView, 
//             cache: false, 
//             contentType: false, 
//             processData: false, 
//             dataType: "json", 
//             success: function(respuesta){
//                 if (respuesta) {
//                     console.log('success');
//                 }
//             }
//         });
//     })

//     proView2.addEventListener('click', () => {
//         // Guardar el modo actual en el localStorage
//         proView1.value = '0';
//         proView2.value = '1';

//         if (proView2.value = '1') {
//             localStorage.setItem('proView', '0');
//         }else{
//             localStorage.setItem('proView', '1');
//         }
//     })
// }