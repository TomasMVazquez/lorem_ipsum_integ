// Capturo el formulario
var elFormu = document.querySelector('#editForm');

var losCampos2 = getElements();

let btnImgAdd = document.querySelector('#btnImgAdd');

let rowImg = document.querySelector('#rowImg');

let divImg = document.querySelectorAll('.imgFormGroup');

let trashImg = document.querySelectorAll('#trash');

trashImg.forEach(function (unTrash) {
  unTrash.addEventListener('click',function(){
    unTrash.previousElementSibling.children[0].style.border = "1px solid red";
    var id = unTrash.previousElementSibling.children[0].getAttribute('id');
    console.log(id);
    window.fetch('http://localhost:8000/removeImg/' + id, {
      method: 'get'
    })
      .then(response => response.json())
      .then(rta => console.log(rta))
      .catch(error => console.log(error));
  });
});
// Objeto que acumula los errores
var errores = {};

recorrer();
var i = 1;
btnImgAdd.addEventListener('click',function () {
  console.log('hiciste click ' + i);
  var div = document.createElement('div');
  div.setAttribute('class','col-10 col-md-6 col-lg-3 imgFormGroup');

  var secondDiv = document.createElement('div');
  secondDiv.setAttribute('class','custom-file');
  secondDiv.setAttribute('id','imgAdd');

  var inpImg = document.createElement('input');
  inpImg.setAttribute('class','custom-file-input');
  inpImg.setAttribute('type','file');
  inpImg.setAttribute('name','image' + i);

  var lblImg = document.createElement('label');
  lblImg.setAttribute('class','custom-file-label');
  lblImg.innerText = 'Elegir imagen...'

  var thirdDiv = document.createElement('div');
  thirdDiv.setAttribute('class','invalid');

  secondDiv.append(inpImg);
  secondDiv.append(lblImg);
  div.append(secondDiv);
  div.append(thirdDiv);

  rowImg.append(div);

  losCampos2 = getElements();
  recorrer();
});

function getElements () {
  // Capturo los campos del formulario y convirtiendo a un array
  var losCampos = Array.from(elFormu.elements);
  // Sacando al último elemento de un array
  losCampos.pop();
  var toReturn = [];
  losCampos.forEach(function (unCampo) {
    if (unCampo.type !== 'button') {
      toReturn.push(unCampo);
    }
  });

  return toReturn;
}

function recorrer() {
  // Asignando el evento blur a TODOS los campos del array
  losCampos2.forEach(function (unCampo) {

    // div del error
    var divError = null;
    // capturo al div del mensaje de error de éste campo
    if (unCampo.type !== 'file') {
      divError = unCampo.nextElementSibling;
    } else {
      divError = unCampo.parentElement.nextElementSibling;
    }

    unCampo.addEventListener('blur', function () {
  		// capturo el value del campo
  		var valorDelCampo = unCampo.value.trim();

  		// valido si el campo está vacío
  		if (valorDelCampo === '') {
  			this.classList.add('is-invalid'); // agrego clase is-invalid
  			divError.style.display = 'block'; // muestro el div del error
  			divError.innerText = `Este campo es obligatorio`; // seteo el texto del error en si

  			// Sumar una key al objeto de errores
  			errores[this.name] = true;
  		} else {
  			// Si no está vacío revierto lo anterior
  			this.classList.remove('is-invalid');
  			divError.style.display = 'none';
  			divError.innerText = '';

  			// Si no hay error elimino la key en el objeto de errores
  			delete errores[this.name];
  		}

  		console.log(errores);
  	});

    // Si el campo es el de image
    if (unCampo.type === 'file') {
      unCampo.addEventListener('change', function () {
        // obtenemos el nombre del archivo
        var nombreArchivo = this.value.split('\\').pop();
        this.nextElementSibling.innerText = nombreArchivo

        // sacamos la extensión del archivo
        var extensionArchivo = this.value.split('.').pop();

        // Array de extensiones permitidas
        var extensionesAceptadas = ['jpg', 'jpeg', 'png'];
        /*
          Buscamos la extensión del archivo actual en nuestro array de extensiones permitidas
          Si no se encuentra la extensión dentro de nuestro array retorna undefined
        */
        var extensionEncontrada = extensionesAceptadas.find(function (ext) {
          return ext === extensionArchivo;
        });

        // Validamos la extensión
        if (extensionEncontrada === undefined) {
          // Si la extensión no es ninguna de la permitida
          this.classList.add('is-invalid');
          divError.style.display = 'block';
          divError.innerText = 'Formato inválido. Los formatos soportados son jpg, jpeg y png';

          // Sumar una key al objeto de errores
          errores[this.name] = true;
        } else {
          this.classList.remove('is-invalid');
          divError.style.display = 'none';
          divError.innerText = '';

          // Elimino la key al objeto de errores
          delete errores[this.name];
        }
      });
    }
  });
}

// Valido cuando se envíe el formulario
elFormu.addEventListener('submit', function (event) {
  var camposFinal = getElements();
  camposFinal.forEach(function (unCampo) {
		var valorFinalDelCampo = unCampo.value.trim();

		if (valorFinalDelCampo === '') {
			errores[unCampo.name] = true;
		}
	});

	if (Object.keys(errores).length > 0) {
		alert('Campos vacíos');
		console.log(errores);
		event.preventDefault();
	}
})
