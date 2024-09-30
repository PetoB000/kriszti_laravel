

const basketCounter = document.querySelector('#basket_counter');
let basketItems = JSON.parse(localStorage.getItem('basketProducts'));
const productsContainer = document.querySelector('#basketProdContainer');
const allProducts = document.querySelectorAll('.productDiv');
let itemCounter = 0;
if (basketItems) {
    for (const [id, product] of Object.entries(basketItems)) {
        itemCounter += product.quantity;  
        
        productsContainer.appendChild(generateProductHTML(id, product)); 
    }
}
    
/*     allProducts[allProducts.length - 1].style.paddingBottom = '180px'
    for(i = 0;  i < allProducts.length; i++) {
        if (i % 2 === 1) {
            allProducts[i].style.background = 'rgba(26, 25, 25, 0.274)';
        }
} */

basketCounter.textContent = itemCounter;









function changeQuantity(operation, id) {
    const quantityDiv = document.querySelector(`#quantity-${id}`);
    let quantity = parseInt(quantityDiv.innerText);
    quantity = (operation === 'add') ? quantity + 1 : (quantity > 1 ? quantity - 1 : quantity);
    quantityDiv.innerText = quantity;
}

function removeProduct(id) {
    const productDiv = document.querySelector(`[data-id="${id}"]`);
    productDiv.remove(); 
    delete basketItems[id]
    localStorage.setItem('basketProducts', JSON.stringify(basketItems));
}





function generateProductHTML(id, product) {
    const productHTML = document.createElement('div');
    productHTML.innerHTML =  `
    <div class="row mx-0 productDiv" data-id="${id}">
        <div class="cart-item d-flex justify-content-between align-items-center text-light p-2 pe-0 w-100">
            <div class="d-flex align-items-center">
                <img id="pImg-${id}" src=".${product.buyingImg}" alt="Product Image" class="img-fluid" style="max-width: 80px;">
                <div class="ms-3">
                    <h6 class="mb-0" id="pName-${id}" style="width: 130px">${product.name}</h6>
                </div>
            </div>

            <div class="d-flex align-items-center">
                <span class="me-2">Mennyiség:</span>
                <div class="input-group d-flex flex-column">
                    <button class="btn btn-outline-light incrementBtn p-1" onclick="changeQuantity('add', ${id})" id="incrementBtn-${id}">+</button>
                    <p class="m-0 text-center quantity" id="quantity-${id}">${product.quantity}</p>
                    <button class="btn btn-outline-light decrementBtn p-1" onclick="changeQuantity('kecske', ${id})" id="decrementBtn-${id}">-</button>
                </div>
            </div>

            <div class="d-flex align-items-center">
                <div style="min-width: 75px;">
                    <strong>Ára: <br> <span id="price-${id}">${product.price} Ft</span></strong>
                </div>
                <button class="btn p-1" id="removeBtn-${id}" onclick="removeProduct(${id})">
                    <img src="../img/icons/trashcan.svg" style="width: 25px;">
                </button>
            </div>
        </div>
    </div>`;
    
    return productHTML;
}




