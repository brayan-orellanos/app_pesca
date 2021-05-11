const formCaptura = document.getElementById('form_captura')
const namee = document.querySelector('#name_captura')
const embarcacion = document.getElementById('embarcacion')
const fechaLlegada = document.getElementById('fecha_llegada')
const fechaSalida = document.getElementById('fecha_salida')
const horaLlegada = document.getElementById('hora_llegada')
const horaSalida = document.getElementById('hora_salida')
const especie = document.getElementById('especie')
const presentacion = document.getElementById('presentacion')
const categoria = document.getElementById('categoria')
const ejemplares = document.getElementById('ejemplares')
const peso = document.getElementById('peso')
const valor = document.getElementById('valor')
const num_pescadores = document.getElementById('num_pescadores')

const metPro = document.getElementById('selects')
const tipEmb = document.getElementsByClassName('check')
const metPes = document.getElementById('selectd')
const zonaPes = document.getElementById('selectx')
let text = ''
let erP = document.getElementById('p')


const disables = [namee, embarcacion, metPro, metPes, zonaPes]
const dates = [namee, embarcacion, fechaLlegada, fechaSalida, horaLlegada, horaSalida, especie, presentacion, categoria, ejemplares, peso, valor, num_pescadores]

for(item in disables) {
    disables[item].disabled = true
}

for(i in tipEmb) {
    tipEmb[i].disabled = true
}

class newText {
    constructor(dato, text){
        this.dato = dato
        this.text = text
    }
    
    crearError() {    
            this.dato.style.border = '2px solid red'
            this.text = document.createElement('p')
            this.text.innerHTML = 'Este campo no puede estar vacio.'
            this.text.className = 'text-danger my-0 pt-1 textError'
            this.text.id = 'textError'
            this.dato.parentElement.appendChild(this.text)
    }


    quitarParrafo() {
        if(this.dato.nextElementSibling) {
            this.dato.style.border = ''
    
            this.dato.parentElement.removeChild(this.dato.parentElement.lastChild) 
        }

    }
}


formCaptura.addEventListener('submit', e => {
    for(item in dates) {
        if(dates[item].value.length < 1 || dates[item]. value < 1) {
            
            if(dates[item].nextElementSibling) {
                console.log('Hay errores')
            } else {
                let nuevoText = new newText(dates[item], parrafo)
                nuevoText.crearError()  
            }

            erP.className = 'bg-danger text-white p-2'
            erP.innerHTML = 'Hay campos que no deben estar vacios'

            e.preventDefault()
        } else {
            let nuevoText = new newText(dates[item], parrafo)
            nuevoText.quitarParrafo()
        }
    }
});