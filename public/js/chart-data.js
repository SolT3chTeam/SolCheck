var parameters = ["ALLSKY_SFC_UVA"];
var barchart;

var start = "2015";
var end = "2020";

function success(pos) {
    var crd = pos.coords;
    $(".latitude").val(crd.latitude);
    $(".longitude").val(crd.longitude);
    $(".latitude").text(crd.latitude);
    $(".longitude").text(crd.longitude);

    var longitude = $('.longitude').val();
    var latitude = $('.latitude').val();

    $.get("http://localhost/solcheck/public/api/get-api-data",{
        url: `https://power.larc.nasa.gov/api/temporal/monthly/point?parameters=${parameters.toString()}&community=RE&longitude=${longitude}&latitude=${latitude}&start=${start}&end=${end}&format=JSON`,
    }).done(function(data) {
        var dataset = JSON.parse(data['data']).properties.parameter;
        var testDataSets = [];

        var counter = 0;
        Object.values(dataset).forEach(function(row){
            testDataSets.push({
                "label": parameters[counter],
                "data": row,
                "fill": false,
                "borderColor": `rgb(${Math.floor((Math.random() * 255) + 1)}, ${Math.floor((Math.random() * 255) + 1)}, ${Math.floor((Math.random() * 255) + 1)})`,
                "lineTension": 0.5
            });
            counter++;
        });

        barchart = new Chart(document.getElementById("solar_irradiance"), {
            "type": "line",
            "data": {
                "datasets": testDataSets
            },
            "options": {}
        });
    });

  }
  
  function error(err) {
    console.warn(`ERROR(${err.code}): ${err.message}`);
  }
  
  if(!navigator.geolocation) { 
      console.log("This browser does not support geolocation!");
  } else {
      navigator.geolocation.getCurrentPosition(success, error);
  }

  $(".solar-irradiance-filter").on('click', function(e){
    if ($(this).is(":checked")){
        parameters.push($(this).val());
        getApiData(parameters, start, end);
    } else {
        const index = parameters.indexOf($(this).val());
        if (index > -1){
            parameters.splice(index, 1);
            console.log(parameters);
            getApiData(parameters, start, end);
        }
    }
  });

  $(".from").on("change", function(){
      start = $(this).val();
      getApiData(parameters, start, end);
  })

  $(".to").on("change", function(){
      end = $(this).val();
      getApiData(parameters, start, end);
  })

  function getApiData(providedParameters, startYear, endYear){
    var longitude = $('.longitude').val();
    var latitude = $('.latitude').val();

    console.log(providedParameters);
    $.get("http://localhost/solcheck/public/api/get-api-data",{
        url: `https://power.larc.nasa.gov/api/temporal/monthly/point?parameters=${providedParameters.toString()}&community=RE&longitude=${longitude}&latitude=${latitude}&start=${startYear}&end=${endYear}&format=JSON`,
    }).done(function(data) {
        var dataset = JSON.parse(data['data']).properties.parameter;
        var testDataSets = [];

        var counter = 0;
        Object.values(dataset).forEach(function(row){
            testDataSets.push({
                "label": parameters[counter],
                "data": row,
                "fill": false,
                "borderColor": `rgb(${Math.floor((Math.random() * 255) + 1)}, ${Math.floor((Math.random() * 255) + 1)}, ${Math.floor((Math.random() * 255) + 1)})`,
                "lineTension": 0.5
            });
            counter++;
        });
        
        barchart.destroy();
        barchart = new Chart(document.getElementById("solar_irradiance"), {
            "type": "line",
            "data": {
                "datasets": testDataSets
            },
            "options": {}
        });
    });
  }

