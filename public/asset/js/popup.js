//POPUP Allergie
const allergyButton = document.querySelectorAll(".btn_allergy_popup");
const allergyPopup = document.querySelector(".child_allergy");
const filtre = document.querySelector(".filtre");
const popup = document.querySelector(".popup");
const popup2 = document.querySelector(".popup2");

allergyButton.forEach((e) => {
  e.addEventListener("click", function (e) {
    e.preventDefault();
    popup.style.display = "block";
    filtre.style.display = "block";
    allergyPopup.className = ".popup_display";
    allergyPopup.innerHTML += `<input style="display: none" type="text" name="fk_child" value="${this.id}">`;
    console.log(this.id);
  });
});

//Popup Maladie
const diseaseButton = document.querySelectorAll(".btn_disease_popup");
const diseasePopup = document.querySelector(".child_disease");

diseaseButton.forEach((e) => {
  e.addEventListener("click", function (e) {
    e.preventDefault();

    popup2.style.display = "block";
    filtre.style.display = "block";
    diseasePopup.className = ".popup_display";
    diseasePopup.innerHTML += `<input style="display: none" type="text" name="fk_child" value="${this.id}">`;
    console.log(this.id);
  });
});
