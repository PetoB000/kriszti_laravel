window.addEventListener('DOMContentLoaded',  function() {
    const categoryButton =  document.getElementById('category-button');
    const categoryContainer =  document.getElementById('categories');
    const productButton = document.querySelector('#product-button');
    const productContainer = document.querySelector('#products');
    const galleryButton  = document.querySelector('#gallery-button');
    const galleryContainer = document.querySelector('#gallery');

    
    categoryButton.addEventListener('click', function() {
        categoryContainer.classList.toggle('d-none');
        productContainer.classList.add('d-none');
        galleryContainer.classList.add('d-none');
    });

    productButton.addEventListener('click',  function() {
        productContainer.classList.toggle('d-none');
        categoryContainer.classList.add('d-none');
        galleryContainer.classList.add('d-none');
    });

    galleryButton.addEventListener('click', function() {
        galleryContainer.classList.toggle('d-none');
        categoryContainer.classList.add('d-none');
        productContainer.classList.add('d-none');
    });

})