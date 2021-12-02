function validar(event) {
    email = document.getElementById('email').value
    divmail = document.getElementById('divmail')
    cajamail = document.getElementById('cajamail')
    cajapass = document.getElementById('cajapass')
    divpass = document.getElementById('divpass')
    pass = document.getElementById('pass').value
    mensaje1 = document.getElementById('mensaje1')
    mensaje2 = document.getElementById('mensaje2')
    if (pass == '') {
        // alert('Campo pass obligatorio');
        mensaje2.innerHTML = 'Debe introducir una contraseña'
        event.preventDefault()
        cajapass.classList.add("caja_roja");
    }
    if (email == '') {
        // alert('Campo mail obligatorio');
        mensaje1.innerHTML = 'Debe introducir un email'
        event.preventDefault()
        cajamail.classList.add("caja_roja");
    } else if (!(/^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/.test(email))) {
        mensaje1.innerHTML = 'Debe introducir un email válido'
        event.preventDefault();
        cajamail.classList.add("caja_roja");
    }
}