const imagen = document.getElementById('imagen')
const lTotal = document.getElementById('lTotal')
let lEstandar = document.getElementById('lEstandar')
let lHorquilla = document.getElementById('lHorquilla')
const lis = document.getElementById('lista')
let form_datos = document.getElementById('form_datos')

lEstandar.addEventListener('blur', () => {
    let estandar = lTotal.value - (lTotal.value * 0.30)
    if (lEstandar.value > estandar) {
        alert('el pescado es solo cola o que hpt')
    }
})


const consulta = (val) => {
    if (val > 0) {
        imagen.setAttribute('src', `../img-peces/` + val + '.jpg')
    } else {
        imagen.setAttribute('src', '')
    }
    
    const data = new FormData(form_datos);
    fetch('../datos_biologicos/datos.php', {
            method: 'POST',
            body: data
        })
        .then(function (response) {
            if (response.ok) {
                return response.text()
            } else {
                throw "Error en la llamada Ajax";
            }

        })
        .then(function (texto) {
            console.log(texto);
        })
        .catch(function (err) {
            console.log(err);
        });

}

/*

let xhr = new XMLHttpRequest()
let fork = new FormData(form_datos)

xhr.open('POST', '../datos_biologicos/datos.php')
xhr.onload = () => {
    if(xhr.status === 200) {
        console.log(fork)
    } else {
        console.error('No se han podido enviar')
    }
}

xhr.send(fork)



let data = new FormData()
data.append('especie', 1)

fetch('datos.php', {
    method: 'POST',
    body: data
})
.then((Response) => {
    if(Response.ok) {
        return Response.text()
    } else {
        throw 'Error en la llamada'
    }
})
.then((texto) => {
    console.log(texto)
})
.catch((error) => {
    console.log(error)
})
*/