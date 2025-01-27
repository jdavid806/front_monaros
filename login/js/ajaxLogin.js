import { url } from '../../js/global.js';


// function validarUsuario(event) {
//     event.preventDefault();

//     let boton = document.getElementById("btn-enter");
//     boton.innerHTML = `<div class="spinner-border text-light" role="status">
//                         <span class="sr-only"></span>
//                       </div>`;
//     boton.disabled = true;

//     let user = document.getElementById("user").value;
//     let pass = document.getElementById("pass").value;

//     if (user === '' || pass === '') {
//         Swal.fire('Error', 'Por favor ingrese usuario y contraseña', 'error');
//         boton.innerHTML = `Acceder`;
//         boton.disabled = false;
//         return false;
//     }

//     const loginData = {
//         username: user,
//         password: pass,
//     };
//     const domain = window.location.hostname;

//     // Hacer la solicitud POST
//     fetch(url, {
//         method: "POST",
//         headers: {
//             "Content-Type": "application/json",
//             Accept: "application/json",
//             "X-Domain": domain,
//         },
//         body: JSON.stringify(loginData),
//         mode: "cors",
//     })
//     .then((response) => {
//         if (!response.ok) {
//             throw new Error("Error en la red: " + response.statusText);
//         }
//         return response.json();
//     })
//     .then((data) => {
//         if (data.message === "Authenticated") {
//             Swal.fire('Éxito', 'Usuario autenticado con éxito', 'success');
//             window.location.href = "Dashboard";
//         } else {
//             Swal.fire('Error', 'Usuario o contraseña incorrectos', 'error');
//         }
//         boton.innerHTML = `Acceder`;
//         boton.disabled = false;
//     })
//     .catch((error) => {
//         console.error("Error al hacer la solicitud:", error);
//         Swal.fire('Error', 'Hubo un problema con la autenticación', 'error');
//         boton.innerHTML = `Acceder`;
//         boton.disabled = false;
//     });
// }

function validarUsuario(event) {
    event.preventDefault();

    let boton = document.getElementById("btn-enter");
    boton.innerHTML = `<div class="spinner-border text-light" role="status">
                        <span class="sr-only"></span>
                      </div>`;
    boton.disabled = true;

    let user = document.getElementById("user").value;
    let pass = document.getElementById("pass").value;

    // Validación simple para evitar campos vacíos
    if (user === '' || pass === '') {
        Swal.fire('Error', 'Por favor ingrese usuario y contraseña', 'error');
        boton.innerHTML = `Acceder`;
        boton.disabled = false;
        return false;
    }

    // Aquí permitimos el ingreso con cualquier usuario
    Swal.fire('Éxito', 'Usuario autenticado con éxito', 'success');
    window.location.href = "Dashboard";

    boton.innerHTML = `Acceder`;
    boton.disabled = false;
}


// Asignar el evento al botón cuando el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", function() {
    const boton = document.getElementById("btn-enter");
    boton.addEventListener("click", validarUsuario);
});
