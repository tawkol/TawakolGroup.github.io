const profile = document.querySelector(".profile");
const profileDropdown = document.querySelector(".profile__dropdown");
const blacShadow = document.querySelector(".black__shadow");

// toggle profile //

document.onclick = function (e) {
  if (e.target.id !== "profileDropdown" && e.target.id !== "profile") {
    profileDropdown.classList.remove("active");
    profile.classList.remove("active");
  }
};

profile.addEventListener("click", () => {
  profileDropdown.classList.toggle("active");
  if (!profileDropdown.classList.contains("active")) {
    profileDropdown.classList.add("fade-out");
    setTimeout(() => {
      profileDropdown.classList.remove("fade-out");
    }, 300);
  }
});

// toggle sideBar //

const toggleSidebar = document.querySelector(".toggle__sidebar");
const sidebar = document.querySelector(".sidebar");
const sidebarSpans = document.querySelectorAll(".sidebar span");
const main = document.querySelector("main");
const smallScreenSidebar = document.querySelector(".small_screen_sidebar");

toggleSidebar.addEventListener("click", () => {
  if (window.innerWidth > "768") {
    toggleSidebar.classList.toggle("active");
    sidebar.classList.toggle("min");
    main.classList.toggle("active");
    sidebarSpans.forEach((span) => {
      if (sidebar.classList.contains("min")) {
        span.classList.add("fade-out");
        setTimeout(() => {
          span.classList.remove("fade-out");
        }, 300);
      }
      span.classList.toggle("hidden");
      !sidebar.classList.contains("min")
        ? span.classList.add("fade-in")
        : span.classList.remove("fade-in");
    });
  } else {
    toggleSidebar.classList.add("active");
    smallScreenSidebar.classList.add("active");
    blacShadow.classList.add("active");
    
  }
});

// active links
document.querySelectorAll(".sidebar ul li a").forEach((link) => {
  link.href === window.location.href
    ? link.classList.add("nav-active")
    : link.classList.remove("nav-active");
});
// small_screen_sidebar active links
document.querySelectorAll(".big ul li a").forEach((link) => {
  link.href === window.location.href
    ? link.classList.add("nav-active")
    : link.classList.remove("nav-active");
});

// small_screen_sidebar close()

document.querySelector('.small_screen_sidebar .start i').onclick = function close() {
  toggleSidebar.classList.remove("active");
  smallScreenSidebar.classList.remove("active");
  blacShadow.classList.remove("active");
}
