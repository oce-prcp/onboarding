
// Fetch data and print them in html page

const list = document.getElementById('list');

fetch('./data.json')
    .then(response => response.json())
    .then(data => {
        data[0].forEach(element => {
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

            cardHeader.appendChild(img);
            cardBody.appendChild(title);
            cardBody.appendChild(price);
            card.appendChild(cardHeader);
            card.appendChild(cardBody);
            list.appendChild(card)
        });
    })

const loginbtn = document.getElementById("btn-login").addEventListener("click", function() {
    window.location.href = 'index.html';
    });