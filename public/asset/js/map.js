var map = L.map('map').setView([51.505, -0.09], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// var tabCoord =
//     [[48.1162, -1.6767], [48.1129, -1.6756], [48.1114, -1.6773], [48.1191, -1.6811],
//     [48.1149, -1.6757], [48.1164, -1.6783],
//     [48.1158, -1.6743], [48.1104, -1.6823],
//     [48.1189, -1.6745], [48.1105, -1.6776],
//     [48.1108, -1.6760], [48.1198, -1.6752],
//     [48.1169, -1.6828], [48.1151, -1.6795],
//     [48.1105, -1.6810], [48.1109, -1.6831],
//     [48.1185, -1.6788], [48.1122, -1.6781],
//     [48.1168, -1.6747], [48.1162, -1.6824]];

// tabCoord.forEach(e => {
//     L.marker(e).addTo(map)
//         .bindPopup('PopUp.<br> Description globale.')
//         .openPopup();
// })




fetch('http://localhost:8080/api').then(response => {
    return response;
}).then(data => {
    console.log(data);
}).catch(err => {
    console.log("Encore une erreur de MERDE : " + err);
});



