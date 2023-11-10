const menuBtn = document.querySelector(".menu-btn");
const navigation = document.querySelector(".navigation");

menuBtn.addEventListener("click", () => {
  menuBtn.classList.toggle("active");
  navigation.classList.toggle("active");
});

const signinEvent = document.querySelector(".signin-event");
const signinDropDown = document.querySelector(".signin-dropdown");
const closeBtn = document.querySelector(".signin-close-btn");

signinEvent.addEventListener("click", () => {
  signinDropDown.classList.add("open");
  closeBtn.classList.add("open");
});

closeBtn.addEventListener("click", () => {
  signinDropDown.classList.remove("open");
  closeBtn.classList.remove("open");
});

const arrow = document.querySelector(".arrow");
const servicesMenu = document.querySelector(".services-dropdown");

arrow.addEventListener("click", () => {
  arrow.classList.toggle("active");
  servicesMenu.classList.toggle("active");
});

const passType = document.querySelector("#pass");
const passIcon = document.querySelector("#pass-icon");

function pass() {
  const type =
    passType.getAttribute("type") === "password" ? "text" : "password";
  passType.setAttribute("type", type);
  passIcon.classList.toggle("fa-eye");
}
let lastScrollTop = 0;
let nabar = document.getElementById("nav");
window.addEventListener("scroll", () => {
  const scrollTop = window.pageYOffset ;
  if (scrollTop > lastScrollTop) {
    nabar.style.top = "-80px";
  } else {
    nabar.style.top = "0";
  }
  // lastScrollTop = scrollTop;
});

function request() {
  const dropdown = document.querySelector(".dropdown");
  dropdown.classList.toggle("active");
}

function reqOpen(i) {
  const reqBtn = document.querySelectorAll(".reqbtn");
  const dropdownContent = document.querySelectorAll(".dropdown-content");
  dropdownContent[i].classList.add("active");
  reqBtn[i].classList.add("hide");
}

function reqBack(i) {
  const reqBtn = document.querySelectorAll(".reqbtn");
  const dropdownContent = document.querySelectorAll(".dropdown-content");
  dropdownContent[i].classList.remove("active");
  reqBtn[i].classList.remove("hide");
}