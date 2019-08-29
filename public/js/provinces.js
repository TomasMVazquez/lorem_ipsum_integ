var selectProvinces = document.querySelector('select[name=province]');


fetch('https://dev.digitalhouse.com/api/getProvincias')
  .then(function (response) {
    return response.json();
  })

  .then(function (provinces) {
    console.log(provinces);
    for (province of provinces['data']) {
      var option = document.createElement('option');
      var optionText = document.createTextNode(province.state);
      option.append(optionText);
      option.value = province.state;
      selectProvinces.append(option);
    }
  })

  .catch(function(error) {
    console.log(error);
  })
