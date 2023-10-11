function acceptPopup() {
    var popup = document.getElementById("popup");
    popup.style.display = "none";

    // Enregistrement du cookie pour indiquer que la pop-up a été validée
    document.cookie = "popupAccepted=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
}

// Vérification si le cookie existe pour afficher ou masquer la pop-up
function checkPopupStatus() {
    var popup = document.getElementById("popup");
    var popupAccepted = getCookie("popupAccepted");

    if (popupAccepted) {
        popup.style.display = "none";
    } else {
        popup.style.display = "block";
    }
}

// Fonction pour récupérer la valeur d'un cookie
function getCookie(name) {
    var cookieArr = document.cookie.split(";");

    for (var i = 0; i < cookieArr.length; i++) {
        var cookiePair = cookieArr[i].split("=");

        if (name === cookiePair[0].trim()) {
            return decodeURIComponent(cookiePair[1]);
        }
    }

    return null;
}

// Vérification du statut de la pop-up lors du chargement de la page
window.onload = checkPopupStatus;