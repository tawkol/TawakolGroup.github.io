const passType = document.querySelector('#pass');
const passIcon = document.querySelector('#pass-icon');
passIcon.addEventListener("click", () => {
    const type = passType.getAttribute("type") === "password"?"text":"password";
            passType.setAttribute("type", type);
        passIcon.classList.toggle("fa-eye");
});

const cpassType = document.querySelector('#cpass');
const cpassIcon = document.querySelector('#cpass-icon');
cpassIcon.addEventListener("click", () => {
    const ctype = cpassType.getAttribute("type") === "password"?"text":"password";
            cpassType.setAttribute("type", ctype);
        cpassIcon.classList.toggle("fa-eye");
});