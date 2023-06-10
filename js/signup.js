function signUp() {
    let signupForm = document.getElementById("signupForm");
    fetch("../php/signup.php", {
        method: "POST",
        redirect: "manual",
        body: new FormData(signupForm)
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.error) {
            alert("Cadastro falhou. Tente Novamente!");
            location.reload();
        } else {
            alert("Cadastro realizado com sucesso.");
            sessionStorage.setItem("username", data["username"]);
            window.location.href = data.url;
        }
    })
}

function main() {
    let signupButton = document.getElementById("signupButton");
    signupButton.addEventListener("click", (e) => {
        e.preventDefault();
        signUp();
    })
}

window.onload = () => {
    main();
}
