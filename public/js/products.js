
/* handling product addition to basket */


document.addEventListener('DOMContentLoaded', function() {
    let basketProducts =  JSON.parse(localStorage.getItem('basketProducts')) || [];
    const basketBtn = document.querySelector('#to_basket');
    const basketCounter = document.querySelector('#basket_counter');
    let basketCount = basketCounter.innerText;
    const prodName = document.querySelector('#name'); 
    const shownImg = document.querySelector('#shownImg');
    const buyingImg = document.querySelector('#buyingImg');
    const price = document.querySelector('#price');
    const priceSpan = document.querySelector('#price_span');
    
    priceSpan.innerText = formatCurrency(priceSpan.innerText);

    basketBtn.addEventListener('click', function() {
        let productExists = false;

        for (i = 0;  i < basketProducts.length; i++) {
            if (basketProducts[i].name === prodName.innerText) {
                basketProducts[i].quantity++;
                productExists = true;
            }
        }

        if (!productExists) {
            const product = {
                name: prodName.innerText,
                shownImg: shownImg.innerText,
                buyingImg: buyingImg.innerText,
                price: priceSpan.innerText,
                quantity: 1
            };
            basketProducts.push(product);

        }

        basketCount++;
        basketCounter.innerText = basketCount;
        localStorage.setItem('basketProducts', JSON.stringify(basketProducts));
        console.log(localStorage.getItem('basketProducts'))
    });
});


/* \ handling product addition to basket / */


/* get Highest imagest clientHeight and set margin for shorter images */

function getMaxCarouselImageHeight() {
    let maxHeight = 0;
    const carouselItems = document.querySelectorAll('.carousel-item');
    carouselItems.forEach(item => {
        const image = item.querySelector('.carousel_image');
        if (image) {
            const originalDisplay = window.getComputedStyle(item).display;
            if (originalDisplay === 'none') {
                item.style.display = 'block';
            }

            const height = image.clientHeight;
            if (height > maxHeight) {
                maxHeight = height;
            }

            if (originalDisplay === 'none') {
                item.style.display = ''; 
            }
        }
    });
    return maxHeight;
}

function updateCarousel() {
    const carousel = document.querySelector('#carouselExampleIndicators');
    const maxHeight = getMaxCarouselImageHeight(); 
    carousel.style.minHeight = `${maxHeight}px`;
    const images = document.querySelectorAll('.carousel_image');
    images.forEach(image => {
        const item = image.closest('.carousel-item');
        const originalDisplay = window.getComputedStyle(item).display;
        if (originalDisplay === 'none') {
            item.style.display = 'block'; 
        }
        const height = image.clientHeight;
        const marginTop = maxHeight - height;
        image.style.marginTop = `${marginTop / 2}px`;
        if (originalDisplay === 'none') {
            item.style.display = ''; 
        }
    });
}

window.addEventListener('load', updateCarousel);


/* / get Highest imagest clientHeight and set margin for shorter images \ */


function formatCurrency(number) {
    const formatted = new Intl.NumberFormat('hu-HU').format(number);
    return formatted.replace(/\s/g, ',');
}