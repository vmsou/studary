function auth() {
    let loginForm = document.getElementById("loginForm");
    let data = new FormData(loginForm);
    fetch("php/auth.php", {
        method: "POST",
        body: data
    })
    .then((response) => response.text())
    .then((text) => { console.log(text); })
}

function main() {
    let loginButton = document.getElementById("loginButton");
    loginButton.addEventListener("click", auth)
}

window.onload = () => {
    main();
}
