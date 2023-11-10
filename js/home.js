let counter = 1;
setInterval(() => {
  document.querySelector(".show").classList.remove("show");
  document.querySelector(".show").classList.remove("show");
  const article = document.querySelector(`.content-${counter}`);
  const img = document.querySelector(`.img-${counter}`);
  article.classList.add("show");
  img.classList.add("show");
  counter++;

  if (counter > 3) {
    counter = 1;
  }
}, 3000);

const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      entry.target.classList.toggle("show", entry.isIntersecting);
      if (entry.isIntersecting) observer.unobserve(entry.target);
    });
  },
  {
    rootMargin: "0px",
    threshold: [0.5, 0],
  }
);

const hiddenElements = document.querySelectorAll(".hidden");
hiddenElements.forEach((el) => {
  observer.observe(el);
});
