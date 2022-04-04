console.log("popup.js");

/////////////////POPUP CHILD///////////////////
//POPUP Allergie
const allergyButton = document.querySelectorAll(".btn_allergy_popup");
const allergyPopup = document.querySelector(".child_allergy");

allergyButton.forEach(e => {
    e.addEventListener("click", function (e) {
        e.preventDefault()
        allergyPopup.className = ".popup_display"
        allergyPopup.innerHTML += `<input style="display: none" type="text" name="fk_child" value="${this.id}">`
        console.log(this.id)
    })
})

//Popup Maladie
const diseaseButton = document.querySelectorAll(".btn_disease_popup");
const diseasePopup = document.querySelector(".child_disease");

diseaseButton.forEach(e => {
    e.addEventListener("click", function (e) {
        e.preventDefault()
        diseasePopup.className = ".popup_display"
        diseasePopup.innerHTML += `<input style="display: none" type="text" name="fk_child" value="${this.id}">`
        console.log(this.id)
    })
})

//////////////////Popup function/////////////////////////////

function popup(btnClass, popupClass){
    const popupBtn = document.querySelector("." + btnClass);
    const popupContainer = document.querySelector("." + popupClass);


    popupBtn.addEventListener("click", function (e) {
        e.preventDefault()
        popupContainer.className = ".popup_display"
        popupContainer.innerHTML += `<input style="display: none" type="text" name="" value="${this.id}">`
    })
}

//Popup RIB
popup("btn_rib_popup", "rib_popup");

//Popup identity
popup("btn_identity_popup", "identity_popup");

//Popup certificate
popup("btn_certificate_popup","certificate_popup");

//Popup Licence
popup("btn_licence_popup", "licence_popup");

//Popup Kbis
popup("btn_kbis_popup", "kbis_popup");