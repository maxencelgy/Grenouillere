var map = L.map('map').setView([51.505, -0.09], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);


fetch('api_company.json',{
    headers : {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    }
})
    .then((response) => response.json())
    .then(res =>
        res.forEach(e => {
            console.log(e);
                L.marker([e.x_company, e.y_company]).addTo(map)
                .bindPopup(e.name_company + '<br>' + e.hourly_rate_company + '€/heure <br>' + '<br>' + e.adress_company + '<br>' + e.postal_code_company + '<br>' + e.city_company)
                .openPopup();
        })
    )

if(!navigator.geolocation){
    console.log("Geolocalisation non activée")
}else{
    navigator.geolocation.getCurrentPosition(getPosition)
}


function getPosition(position){
    // console.log(position)
    var lat = position.coords.latitude
    var long = position.coords.longitude
    var accuracy = position.coords.accuracy

    var marker = L.marker([lat, long])
    var circle = L.circle([lat, long], 1000)
    var featureGroup = L.featureGroup([marker, circle]).addTo(map)

    console.log("position : lat "+ lat +"long "+ long + "accuracy" + accuracy)
}

