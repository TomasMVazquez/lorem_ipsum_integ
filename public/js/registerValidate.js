// Capturo el formulario
var theForm = document.querySelector('.theForm');
var thePass = document.querySelector('input[name=password]');


// Capturo los campos del formulario y convirtiendo a un array
var allElements = Array.from(theForm.elements);


// Sacando al último elemento de un array - boton submit
allElements.pop();

// Sacando al último elemento de un array - boton volver
allElements.pop();

// Sacando al último elemento de un array - boton recordarme
allElements.pop();

var elementsFilter = allElements.filter(function(oneElement){
    return oneElement.name !== 'subcategories[]' && oneElement.name !== 'notifications';
});



// Regex para email
var regexEmail = /\S+@\S+\.\S+/;

// Objeto que acumula los errors
var errors = {};

// Asignando el evento blur a TODOS los campos del array
elementsFilter.forEach(function (oneElement) {
	// div del error
	var divError = null;

	// capturo al div del mensaje de error de éste campo
	if (oneElement.type !== 'file') {
		divError = oneElement.nextElementSibling;
	} else {
		divError = oneElement.parentElement.nextElementSibling;
	}

	oneElement.addEventListener('blur', function () {
		// capturo el value del campo
		var elementValue = oneElement.value.trim();

		// valido si el campo está vacío
		if (elementValue === '' && oneElement.name !== 'avatar' && oneElement.name !== 'province') {
			this.classList.add('is-invalid'); // agrego clase is-invalid
			divError.style.display = 'block'; // muestro el div del error
			divError.innerText = `Este campo es obligatorio`; // seteo el texto del error en si

			// Sumar una key al objeto de errors
			errors[this.name] = true;
		} else {
			// Si no está vacío revierto lo anterior
			this.classList.remove('is-invalid');
			divError.style.display = 'none';
			divError.innerText = '';

			// Si no hay error elimino la key en el objeto de errors
			delete errors[this.name];

			// Si el campo es el de email
			if (this.name === 'email') {
				// valido que el texto sea un formato de email válido
				if (!regexEmail.test(elementValue)) {
					this.classList.add('is-invalid'); // agrego clase is-invalid
					divError.style.display = 'block'; // muestro el div del error
					divError.innerText = `Ingresá un email válido`; // seteo el texto del error en si

					// Sumar una key al objeto de errors
					errors[this.name] = true;
				} else {
					// Si es un formato de email válido
					this.classList.remove('is-invalid');
					divError.style.display = 'none';
					divError.innerText = '';
				}
			}

			// Si el campo es el de la pass
			if (this.name === 'password') {
				// valido que el texto sea mayor a 5 caracteres y tenga DH
				if (elementValue.length < 5 || elementValue.match(/DH/g) === null) {
					this.classList.add('is-invalid'); // agrego clase is-invalid
					divError.style.display = 'block'; // muestro el div del error
					divError.innerText = `La contraseña debe tener al menos 5 caracteres y contener las letras DH`; // seteo el texto del error en si

					// Sumar una key al objeto de errors
					errors[this.name] = true;
				} else {
					// Si es un formato de pass valida
					this.classList.remove('is-invalid');
					divError.style.display = 'none';
					divError.innerText = '';
				}


			}

			// Si el campo es el de la confirmacion de la pass
			if (this.name === 'password_confirmation') {
				// valido que la pass sea igual a la confirmacion
				if (elementValue !== thePass.value) {
					this.classList.add('is-invalid'); // agrego clase is-invalid
					divError.style.display = 'block'; // muestro el div del error
					divError.innerText = `La confirmación no coincide con la contaseña elegida`; // seteo el texto del error en si

					// Sumar una key al objeto de errors
					errors[this.name] = true;
				} else {
					// Si coincide con la pass
					this.classList.remove('is-invalid');
					divError.style.display = 'none';
					divError.innerText = '';
				}
			}


		}

		console.log(errors);
	});




	// Si el campo es el de avatar
	if (oneElement.name === 'avatar') {
		oneElement.addEventListener('change', function () {
			// obtenemos el nombre del archivo
			var nombreArchivo = this.value.split('\\').pop();
			//this.nextElementSibling.innerText = nombreArchivo;

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

				// Sumar una key al objeto de errors
				errors[this.name] = true;
			} else {
				this.classList.remove('is-invalid');
				divError.style.display = 'none';
				divError.innerText = '';

				// Elimino la key al objeto de errors
				delete errors[this.name];
			}
		})
	}
});


// Valido cuando se envíe el formulario
theForm.addEventListener('submit', function (event) {
	elementsFilter.forEach(function (oneElement) {
		var valorFinalDelCampo = oneElement.value.trim();

		if (valorFinalDelCampo === '' && oneElement.name !== 'avatar' && oneElement.name !== 'province') {
			errors[oneElement.name] = true;
			console.log(errors[oneElement.name]);
		}
	});

	if (Object.keys(errors).length > 0) {
		alert('Campos vacíos');
		console.log(errors);
		console.log(elementsFilter);
		event.preventDefault();
	}
})
