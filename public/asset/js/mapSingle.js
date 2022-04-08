//SINGLE RESULTS

var mapSingle = L.map('mapSingle');
let id_company = document.querySelector("#idCompany_js");

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
            let tab_asso ={
                "id_company":e.id_company,
                "tab": e
            }

            if (tab_asso.id_company === id_company.innerHTML){
                L.marker([tab_asso.tab.x_company, tab_asso.tab.y_company],{icon:professionalIcon}).addTo(mapSingle)
                mapSingle += mapSingle.setView([tab_asso.tab.x_company, tab_asso.tab.y_company], 16);
            }
        })
    )
