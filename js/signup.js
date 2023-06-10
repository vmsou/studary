function signUp() {
    let signupForm = document.getElementById("signupForm");
    fetch("php/signup.php", {
        method: "POST",
        redirect: "manual",
        body: new FormData(signupForm)
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.error) {
            alert("Cadastro falhou. Tente Novamente!");
        } else {
            alert("Cadastro realizado com sucesso.");
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
