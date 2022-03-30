
const input = document.querySelector('#fullAdresse')
const parent = document.querySelector('.parentSearch')
const children = document.querySelector('.childrenSearch')
console.log(input)
let res;
addEventListener('keyup', e => {
    console.log(input.value)
    fetch("https://api-adresse.data.gouv.fr/search/?q="+input.value)
        .then(response => response.json())
        .then(response =>  res = (JSON.stringify(response)))
        .catch(error => console.log("Erreur : " + error))
        .then(function(){
            objRes = JSON.parse(res);
            children.innerHTML = ''
            for(let i = 0; i<5; i++){
                console.log(objRes.features[i])
                children.innerHTML += `
                    <div class="infos">
                        <span name='adress_company' class="adress_company">${objRes.features[i].properties.name}</span>
                        <span name='city_company' class="city_company">${objRes.features[i].properties.city}</span>
                        <span name='postal_code_company' class="postal_code_company">${objRes.features[i].properties.postcode}</span>                        
                        <span name='x_company' class="x_company">${objRes.features[i].geometry.coordinates[0]}</span>
                        <span name='y_company' class="y_company">${objRes.features[i].geometry.coordinates[1]}</span>                  
                    <div>`
            }
        })
        .then(function(){
            const infos = document.querySelectorAll('.infos')
            console.log(infos)
            infos.forEach((info) => {
                info.addEventListener('click',e => {
                    let adresse  = info.children[0].textContent.trim()
                    let ville    = info.children[1].textContent.trim()
                    let cp       = info.children[2].textContent.trim()
                    let x        = info.children[3].textContent.trim()
                    let y        = info.children[4].textContent.trim()
                    input.value = adresse+', '+ville+', '+cp
                    children.innerHTML = `
                    <div class="children">
                        <div style='display: none class="infos">
                            <input style='display: none' name='adress_company' class="adress_company">${adresse}</input>
                            <input style='display: none' name='city_company' class="city_company">${ville}</input>
                            <input style='display: none' name='postal_code_company' class="postal_code_company">${cp}</input>                        
                            <input style='display: none' name='x_company' class="x_company">${x}</input>
                            <input style='display: none' name='y_company' class="y_company">${y}</input>          
                        <div>
                    </div>                  
                    `
                })
            })
        })
})
