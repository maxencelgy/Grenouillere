//POPUP Allergy
const button = document.querySelector(".btn_allergy_popup");
const allergyPopup = document.querySelector("#child_allergy");

button.addEventListener("click", function (e) {
  e.preventDefault();
  allergyPopup.className = ".popup_display";
  allergyPopup.innerHTML += `<input style="display: none" type="text" name="fk_child" value="${this.id}">`;
  console.log(this.id);
});
