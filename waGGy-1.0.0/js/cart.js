document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.add-to-cart-button').forEach(button => {
        button.addEventListener('click', event => {
            const petId = event.target.dataset.petId;
            const quantity = document.getElementById('quantity').value;

            fetch('add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ petId, quantity }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateCartBadge(data.cartCount); // Update badge count
                    updateCartItems(); // Update cart items in offcanvas
                } else {
                    console.error('Error adding to cart');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    document.getElementById('offcanvasCart').addEventListener('show.bs.offcanvas', updateCartItems);
});


function updateCartBadge(count) {
    document.getElementById('cart-badge').textContent = count;
    document.getElementById('cart-badge-offcanvas').textContent = count;
}

function updateCartItems() {
    fetch('fetch_cart.php')
    .then(response => response.json())
    .then(data => {
        console.log('Cart data:', data);

        const cartItems = document.getElementById('cart-items');
        cartItems.innerHTML = '';
        let total = 0;

        data.items.forEach(item => {
            total += item.total;
            cartItems.innerHTML += `
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div class="me-3">
                        <img src="${item.image}" alt="${item.petName}" style="width: 50px; height: 50px; object-fit: cover;" class="img-thumbnail">
                    </div>
                    <div>
                        <h6 class="my-0">${item.petName}</h6>
                        <small class="text-muted">Quantity: ${item.quantity}</small>
                    </div>
                    <span class="text-muted">PKR ${item.price}</span>
                     
                </li>
                <span class="text-muted">TOTAL ${item.total}</span>
            `;
        });

        console.log('Total amount:', item.price);
        document.getElementById('total-price').querySelector('strong').textContent = `PKR ${total.toFixed(2)}`;
    })
    .catch(error => console.error('Error fetching cart items:', error));
}
