var selectCountries = document.querySelector('select[name=country]');
var divSelectProvince = document.querySelector('.selectProvince');
var paisDelUsuario = document.querySelector('[name=pais_del_usuario]');


if (paisDelUsuario != undefined) {
  if (paisDelUsuario.value == 'AR') {
    divSelectProvince.style.display = 'block';
  }
}





fetch('https://restcountries.eu/rest/v2/all')
  .then(function (response) {
    return response.json();
  })

  .then(function (countries) {
    for (country of countries) {
      var option = document.createElement('option');
      var optionText = document.createTextNode(country.name);
      option.value = country.alpha2Code;
      if (paisDelUsuario != undefined) {
        if (paisDelUsuario.value == country.alpha2Code) {
          option.setAttribute('selected', 'true')
        }
      }
      option.append(optionText);
      selectCountries.append(option);
    }
  })

  .catch(function(error) {
    console.log(error);
  })


selectCountries.onchange = function () {
  if (this.options[this.selectedIndex].value == "AR") {
    divSelectProvince.style.display = 'flex';
  } else if (this.options[this.selectedIndex].value !== "AR") {
    divSelectProvince.style.display = 'none';
  };
}
