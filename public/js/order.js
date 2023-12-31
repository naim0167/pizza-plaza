document.addEventListener("DOMContentLoaded", function() {
    const pizzaSelect = document.getElementById('pizzaSelect');
    const extraToppings = document.getElementById('extraToppings');
    const addToCartBtn = document.getElementById('addToCartBtn');
    const submitBtn = document.querySelector('#orderForm button[type="submit"]');

    // Event listener for pizza selection
    pizzaSelect.addEventListener('change', function() {
        if (this.value !== '') {
            extraToppings.style.display = 'block'; // Show extra toppings options
        } else {
            extraToppings.style.display = 'none'; // Hide if no pizza is selected
        }
    });

    // Event listener for 'Add to Cart' button
    addToCartBtn.addEventListener('click', function() {
        submitBtn.click(); // Simulate form submission on 'Add to Cart' click
    });
});
