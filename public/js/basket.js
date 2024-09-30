const counter = document.querySelector('#basket_counter');
let basketItems = JSON.parse(localStorage.getItem('basketProducts'));

let itemCounter = 0;
basketItems.forEach(product => {
    itemCounter += product.quantity;
});
counter.textContent = itemCounter;
const pImg = document.querySelector('#pImg');
console.log('Image URL:', basketItems[0].buyingImg);
if (pImg && basketItems[0].buyingImg) {
    pImg.style.backgroundImage = `url(.${basketItems[0].buyingImg})`;
} else {
    console.log('pImg element or image URL is missing.');
}
