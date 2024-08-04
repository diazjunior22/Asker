// scripts.js

document.addEventListener('DOMContentLoaded', function() {
    const products = document.querySelectorAll('.product');
  
    products.forEach(product => {
      product.addEventListener('click', function() {
        const link = this.querySelector('a').getAttribute('href');
        window.location.href = link;
      });
    });
  });
  