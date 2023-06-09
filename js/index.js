function auth() {
    let loginForm = document.getElementById("loginForm");
    fetch("php/auth.php", {
        method: "POST",
        redirect: "manual",
        body: new FormData(loginForm)
    })
    .then((response) => response.json())
    .then((json) => {
        if (json.message === "SUCCESS") {
            alert("Login realizado com sucesso.");
            window.location.href = json.url;
        } else {
            alert("Login falhou! Usuário e/ou Senha Incorretos.");
        }
    })
}

function main() {
    let loginButton = document.getElementById("loginButton");
    loginButton.addEventListener("click", (e) => {
        e.preventDefault();
        auth();
    })
}

window.onload = () => {
    main();
}
