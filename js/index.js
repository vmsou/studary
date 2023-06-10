function auth() {
    let loginForm = document.getElementById("loginForm");
    fetch("php/auth.php", {
        method: "POST",
        redirect: "manual",
        body: new FormData(loginForm)
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.error) {
            alert("Login falhou! Usuário e/ou Senha Incorretos.");
        } else {
            alert("Login realizado com sucesso.");
            window.location.href = data.url;
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
