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
                .bindPopup(e.name_company + '<br>' + e.adress_company + '<br>' + e.postal_code_company + '<br>' + e.city_company)
                .openPopup();
        })
    )





