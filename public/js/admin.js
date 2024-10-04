window.addEventListener('DOMContentLoaded',  function() {
    const categoryButton =  document.getElementById('category-button');
    const categoryContainer =  document.getElementById('categories');
    const productButton = this.document.querySelector('#product-button');
    const productContainer = this.document.querySelector('#products');
    
    categoryButton.addEventListener('click', function() {
        categoryContainer.classList.toggle('d-none');
        productContainer.classList.add('d-none');
    });

    productButton.addEventListener('click',  function() {
        productContainer.classList.toggle('d-none');
        categoryContainer.classList.add('d-none');
    })

})