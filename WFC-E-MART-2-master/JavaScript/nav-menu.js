let searchForm = document.querySelector('.search-form');
let cart = document.querySelector('.shopping-cart');
let navbar = document.querySelector('.navbar');
let user = document.querySelector('#user-btn');

// Click event handler for search button
document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
    cart.classList.remove('active');
    navbar.classList.remove('active');
    user.classList.remove('active');
}

// Click event handler for cart button
document.querySelector('#cart-btn').onclick = () =>{
    cart.classList.toggle('active');
    searchForm.classList.remove('active');
    navbar.classList.remove('active');
}

// Click event handler for menu button
document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    cart.classList.remove('active');
}

// Click event handler for user button
document.querySelector('#user-btn').onclick = () =>{
    user.classList.toggle('active');
    searchForm.classList.remove('active');
    cart.classList.remove('active');
    navbar.classList.remove('active');
}

// Scroll event handler
window.onscroll = () =>{
    searchForm.classList.remove('active');
    cart.classList.remove('active');
    navbar.classList.remove('active');
}

// Slider functionality
let slides = document.querySelectorAll('.home .slides-container .slide'); 
let index = 0;

function next() {
  slides[index].classList.remove('active');
  index = (index + 1) % slides.length;
  slides[index].classList.add('active');
}

function prev() {
  slides[index].classList.remove('active');
  index = (index - 1 + slides.length) % slides.length;
  slides[index].classList.add('active');
}
