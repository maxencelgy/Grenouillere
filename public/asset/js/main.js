const burger = document.querySelector(".fa-bars");
const cross = document.querySelector(".cross");
const lien = document.querySelectorAll(".link");
const left = document.querySelectorAll(".logoA");
const right = document.querySelector("header .wrap .right");
const navbar = document.querySelector("#navbar");

burger.addEventListener("click", function (e) {
  e.preventDefault();

  right.style.width = "100%";
  right.style.justifyContent = "space-between";
  navbar.style.backgroundColor = "#C4C4C4";
  burger.classList.add("crossNone");
  left.forEach((element) => {
    element.classList.add("crossNone");
  });

  lien.forEach((element) => {
    element.classList.add("linkBlock");
  });

  cross.classList.remove("crossNone");
});

cross.addEventListener("click", function (e) {
  e.preventDefault();
  right.style.width = "";
  right.style.justifyContent = "";
  navbar.style.backgroundColor = "inherit";
  cross.classList.add("crossNone");
  left.forEach((element) => {
    element.classList.remove("crossNone");
  });

  lien.forEach((element) => {
    element.classList.remove("linkBlock");
  });
  burger.classList.remove("crossNone");
});
