const signupBtn = document.getElementById("signup-btn");
const signinBtn = document.getElementById("signin-btn");
const mainContainer = document.querySelector(".container");

signupBtn.addEventListener("click", () => {
  mainContainer.classList.toggle("change");
});
signinBtn.addEventListener("click", () => {
  mainContainer.classList.toggle("change");
});

let cheaked = document.querySelector(".fa-check");
let imageUpload = document.getElementById("file");
let uploadMsg = document.getElementById("uploadMsg");
imageUpload.onchange = function() {
    let input = this.files[0];
    let text;
    if (input) {
        cheaked.classList.add('active');
        text = input.name;
    } else {
        cheaked.classList.remove('active');
        text = 'Please select picture';
    }
    uploadMsg.innerHTML = text;
};