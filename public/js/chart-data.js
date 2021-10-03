function success(pos) {
    var crd = pos.coords;
    $(".latitude").val(crd.latitude);
    $(".longitude").val(crd.longitude);
    $(".latitude").text(crd.latitude);
    $(".longitude").text(crd.longitude);

    var parameters = ["ALLSKY_SFC_UVA","ALLSKY_SFC_UVB"];
    var longitude = $('.longitude').val();
    var latitude = $('.latitude').val();
    var start = "2015";
    var end = "2018";
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

        new Chart(document.getElementById("solar_irradiance"), {
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
  




