const project = document.querySelectorAll(".project");
const popUp = document.querySelector(".popup");
const popupBody = document.querySelectorAll(".popup-body");
const popupClose = document.querySelectorAll(".popup .close");
const a = document.querySelectorAll(".popup-body a");

var popupActive = function (popupClick) {
  popupBody[popupClick].classList.add("active");
  popupBody.forEach(() => {
    var slideIndex = 1;
    showSlides(slideIndex);

    a.forEach((a) => {
      a.addEventListener("click", () => {
        a.classList.contains("prev") ? (n = -1) : (n = 1);
        showSlides((slideIndex += n));
      });
    });

    function showSlides(n) {
      var i;
      var popupImages = document.querySelectorAll(".popup-body.active img");
      if (n > popupImages.length) {
        slideIndex = 1;
      }
      if (n < 1) {
        slideIndex = popupImages.length;
      }
      for (i = 0; i < popupImages.length; i++) {
        popupImages[i].classList.remove("active");
      }
      popupImages[slideIndex - 1].classList.add("active");
    }
  });
};

project.forEach((project, i) => {
  project.addEventListener("click", () => {
    popUp.classList.add("active");
    popupActive(i);
  });
});

popupClose.forEach((closeBTn) => {
  closeBTn.addEventListener("click", () => {
    popupBody.forEach((body) => {
      popUp.classList.remove("active");
      body.classList.remove("active");
    });
  });
});

const toggelBtn = document.getElementById("switch");
const info_a = document.querySelector(".info-transform a");
const projects_header = document.querySelector(".projects-header");
const editProjects = document.querySelector("#editprojects");
const addProject = document.getElementById("add-project");
const h3 = document.querySelector(".edit-mode h3");
const profileForm = document.querySelector(".info-transform form");
const h3s = document.querySelectorAll(".info-transform h3");
const img = document.querySelector("#img1");

toggelBtn.addEventListener("click", () => {
  if (toggelBtn.checked) {
    projects_header.classList.add("active");
    info_a.classList.add("active");
    editProjects.classList.add("active");
    h3.classList.add("active");
    addProject.classList.add("active");
  } else {
    projects_header.classList.remove("active");
    info_a.classList.remove("active");
    editProjects.classList.remove("active");
    h3.classList.remove("active");
    addProject.classList.remove("active");
    profileForm.classList.remove("active");
    img.classList.remove("hide");
    h3s.forEach((h3) => {
      h3.classList.remove("hide");
    });
  }
});

function removeProject() {
  this.parentElement.remove();
}

const form = document.querySelector("#form");
addProject.onclick = function () {
  var divForm = document.createElement("div");
  divForm.setAttribute("class", "div-Form");
  form.appendChild(divForm);
  var input = document.createElement("input");
  input.setAttribute("type", "text");
  input.setAttribute("name", "theme_title[]");
  input.setAttribute("placeholder", "Project title");
  input.required = true;
  divForm.appendChild(input);
  let inputFiles = [];
  for (let i = 1; i <= 5; i++) {
    inputFiles["input" + i] = document.createElement("input");
    inputFiles["input" + i].setAttribute("type", "file");
    inputFiles["input" + i].setAttribute("id", "file");
    inputFiles["input" + i].setAttribute("accept", "image/*");
    inputFiles["input" + i].setAttribute("name", "theme" + i + "[]");
    inputFiles["input" + i].required = true;
    divForm.appendChild(inputFiles["input" + i]);
  }
  var removeBtn = document.createElement("a");
  removeBtn.innerHTML = "<i class='fa-solid fa-minus'></i> Rmove Project";
  removeBtn.setAttribute("class", "remove-btn");
  removeBtn.addEventListener("click", removeProject);
  divForm.appendChild(removeBtn);
};

editProjects.addEventListener("click", () => {
  const editProject = document.querySelectorAll("#edit");
  editProject.forEach((item) => {
    item.classList.toggle("active");
  });
});

function editProfile() {
  const profileForm = document.querySelector(".info-transform form");
  const h3s = document.querySelectorAll(".info-transform h3");
  const img = document.querySelector("#img1");
  profileForm.classList.toggle("active");
  img.classList.toggle("hide");
  h3s.forEach((h3) => {
    h3.classList.toggle("hide");
  });
}

var loadFile = function (event) {
  var output = document.getElementById("output");
  output.src = URL.createObjectURL(event.target.files[0]);
  output.onload = function () {
    URL.revokeObjectURL(output.src);
  };
};

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
