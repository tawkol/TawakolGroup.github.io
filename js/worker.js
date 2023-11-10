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
