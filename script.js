
// Fetch data and print them in html page
if(window.location.pathname == "/produit.html" ) {
    const filterPrice = document.getElementById('filter-price');
    const filterText = document.getElementById('filter-text');
    const filterSearch = document.getElementById('input-search');
    const list = document.getElementById('list');
    const filters = ["", "", ""];
    const countProductsText = document.getElementById('count-products')

    function showData() {
    
fetch('./data.json')
.then(response => response.json())
.then(data => {

    countProductsText.innerText = 0;

    // filter data
    let filteredData = data[0];
    if(filters[0] != "") 
    {
        switch(filters[0])
        {
            case 'ASC': 
                filteredData = filteredData.sort((a,b) => {
                    if(a.name < b.name) {
                        return -1;
                    } else 
                    {
                        return 1;
                    }

                    return 0;
                })
            break;
            
            case 'DESC':
                filteredData = filteredData.sort((a,b) => {
                    if(a.name > b.name) {
                        return -1;
                    } else 
                    {
                        return 1;
                    }
    
                    return 0;
                    
                })
            break;
        } 
    }
    if(filters[1] != "") 
    {
        switch(filters[1])
        {
            case 'ASC': 
                filteredData = filteredData.sort((a,b) => {
                    if(a.price < b.price) {
                        return -1;
                    } else 
                    {
                        return 1;
                    }
                })
            break;
            
            case 'DESC':
                filteredData = filteredData.sort((a,b) => {
                    if(a.price < b.price) {
                        return 1;
                    } else 
                    {
                        return -1;
                    }
                })
            break;
        } 
    }

    filteredData.forEach(element => {
        if(filters[2] != "")
        {
            if(element.name.toLowerCase().includes(filters[2].toLowerCase()) === false) return;
        }

        let card = document.createElement('div');
        card.classList.add('card');
        card.classList.add('m-1');
        
        let cardHeader = document.createElement('div')
        cardHeader.classList.add('card-header');

        let img = document.createElement('img');
        img.src = element.imageurl;
        img.alt = element.name;

        let cardBody = document.createElement('div');
        cardBody.classList.add('card-body');
        
        let title = document.createElement('p');
        title.innerText = element.name;

        let price = document.createElement('p');
        price.innerHTML = element.price + " €"

        let buttonDiv = document.createElement('div');
        buttonDiv.classList.add('d-flex');
        buttonDiv.classList.add('justify-content-between');

        let buyButton = document.createElement('button');
        buyButton.classList.add('btn');
        buyButton.classList.add('btn-color-product-buy');
        buyButton.innerText = "Acheter";

        let detailsButton = document.createElement('button');
        detailsButton.classList.add('btn');
        detailsButton.classList.add('btn-secondary');
        detailsButton.innerText = "Details";

        buttonDiv.appendChild(buyButton);
        buttonDiv.appendChild(detailsButton);
        cardHeader.appendChild(img);
        cardBody.appendChild(title);
        cardBody.appendChild(price);
        cardBody.appendChild(buttonDiv);
        card.appendChild(cardHeader);
        card.appendChild(cardBody);
        list.appendChild(card)
        countProductsText.innerText = parseInt(countProductsText.innerText) + 1
    });
})
}}

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