  function success(pos) {
    var crd = pos.coords;

    $.get("https://api.opencagedata.com/geocode/v1/json?key=622b090a1bfe4e6bb9faae7342f56755&q="+crd.latitude+"%2C"+crd.longitude+"&pretty=1")
    .done(function(data) {
        $("#location").val(data.results[0].components.city);
    });

    $(".latitude").val(crd.latitude);
    $(".longitude").val(crd.longitude);
    $(".latitude").text(crd.latitude);
    $(".longitude").text(crd.longitude);
  }
  
  function error(err) {
    console.warn(`ERROR(${err.code}): ${err.message}`);
  }
  
  if(!navigator.geolocation) { 
      console.log("This browser does not support geolocation!");
  } else {
      navigator.geolocation.getCurrentPosition(success, error);
  }
  