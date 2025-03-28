// Fetch and display products on index.html
let containers = document.getElementsByClassName("pro-container");
let indexs = document.getElementsByClassName("index");

if (containers.length > 0) {
    fetch("database/db.json")
        .then(res => res.json())
        .then(json => {
            console.log("Fetched data:", json); // Debugging output

            // Ensure "items" exists in the fetched data
            if (!json.items) {
                console.error("No 'items' array found in the JSON file.");
                return;
            }

            const uniqueProducts = new Set(); // To track unique products

            json.items.forEach(product => {
                const productId = product.id; // Use product ID to ensure uniqueness
                if (!uniqueProducts.has(productId) ) {
                    uniqueProducts.add(productId);
                    for (let container of containers) {
                        container.append(td_fun(product));
                    }
                }
            });

            


        })
        .catch(err => console.error("Error fetching data:", err));
}

if ( indexs.length > 0) {
    fetch("database/db.json")
        .then(res => res.json())
        .then(json => {
            console.log("Fetched data:", json); // Debugging output

            // Ensure "items" exists in the fetched data
            if (!json.items) {
                console.error("No 'items' array found in the JSON file.");
                return;
            }

            const uniqueProducts = new Set(); // To track unique products

            let displayedCount = 0; // Counter for displayed products
            const maxDisplay = 8; // Maximum number of products to display

            json.items.forEach(product => {
                const productId = product.id; // Use product ID to ensure uniqueness
                if (!uniqueProducts.has(productId) && displayedCount < maxDisplay) {
                    uniqueProducts.add(productId);
                    for (let container of indexs) {
                        container.append(td_fun(product));
                    }
                    displayedCount++; // Increment the counter
                }
            });


        })
        .catch(err => console.error("Error fetching data:", err));
}

// Function to create product item element
function td_fun({ id, name, company, image, price, stars }) {
    let item = document.createElement('div');
    item.classList.add("product-item");

    // Generate star icons based on the stars value
    const starIcons = Array(5)
        .fill(0)
        .map((_, index) => {
            // Fill star if index is less than stars, otherwise empty star
            return index < Math.floor(stars)
                ? `<i class="bi bi-star-fill"></i>`
                : `<i class="bi bi-star"></i>`;
        })
        .join("");

    // Pass product details in the URL
    item.innerHTML = `
    <div class="pro">
        <div onclick="window.location.href='sproduct.php?id=${id}&name=${encodeURIComponent(name)}&image=${encodeURIComponent(image)}&price=${price}';">
            <img src="${image}" alt="${name}">
            <div class="des">
                <span>${company}</span>
                <h5>${name}</h5>
                <div class="star">
                    ${starIcons} <!-- Dynamically generated stars -->
                </div>
                <h4>$${price}</h4>
            </div>
        </div>
        <i class="bi bi-cart cart" onclick="addToCart('${name}', '${image}', ${price}, event)"></i>
    </div>
    `;
    return item;
}

function th_fun({ id, name, company, image, price, stars }) {
    let item = document.createElement('div');
    item.classList.add("product-item");

    // Generate star icons based on the stars value
    const starIcons = Array(5)
        .fill(0)
        .map((_, index) => {
            // Fill star if index is less than stars, otherwise empty star
            return index < Math.floor(stars)
                ? `<i class="bi bi-star-fill"></i>`
                : `<i class="bi bi-star"></i>`;
        })
        .join("");

    // Pass product details in the URL
    item.innerHTML = `
    <div class="pro">
        <div onclick="window.location.href='sproduct.php?id=${id}&name=${encodeURIComponent(name)}&image=${encodeURIComponent(image)}&price=${price}';">
            <img src="${image}" alt="${name}">
            <div class="des">
                <span>${company}</span>
                <h5>${name}</h5>
                <div class="star">
                    ${starIcons} <!-- Dynamically generated stars -->
                </div>
                <h4>$${price}</h4>
            </div>
        </div>
        <i class="bi bi-cart cart" onclick="addToCart('${name}', '${image}', ${price}, event)"></i>
    </div>
    `;
    return item;
}




// Function to add items to cart and store in localStorage
function addToCart(name, image, price, event) {
    console.log(`Adding to cart: ${name}, $${price}`); // Debugging output

    // Create the cart item data
    const cartItem = { name, image, price, quantity: 1 };

    // Send AJAX request to PHP to update the session cart
    fetch('cart/add_to_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(cartItem)  // Send cart item details
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'success') {
            console.log('Item added to cart');
            // Optionally update UI or show confirmation
        } else {
            console.log('Failed to add item:', data.message);
        }
    })
    .catch(err => console.error('Error:', err));

    // Change icon to checked and back after 2 seconds
    const cartIcon = event.currentTarget; // Get the current icon that was clicked
    cartIcon.classList.remove('bi-cart'); // Remove the original cart icon class
    cartIcon.classList.add('bi-cart-check'); // Add the checked icon class

    setTimeout(() => {
        cartIcon.classList.remove('bi-cart-check'); // Remove checked icon class
        cartIcon.classList.add('bi-cart'); // Add the original cart icon class back
    }, 500); // Change back after 0.5 seconds
}




// Function to display cart items on cart.html




// Call displayCartItems on cart.html load


// Function to remove item from cart
function removeFromCart(itemId) {
    fetch('cart/remove_from_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ item_id: itemId }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Remove the item row from the table
            document.getElementById(`cart-item-${itemId}`).remove();
            // Update the cart summary
            updateCartSummary();
        } else {
            console.error('Error removing item from cart:', data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}


function updateCartSummary() {
    fetch('cart/display_cart_summary.php')
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                const subtotalElement = document.getElementById('cartSubtotal');
                const totalElement = document.getElementById('cartTotal');
                const cartTableBody = document.querySelector('#cart1 tbody');
                const cartAddSection = document.getElementById('cart-add');

                if (data.subtotal > 0) {
                    subtotalElement.textContent = `$${data.subtotal.toFixed(2)}`;
                    totalElement.textContent = `$${data.total.toFixed(2)}`;
                } else {
                    // Clear the cart table
                    cartTableBody.innerHTML = '';
                    // Display the empty cart message
                    const cartSection = document.getElementById('cart');
                    cartSection.innerHTML = `
                        <table id="cart1" width="100%">
                            <thead>
                                <tr>
                                    <td>Remove</td>
                                    <td>Image</td>
                                    <td>Product</td>
                                    <td>Price</td>
                                    <td>Quantity</td>
                                    <td>Subtotal</td>
                                </tr>
                            </thead>
                        </table>
                        <h3 style="text-align: center; vertical-align: middle; padding-top: 20px; color: #088178;">No items in Cart</h3>
                    `;
                    // Update the cart totals section
                    cartAddSection.innerHTML = `
                        <div id="coupon">
                            <h3>Apply Coupon</h3>
                            <div>
                                <input type="text" placeholder="Enter Your Coupon">
                                <button class="normal">Apply</button>
                            </div>
                        </div>
                        <div id="subtotal">
                            <h3>Cart Totals</h3>
                            <table>
                                <tr>
                                    <td>Cart Subtotal</td>
                                    <td id="cartSubtotal">$0.00</td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td id="cartTotal"><strong>$0.00</strong></td>
                                </tr>
                            </table>
                            <a href="shop.php"><button class="normal">Buy goods first</button></a>
                        </div>
                    `;
                }
            } else {
                console.error('Error fetching cart summary:', data.message);
            }
        })
        .catch(error => console.error('Error:', error));
}




function updateCartQuantity(itemId, quantity) {
    fetch('cart/update_cart_quantity.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: itemId, quantity: quantity })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Optionally refresh cart summary
            updateCartSummary();
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}



// Function to update subtotal
function updateSubtotal(input, price) {
    const quantity = parseInt(input.value);
    const subtotalCell = input.closest("tr").querySelector("td:last-child");
    const subtotal = price * quantity;
    subtotalCell.textContent = `$${subtotal.toFixed(2)}`; // Update row subtotal

    // Recalculate and update the overall cart totals
    const cartTable = document.querySelector("#cart1 tbody");
    let cartSubtotal = 0;
    Array.from(cartTable.rows).forEach(row => {
        const rowSubtotal = parseFloat(row.querySelector("td:last-child").textContent.replace('$', ''));
        cartSubtotal += rowSubtotal; // Accumulate subtotal from each row
    });

    updateCartTotals(cartSubtotal); // Update overall totals
}

// Function to update cart totals in the specified HTML structure
function updateCartTotals(subtotal) {
    const cartSubtotalElement = document.getElementById("cartSubtotal");
    const cartTotalElement = document.getElementById("cartTotal");

    cartSubtotalElement.textContent = `$${subtotal.toFixed(2)}`; // Set subtotal
    cartTotalElement.innerHTML = `<strong>$${subtotal.toFixed(2)}</strong>`; // Set total (assuming free shipping)
}




const bar = document.getElementById('bar');
const close = document.getElementById('close');
const nav = document.getElementById('navbar');

if (bar) {
    bar.addEventListener('click', () => {
        nav.classList.add('active');
    })
}

if (close) {
    close.addEventListener('click', () => {
        nav.classList.remove('active');
    })
}



function getQueryParams() {
    const params = new URLSearchParams(window.location.search);
    return {
        id: params.get('id'),
        name: params.get('name'),
        image: params.get('image'),
        price: params.get('price'),
    };
}

// Populate product details dynamically
document.addEventListener('DOMContentLoaded', () => {
    console.log("DOMContentLoaded event fired");

    const { name, image, price } = getQueryParams();

    
    console.log("Updating product details with:", { name, image, price });

    // Ensure the main image element exists before modifying it
    const mainImg = document.getElementById('MainImg');
    if (mainImg) {
        mainImg.src = decodeURIComponent(image);
        mainImg.alt = name;
    } 

    // Update product details safely
    const breadcrumb = document.getElementById('breadcrumb');
    if (breadcrumb) breadcrumb.textContent = `Home / ${name}`;

    const productName = document.getElementById('product-name');
    if (productName) productName.textContent = name;

    const productPrice = document.getElementById('product-price');
    if (productPrice) productPrice.textContent = `$${price}`;
});

// Function to extract query parameters from the URL
function getQueryParams() {
    const params = new URLSearchParams(window.location.search);
    return {
        name: params.get("name") ? decodeURIComponent(params.get("name")) : null,
        image: params.get("image") ? decodeURIComponent(params.get("image")) : null,
        price: params.get("price") ? params.get("price") : null
    };
}

// Add an event listener to the button
function validateForm() {
    // Get form elements
    var name = document.getElementById('name').value.trim();
    var email = document.getElementById('email').value.trim();
    var phone = document.getElementById('phone').value.trim();
    var postOffice = document.getElementById('postOffice').value.trim();
    var postCode = document.getElementById('postCode').value.trim();
    var county = document.getElementById('county').value;

    // Validate each field
    if (!name || !email || !phone || !postOffice || !postCode || !county) {
        alert('Please fill in all required fields.');
        return false; // Prevent form submission
    }

    // Additional validation can be added here (e.g., email format, phone number pattern)

    return true; // Allow form submission
}
;
