const initSlider = () => {
    const imageList = document.querySelector(".slider-wrapper .image-list");
    const slideButtons = document.querySelectorAll(
        ".slider-wrapper .slide-button"
    );
    const sliderScrollbar = document.querySelector(
        ".slider-container .slider-scrollbar"
    );
    const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar-thumb");
    const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;

    scrollbarThumb.addEventListener("mousedown", (e) => {
        const startX = e.clientX;
        const thumbPosition = scrollbarThumb.offsetLeft;
        const maxThumbPosition =
            sliderScrollbar.getBoundingClientRect().width -
            scrollbarThumb.offsetWidth;

        const handleMouseMove = (e) => {
            const deltaX = e.clientX - startX;
            const newThumbPosition = thumbPosition + deltaX;

            const boundedPosition = Math.max(
                0,
                Math.min(maxThumbPosition, newThumbPosition)
            );
            const scrollPosition =
                (boundedPosition / maxThumbPosition) * maxScrollLeft;

            scrollbarThumb.style.left = `${boundedPosition}px`;
            imageList.scrollLeft = scrollPosition;
        };

        const handleMouseUp = () => {
            document.removeEventListener("mousemove", handleMouseMove);
            document.removeEventListener("mouseup", handleMouseUp);
        };

        document.addEventListener("mousemove", handleMouseMove);
        document.addEventListener("mouseup", handleMouseUp);
    });

    slideButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const direction = button.id === "prev-slide" ? -1 : 1;
            const scrollAmount = imageList.clientWidth * direction;
            imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
        });
    });

    const handleSlideButtons = () => {
        slideButtons[0].style.display =
            imageList.scrollLeft <= 0 ? "none" : "flex";
        slideButtons[1].style.display =
            imageList.scrollLeft >= maxScrollLeft ? "none" : "flex";
    };

    const updateScrollThumbPosition = () => {
        const scrollPosition = imageList.scrollLeft;
        const thumbPosition =
            (scrollPosition / maxScrollLeft) *
            (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
        scrollbarThumb.style.left = `${thumbPosition}px`;
    };

    imageList.addEventListener("scroll", () => {
        updateScrollThumbPosition();
        handleSlideButtons();
    });

    handleSlideButtons();
    updateScrollThumbPosition();
};

const images = [];
document.querySelectorAll(".image-item").forEach((item) => {
    images.push(item.getAttribute("data-bs-image"));
});

let currentIndex = 0;

document.querySelectorAll(".image-item").forEach((item, index) => {
    item.addEventListener("click", function () {
        const imageSrc = this.getAttribute("data-bs-image");
        document.getElementById("modalImage").src = imageSrc;
        currentIndex = index;
    });
});

document.getElementById("prevImage").addEventListener("click", function () {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    document.getElementById("modalImage").src = images[currentIndex];
});

document.getElementById("nextImage").addEventListener("click", function () {
    currentIndex = (currentIndex + 1) % images.length;
    document.getElementById("modalImage").src = images[currentIndex];
});


window.addEventListener('resize', function() {
    let windowWidth = window.innerWidth;
    if (windowWidth  < 1130) {
      slideButtons.forEach(button => {
        button.style.display = "none"
        
      });
    }

});

window.addEventListener("load", initSlider);
