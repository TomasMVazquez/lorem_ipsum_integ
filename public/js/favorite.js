// obtenemos la cabecera CSRF
let header = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

//buscamos todos los formularios de los productos
let allForms = document.querySelectorAll('#theFavForm');
//Lo convertimos en array para poder recorrelo con el foreach
let arrayAllForms = Array.from(allForms);

arrayAllForms.forEach(function(form){
  //Saco los elementos del form
  let inputsArray = Array.from(form.elements);
  // variable del boton es el ultimo y lo saco con pop
  let btnFav = inputsArray.pop();
  // hijo del boton.
  let heart = btnFav.children[0];

  //Evento submit del form
  form.addEventListener('submit', function (e) {
    e.preventDefault(); //prevengo que se postee

    //Saco los valores de los elementos y los guardo en un obj literal
    let dataFav = {
      product_id: inputsArray[0].value,
      user_id: inputsArray[1].value,
    };

    //FormData() --> modelo que ya viene dado
    let dataToSend = new FormData();

    //fromJS --> para pegarlo en un JSON
    dataToSend.append('fromJS', JSON.stringify(dataFav));
    //Entiendo que el datasend es lo que envia JS en vez del post del form.
    //Dentro del obj FormData tiene un item que se llama fromJS que le estoy pasando los valores en JSON
    console.log(dataToSend.get('fromJS'));
    //hacemos el fetch al url product y le pasamos los methodos el body y el header que le pasamos el token
    window.fetch('http://localhost:8000/favorito', {
      method: 'post',
      body: dataToSend,
      headers: {'X-CSRF-TOKEN': header} // Para enviar data via fetch
    })
      .then(response => response.json())
      .then(rta => console.log(rta))
      .catch(error => console.log(error));

      //Le cambio la clase al corazon para que este lleno o vacio.
      if (heart.getAttribute('class') == 'far fa-heart') {
        heart.setAttribute('class','fas fa-heart')
      }else {
        heart.setAttribute('class','far fa-heart')
      }

  });
});
