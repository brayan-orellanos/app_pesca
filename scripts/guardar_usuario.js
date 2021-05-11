//import Modal from '../bootstrap.bundle.js'
const form = document.getElementById('form_new_user')
const nuevoNombre = document.querySelector('#ins_name')
const nameEmb = document.getElementById('ins_emb')
const metod_prop = document.getElementById('selects2')
const check1 = document.getElementById('checkd1')
const check2 = document.getElementById('checkd2')
const parentSelect = document.getElementById('checks2')
const metod_pes = document.getElementById('metodo_pes2')
const zona_pesca = document.getElementById('zona_pesca')
const caballosF = document.getElementById('caballos_fuerza')
let parrafo = ''

const datos = [nuevoNombre, nameEmb, metod_prop, metod_pes, zona_pesca, caballosF]
const disab = [metod_prop, metod_pes, zona_pesca, caballosF]

/*
const xhr = new XMLHttpRequest()
let test = document.getElementById('test')
let modal = bootstrap.Modal.getInstance(myModal)
let myModal = new bootstrap.Modal(document.getElementById('myModal'), {
    keyboard: true
})
*/

for(item in disab) {
    disab[item][0].disabled = true
}

class newParrafo {
    constructor(dato, parrafo){
        this.dato = dato
        this.parrafo = parrafo
    }
    
    crearError() {    
            this.dato.style.border = '2px solid red'
            this.parrafo = document.createElement('p')
            this.parrafo.innerHTML = 'Este campo no puede estar vacio.'
            this.parrafo.className = 'text-danger py-1 textError'
            this.parrafo.id = 'textError'
            this.dato.parentElement.appendChild(this.parrafo)
    }


    quitarParrafo() {
        if(this.dato.nextElementSibling) {
            this.dato.style.border = ''
    
            this.dato.parentElement.removeChild(this.dato.parentElement.lastChild) 
        }

    }
}


form.addEventListener('submit', e => {

    for(item in datos) {
        if(datos[item].value.length < 1 || datos[item].value < 1) {
            
            if(!(datos[item].nextElementSibling)) {
                let nuevoParrafo = new newParrafo(datos[item], parrafo)
                nuevoParrafo.crearError()  
            }
                        
            e.preventDefault()
        } else {
            let nuevoParrafo = new newParrafo(datos[item], parrafo)
            nuevoParrafo.quitarParrafo()
        }
    }

    if(check1.checked === false && check2.checked === false) {
        if(!(parentSelect.nextElementSibling)) {
            parrafo = document.createElement('p')
            parrafo.innerHTML = 'Debe seleccionar una de las opciones.'
            parrafo.className = 'text-danger py-1 textError'
            parrafo.id = 'textError'
            parentSelect.parentElement.appendChild(parrafo)  
        }

        e.preventDefault()
    } else {
        let nuevoParrafo = new newParrafo(parentSelect, parrafo)
        nuevoParrafo.quitarParrafo()
    }  

/*
    const fork = new FormData(form)

    xhr.open('POST', '../captura/insert_emb.php')
    xhr.onload = () => {
        if(xhr.status === 200) {
            test.innerHTML = 'Los datos se han guardado correctamente'
            test.className = 'bg-success p-2 text-white m-0'
            //myModal.hide();
        } else {
            test.innerHTML = 'Los datos se han podido enviar'
            test.className = 'bg-danger p-2 text-white m-0'
            //myModal.hide();
        }
    }

    xhr.send(fork)
    e.preventDefault()
*/
})


metod_prop.addEventListener('change', (val=metod_prop.value) => {
    if(val != 0 ) {
        caballosF.parentElement.style.display = 'block'
    } else {
        caballosF.parentElement.style.display = 'none'
    }
    console.log(val)
})