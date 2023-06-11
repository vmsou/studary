function alertModal(type, message) {
    let alertDiv = document.createElement("div");
    alertDiv.classList.add("alert");

    let closeBtn = document.createElement("span");
    closeBtn.classList.add("closebtn");
    closeBtn.innerHTML = "&times;";
    closeBtn.onclick = () => { alertDiv.remove(); }

    let typeStrong = document.createElement("strong");
    if (type === "error") {
        alertDiv.classList.add("error");
        typeStrong.innerHTML = "Error! ";
    }
    else if (type === "success") {
        alertDiv.classList.add("success");
        typeStrong.innerHTML = "Success! ";
    }
    else if (type === "info") {
        alertDiv.classList.add("info");
        typeStrong.innerHTML = "Info! ";
    }
    else if (type === "warning") {
        alertDiv.classList.add("warning");
        typeStrong.innerHTML = "Warning! ";
    }
    
    alertDiv.appendChild(closeBtn);
    alertDiv.appendChild(typeStrong);
    alertDiv.appendChild(document.createTextNode(message));

    document.body.appendChild(alertDiv);
}