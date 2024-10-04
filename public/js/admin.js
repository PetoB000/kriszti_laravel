window.addEventListener('DOMContentLoaded',  function() {
    const categoryButton =  document.getElementById('category-button');
    const categoryContainer =  document.getElementById('categories');
    
    categoryButton.addEventListener('click', function() {
        categoryContainer.classList.toggle('d-none');
    });
})