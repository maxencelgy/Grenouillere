console.log("popup.js");

/////////////////POPUP CHILD///////////////////
//POPUP Allergie
const allergyButton = document.querySelectorAll(".btn_allergy_popup");
const allergyPopup = document.querySelector(".child_allergy");
const filtre = document.querySelector(".filtre");
const croix = document.querySelectorAll(".fa-xmark");

const popup = document.querySelector(".popup");
const popup1 = document.querySelector(".popup1");
const popup3 = document.querySelector(".popup3");
const popup4 = document.querySelector(".popup4");

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
const popup2 = document.querySelector(".popup2");
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

croix.forEach((element) => {
  element.addEventListener("click", function (e) {
    e.preventDefault();
    console.log("cc");
    filtre.style.display = "none";
    popup2.style.display = "none";
    popup.style.display = "none";
  });
});

//////////////////Popup function/////////////////////////////

function popupFolder(btnClass, popupClass, form) {
  const popupBtn = document.querySelector("." + btnClass);
  const popupContainer = document.querySelector("." + popupClass);
  const popupForm = document.querySelector("." + form);

  popupBtn.addEventListener("click", function (e) {
    e.preventDefault();
    popupContainer.style.display = "block";
    filtre.style.display = "block";
    popupForm.className = ".popup_display";
    popupContainer.innerHTML += `<input style="display: none" type="text" name="" value="${this.id}">`;
  });
}

//Popup RIB
popupFolder("btn_rib_popup", "popup1", "rib_popup");

//Popup identity
popupFolder("btn_identity_popup", "popup2", "identity_popup");

//Popup certificate
popupFolder("btn_certificate_popup", "popup3", "certificate_popup");

//Popup Licence
popupFolder("btn_licence_popup", "popup4", "licence_popup");

//Popup Kbis
popupFolder("btn_kbis_popup", "popup5", "kbis_popup");
