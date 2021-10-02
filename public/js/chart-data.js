

$.get("http://localhost/solcheck/public/api/get-data",{
    name: "ALLSKY_SFC_UV_INDEX",
}).done(function(data) {
    console.log(JSON.parse(data))
});
