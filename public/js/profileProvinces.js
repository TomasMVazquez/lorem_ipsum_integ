var selectProvinces = document.querySelector('select[name=province]');
var userProvince = document.querySelector('[name=userProvince]');

fetch('https://dev.digitalhouse.com/api/getProvincias')
  .then(function (response) {
    return response.json();
  })

  .then(function (provinces) {
    console.log(provinces);
    for (province of provinces['data']) {
      var option = document.createElement('option');
      var optionText = document.createTextNode(province.state);
      option.value = province.state;
      if(userProvince != undefined){
        if (userProvince.value == province.state) {
        option.setAttribute('selected', 'true');
        }; 
      }
      option.append(optionText);
      selectProvinces.append(option);
    }
  })

  .catch(function(error) {
    console.log(error);
  })
