window.addEventListener('load', updateProductList)

let basketProducts = JSON.parse(localStorage.getItem('basketProducts'))
function updateProductList() {
    const productListSpan = document.querySelector('.product-listt'); 
    if (productListSpan) {
        let productList = "";
        for (const product of Object.values(basketProducts)) {
            const productString = `Termék: ${product.name}, Mennyiség: ${product.quantity}, Ára: ${formatCurrency(product.price)} \n`;
            productList += productString;
        }
        productListSpan.innerHTML = productList; 
    }
}

const orderBtn =  document.querySelector('.order-btn');
    if (orderBtn) {
        orderBtn.addEventListener('click', function(){
            basketProducts = {};
            localStorage.setItem('basketProducts', JSON.stringify(basketProducts));
        })
    }


function formatCurrency(number) {
    return new Intl.NumberFormat('hu-HU').format(number).replace(/\s/g, ',') + ' Ft';
}