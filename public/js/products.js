/* handling product addition to basket */





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