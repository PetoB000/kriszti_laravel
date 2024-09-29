
/* handling product addition to basket */


document.addEventListener('DOMContentLoaded', function() {
    const basketObj = {};
    const basketBtn = document.querySelector('#to_basket');
    const basketCount = document.querySelector('#basket_counter');
    const prodName = document.querySelector('#name'); 
    const shownImg = document.querySelector('#shownImg');
    const buyingImg = document.querySelector('#buyingImg');
    const price = document.querySelector('#price');

    basketBtn.addEventListener('click', function() {
        console.log(prodName.innerText);
        console.log(shownImg.innerText);
        console.log(buyingImg.innerText);
        console.log(price.innerText);
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
