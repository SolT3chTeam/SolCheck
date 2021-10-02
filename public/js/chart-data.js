$.get("https://power.larc.nasa.gov/api/temporal/daily/point",{
    parameters: "ALLSKY_SFC_UV_INDEX",
    community: "RE",
    longitude: "120.9828",
    latitude: "14.4506",
    start: "20210101",
    end: "20210531",
    form: "JSON",
}).done(function(data) {
    console.log(data)
});
