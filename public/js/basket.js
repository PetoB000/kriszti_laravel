const counter = document.querySelector('#basket_counter');
let basketItems = JSON.parse(localStorage.getItem('basketProducts'));
document.querySelector('#basket').style.height = `${window.innerHeight}px`
let itemCounter = 0;
basketItems.forEach(product => {
    itemCounter += product.quantity;
});
counter.textContent = itemCounter;