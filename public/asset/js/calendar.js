const slot = document.querySelectorAll(".slot");
const days = document.querySelectorAll(".day");
const submit = document.querySelector("#send");
const response = document.querySelector("#response");

slot.forEach((e) => {
  e.addEventListener("click", function (e) {
    e.preventDefault();

    this.classList.toggle("clicked");
  });
});

submit.addEventListener("click", function (e) {
  const table = [];
  e.preventDefault();
  days.forEach((element) => {
    // console.log(element.innerText.substr(0, 10));
    let children = element.lastElementChild.children;

    Object.entries(children).forEach(([key, value]) => {
      if (value.classList[1] == "clicked") {
        let number = parseInt(key) + 1;
        let date = value.firstElementChild.innerText;
        table.push(number);

        response.innerHTML += `
          <input type="text" name="fk_company" value="6">
          <input type="text" name="child_remaining_slot" value="4">
          <input  type="text" name="fk_planning_${key}" value="${number}">
          <input  type="text" name="date_slot_${key}" value="${date}">
          `;

        // for (let i = 0; i < 4; i++) {
        //   response.innerHTML += `
        //   <input  type="text" name="fk_planning_${i}" value="${number}">
        //   <input  type="text" name="date_slot_${i}" value="${date}">
        //   `;
        // }
      }
    });
  });
  response.innerHTML += `<input type="submit" value="Valider">`;
  console.log(table.length);
});
