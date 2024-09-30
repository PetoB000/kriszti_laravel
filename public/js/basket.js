document.addEventListener('DOMContentLoaded', function () {
    const basketBtn = document.querySelector('#to_basket');
    const basketCounter = document.querySelector('#basket_counter');
    const productsContainer = document.querySelector('#basketProdContainer');
    const orderButton = document.querySelector('.btn-warning');
    const totalContainer = document.querySelector('.bg-custom');
    const emptyMessage = document.createElement('p');
    emptyMessage.classList.add('text-center', 'w-100', 'mt-3');
    emptyMessage.textContent = 'Üres a kosarad';
    emptyMessage.style.display = 'none'; 
    totalContainer.parentElement.appendChild(emptyMessage);
    let basketProducts = JSON.parse(localStorage.getItem('basketProducts')) || {};

    const productDetails = {
        id: document.querySelector('#pId')?.innerText,
        name: document.querySelector('#name')?.innerText,
        imgSrc: document.querySelector('#buyingImg')?.innerText,
        unitPrice: parseFloat(document.querySelector('#pPrice')?.innerText) || 0
    };

    const priceSpan = document.querySelector('#price_span');
    if (priceSpan) priceSpan.innerText = formatCurrency(productDetails.unitPrice);

    if (basketBtn) {
        basketBtn.addEventListener('click', function () {
            addToBasket(productDetails);
            updateBasketDisplay();
        });
    }

    function addToBasket(product) {
        if (basketProducts[product.id]) {
            basketProducts[product.id].quantity += 1;
            basketProducts[product.id].price = product.unitPrice * basketProducts[product.id].quantity;
        } else {
            basketProducts[product.id] = {
                ...product,
                quantity: 1,
                price: product.unitPrice
            };
        }
        localStorage.setItem('basketProducts', JSON.stringify(basketProducts));
    }

    function updateBasketDisplay() {
        productsContainer.innerHTML = ''; 
        let itemCounter = 0;

        for (const [id, product] of Object.entries(basketProducts)) {
            const productElement = generateProductHTML(id, product);
            productsContainer.appendChild(productElement);
            itemCounter += 1;
        }
        basketCounter.textContent = itemCounter;

        if (productsContainer.children.length > 4) {
            const lastItem = productsContainer.lastElementChild;
            lastItem.style.paddingBottom = '180px';
        }
        toggleEmptyBasketMessage();
        updateTotalPrice();
        attachEventListeners();
    }

    function updateTotalPrice() {
        const totalSpan = document.querySelector('#total');
        let totalPrice = 0;
        for (const product of Object.values(basketProducts)) {
            totalPrice += product.price;
        }
        totalSpan.textContent = formatCurrency(totalPrice);
    }

    function toggleEmptyBasketMessage() {
        const isBasketEmpty = Object.keys(basketProducts).length === 0;
        const basketIndicator =  document.querySelector('#basketIndicator');

        if (isBasketEmpty) {
            totalContainer.style.display = 'none'; 
            orderButton.style.display = 'none'; 
            emptyMessage.style.display = 'block'; 
            basketIndicator.innerHTML = " Üres a kosarad"
        } else {
            totalContainer.style.display = 'block'; 
            orderButton.style.display = 'block'; 
            emptyMessage.style.display = 'none'; 
            basketIndicator.innerHTML = "Összesen: <span id='total'></span> + Szállítás"
            updateTotalPrice()
        }
    }


    window.changeQuantity = function changeQuantity(operation, id) {
        if (!basketProducts[id]) return;

        const product = basketProducts[id];
        product.quantity = operation === 'add' ? product.quantity + 1 : Math.max(product.quantity - 1, 1);
        product.price = product.unitPrice * product.quantity;

        localStorage.setItem('basketProducts', JSON.stringify(basketProducts));
        updateBasketDisplay();
    };

    window.removeProduct = function removeProduct(id) {
        delete basketProducts[id];
        localStorage.setItem('basketProducts', JSON.stringify(basketProducts));
        updateBasketDisplay();
    };

    function formatCurrency(number) {
        return new Intl.NumberFormat('hu-HU').format(number).replace(/\s/g, ',') + ' Ft';
    }

    function generateProductHTML(id, product) {
        const productHTML = document.createElement('div');
        productHTML.classList.add('row', 'mx-0', 'productDiv');
        productHTML.dataset.id = id;
        productHTML.innerHTML = `
            <div class="cart-item d-flex justify-content-between align-items-center text-light p-2 pe-0 w-100">
                <div class="d-flex align-items-center" style="width: 160px">
                    <img src=".${product.imgSrc}" alt="Product Image" class="img-fluid product_img">
                    <div class="ms-3">
                        <h6 class="mb-0 product_name">${product.name}</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <span class="me-2">Mennyiség:</span>
                    <div class="input-group d-flex flex-column">
                        <button class="btn btn-outline-light p-1 incrementBtn" data-id="${id}" data-operation="add">+</button>
                        <p class="m-0 text-center quantity">${product.quantity}</p>
                        <button class="btn btn-outline-light p-1 decrementBtn" data-id="${id}" data-operation="subtract">-</button>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="me-2 price-trashcan" >
                        <strong>Ára: <br> <span>${formatCurrency(product.price)}</span></strong>
                    </div>
                    <button class="btn p-0 remove-btn" data-id="${id}">
                        <img src="../img/icons/trashcan.svg" style="width: 25px;">
                    </button>
                </div>
            </div>`;
        return productHTML;
    }

    function attachEventListeners() {
        const incrementBtns = document.querySelectorAll('.incrementBtn');
        const decrementBtns = document.querySelectorAll('.decrementBtn');
        const removeBtns = document.querySelectorAll('.remove-btn');

        incrementBtns.forEach(button => {
            button.addEventListener('click', function () {
                const id = button.dataset.id;
                changeQuantity('add', id);
            });
        });

        decrementBtns.forEach(button => {
            button.addEventListener('click', function () {
                const id = button.dataset.id;
                changeQuantity('subtract', id);
            });
        });

        removeBtns.forEach(button => {
            button.addEventListener('click', function () {
                const id = button.dataset.id;
                removeProduct(id);
            });
        });
    }
    updateBasketDisplay();
});
