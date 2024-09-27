const submenuItems = document.querySelectorAll('.dropdown-item');
submenuItems.forEach((item, index) => {
    item.style.animationDelay = `${index * 0.2}s`;
})

const dropdownContent = document.querySelector('.dropdown-content')
const mainLinks = document.querySelectorAll('.main_link');
const hamburger = document.querySelector('#nav-icon3');
const menu = document.querySelector('.menu');
hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('open');
    menu.classList.toggle('open');
    mainLinks.forEach((mainLink, index) => {
        mainLink.style.animationDelay = `${index * 0.4}s`;
        mainLink.classList.toggle('visible');
        mainLink.classList.toggle('animated');
        void mainLink.offsetWidth;
    });
    dropdownContent.style.display = "none"
})

document.querySelector('.dropdown').addEventListener("click", () => {
    dropdownContent.style.display = dropdownContent.style.display === 'flex' ? 'none' : 'flex';
})

const basketCloseIcon = document.querySelector('#basket-close-button');
const basketIcon = document.querySelector('#basket-icon');
const basket =  document.querySelector('#basket');
[basketCloseIcon, basketIcon].forEach(element => {
    element.addEventListener('click', () => {
        basket.classList.toggle('open');
    })
});


function relocateTo(url) {
    window.location.href = url;
}

