function main() {
    let username = sessionStorage.getItem("username");
    let usernameSpan = document.getElementById("usernameSpan");
    usernameSpan.innerText = username;
}

window.onload = () => {
    main();
}