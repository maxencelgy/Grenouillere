//SINGLE RESULTS

var mapSingle = L.map('mapSingle');

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mapSingle);

var professionalIcon = L.icon({
    iconUrl: '../../asset/img/mapIcon/professional.png',
    iconSize: [30, 40],
})

fetch('../../api_company.json',{
    headers : {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    }
})
    .then((response) => response.json())
    .then(res =>
        res.forEach(e => {
            L.marker([e.x_company, e.y_company],{icon:professionalIcon}).addTo(mapSingle)
            mapSingle += mapSingle.setView([e.x_company, e.y_company], 16);
        })
    )
