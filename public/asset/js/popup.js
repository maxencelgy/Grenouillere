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
