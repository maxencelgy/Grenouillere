const input = document.querySelector("#fullAdresse");
const parent = document.querySelector(".parentSearch");
const children = document.querySelector(".childrenSearch");

console.log(input);
let res;
input.addEventListener("keyup", (e) => {
  console.log(input.value);
  fetch("https://api-adresse.data.gouv.fr/search/?q=" + input.value)
    .then((response) => response.json())
    .then((response) => (res = JSON.stringify(response)))
    .catch((error) => console.log("Erreur : " + error))
    .then(function () {
      objRes = JSON.parse(res);
      children.innerHTML = "";

      Object.entries(objRes.features).forEach(([key, value]) => {
        children.style.display = "block";
        children.innerHTML += `
        <div class="infos">
            <span name='adress_company' class="adress_company">${objRes.features[key].properties.name}</span>
            <span name='city_company' class="city_company">${objRes.features[key].properties.city}</span>
            <span name='postal_code_company' class="postal_code_company">${objRes.features[key].properties.postcode}</span>
            <span style="display: none" name='x_company' class="x_company">${objRes.features[key].geometry.coordinates[0]}</span>
            <span style="display: none" name='y_company' class="y_company">${objRes.features[key].geometry.coordinates[1]}</span>
        <div>`;
      });
    })
    .then(function () {
      const infos = document.querySelectorAll(".infos");
      infos.forEach((info) => {
        info.addEventListener("click", (e) => {
          e.preventDefault();
          let adresse = info.children[0].textContent.trim();
          let ville = info.children[1].textContent.trim();
          let cp = info.children[2].textContent.trim();
          let x = info.children[4].textContent.trim();
          let y = info.children[3].textContent.trim();
          children.style.display = "none";
          input.value = adresse + ", " + ville + ", " + cp;
          children.innerHTML = `

                <div class="infos" style = "display: none">
                            <input  name='adress_company' class="adress_company" value="${adresse}"></input>
                            <input  name='city_company' class="city_company" value="${ville}"></input>
                            <input   name='postal_code_company' class="postal_code_company" value="${cp}"></input>
                            <input   name='x_company' class="x_company" value="${x}"></input>
                            <input   name='y_company' class="y_company" value="${y}"></input>
                </div>`;
        });
      });
    });
});
