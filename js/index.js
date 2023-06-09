function auth() {
    let loginForm = document.getElementById("loginForm");
    let data = new FormData(loginForm);
    fetch("php/auth.php", {
        method: "POST",
        body: data
    }).then((response) => {
        console.log(response);
    }).catch(() => {
        console.log("Não foi possivel autenticar login.")
    });
}

function main() {
    let loginButton = document.getElementById("loginButton");
    loginButton.addEventListener("click", auth)
}

window.onload = () => {
    main();
}
