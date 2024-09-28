function getMaxCarouselImageHeight() {
    const images = document.querySelectorAll('.carousel_image');
    let maxHeight = 0;

    images.forEach(image => {
        const height = image.clientHeight;
        if (height > maxHeight) {
            maxHeight = height;
        }
    });

    return maxHeight;
}

const carousel = document.querySelector('#carouselExampleIndicators');
carousel.style.height = `${getMaxCarouselImageHeight()} px`;

function updateImageMargin() {
    const images = document.querySelectorAll('.carousel_image');
}


