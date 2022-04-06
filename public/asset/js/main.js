const burger = document.querySelector(".fa-bars");
const cross = document.querySelector(".cross");
const lien = document.querySelectorAll(".link");

burger.addEventListener("click", function (e) {
  e.preventDefault();
  burger.classList.add("crossNone");
  lien.forEach((element) => {
    element.classList.add("linkBlock");
  });

  cross.classList.remove("crossNone");
});

cross.addEventListener("click", function (e) {
  e.preventDefault();
  cross.classList.add("crossNone");
  lien.forEach((element) => {
    element.classList.remove("linkBlock");
  });
  burger.classList.remove("crossNone");
});
