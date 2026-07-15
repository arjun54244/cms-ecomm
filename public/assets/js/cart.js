/* ==========================================
   Local Storage Shopping Cart
   ========================================== */

const Cart = {

    key: "shopping_cart",

    get() {
        return JSON.parse(localStorage.getItem(this.key)) || [];
    },

    save(cart) {
        localStorage.setItem(this.key, JSON.stringify(cart));
        this.updateCount();
        this.renderSidebar();
    },

    add(product) {

        let cart = this.get();

        // Use a composite key so the same product in different size/color combos are distinct items
        let existing = cart.find(item =>
            item.id   == product.id &&
            (item.size  || '') === (product.size  || '') &&
            (item.color || '') === (product.color || '')
        );

        if (existing) {

            existing.quantity += product.quantity;

        } else {

            cart.push(product);

        }

        this.save(cart);

    },

    remove(id, size, color) {

        let cart = this.get().filter(item =>
            !(item.id == id &&
              (item.size  || '') === (size  || '') &&
              (item.color || '') === (color || ''))
        );

        this.save(cart);

    },

    update(id, size, color, quantity) {

        let cart = this.get();

        cart.forEach(item => {

            if (item.id == id &&
                (item.size  || '') === (size  || '') &&
                (item.color || '') === (color || '')) {

                item.quantity = quantity;

            }

        });

        cart = cart.filter(item => item.quantity > 0);

        this.save(cart);

    },

    clear() {

        localStorage.removeItem(this.key);

        this.updateCount();

    },

    totalItems() {

        return this.get().reduce((total, item) => {

            return total + item.quantity;

        }, 0);

    },

    subtotal() {

        return this.get().reduce((total, item) => {

            return total + (item.price * item.quantity);

        }, 0);

    },

    renderSidebar() {

    const container = document.getElementById("sidebarCartItems");

    if (!container) return;

    const cart = this.get();

    if (cart.length === 0) {

        container.innerHTML = `

            <div class="text-center py-5">

                <i class="fal fa-shopping-bag fa-3x mb-3"></i>

                <p>Your cart is empty.</p>

            </div>

        `;

        document.getElementById("sidebarSubtotal").innerHTML = "₹0.00";

        return;

    }

    let html = "";

    cart.forEach(item => {

        const variantBadge = [
            item.size  ? `<span class="cart-badge">${item.size}</span>`  : '',
            item.color ? `<span class="cart-badge" style="background:${item.color.toLowerCase()};color:#fff;border-color:${item.color.toLowerCase()}">${item.color}</span>` : ''
        ].filter(Boolean).join(' ');

        html += `

        <div class="sidebar-list-item">

            <div class="product-image">

                <a href="/product/${item.slug}">

                    <img src="${item.image}" alt="${item.name}">

                </a>

            </div>

            <div class="product-desc">

                <div class="product-name">

                    <a href="/product/${item.slug}">

                        ${item.name}

                    </a>

                </div>

                ${variantBadge ? `<div class="variant-badges mt-1">${variantBadge}</div>` : ''}

                <div class="product-pricing">

                    <span class="item-number">

                        ${item.quantity} ×

                    </span>

                    <span class="price-now">

                        ₹${Number(item.price).toFixed(2)}

                    </span>

                </div>

                <button

                    class="remove-item remove-cart"

                    data-id="${item.id}"
                    data-size="${item.size || ''}"
                    data-color="${item.color || ''}">

                    <i class="fal fa-times"></i>

                </button>

            </div>

        </div>

        `;

    });

    container.innerHTML = html;

    document.getElementById("sidebarSubtotal").innerHTML =

        "₹" + this.subtotal().toFixed(2);

},

    updateCount() {

        document.querySelectorAll(".cart-count").forEach(el => {

            el.innerText = this.totalItems();

        });

    }

};

/* ==========================================
   Add To Cart Button
   ========================================== */

document.addEventListener("click", function (e) {

    if (!e.target.closest(".add-cart-btn")) return;

    e.preventDefault();

    let btn = e.target.closest(".add-cart-btn");

    let product = {

        id: Number(btn.dataset.id),

        name: btn.dataset.name,

        slug: btn.dataset.slug,

        image: btn.dataset.image,

        price: Number(btn.dataset.price),

        quantity: Number(btn.dataset.quantity || 1),

        size:  btn.dataset.size  || '',

        color: btn.dataset.color || ''

    };

    Cart.add(product);
    Cart.renderSidebar();

    btn.innerHTML = '<i class="fas fa-check"></i> Added';

    setTimeout(() => {

        btn.innerHTML = '<i class="fal fa-shopping-bag"></i> Add to Cart';

    }, 1200);

});


/* ==========================================
   Buy Now
   ========================================== */

document.addEventListener("click", function (e) {

    if (!e.target.closest(".buy-now-btn")) return;

    e.preventDefault();

    let btn = e.target.closest(".buy-now-btn");

    Cart.add({

        id: Number(btn.dataset.id),

        name: btn.dataset.name,

        slug: btn.dataset.slug,

        image: btn.dataset.image,

        price: Number(btn.dataset.price),

        quantity: Number(btn.dataset.quantity || 1),

        size:  btn.dataset.size  || '',

        color: btn.dataset.color || ''

    });
    Cart.renderSidebar();

    window.location = "/checkout";

});


/* ==========================================
   Remove Cart Item
   ========================================== */

document.addEventListener("click", function (e) {

    if (!e.target.closest(".remove-cart")) return;

    e.preventDefault();

    const el = e.target.closest(".remove-cart");
    Cart.remove(
        Number(el.dataset.id),
        el.dataset.size  || '',
        el.dataset.color || ''
    );

    // location.reload();
Cart.renderSidebar();
});


/* ==========================================
   Quantity Change
   ========================================== */

document.addEventListener("change", function (e) {

    if (!e.target.classList.contains("cart-qty")) return;

    let qty = parseInt(e.target.value);

    if (qty < 1) qty = 1;

    Cart.update(

        Number(e.target.dataset.id),

        qty

    );

    // location.reload();
    Cart.renderSidebar();

});


/* ==========================================
   Header Count
   ========================================== */

document.addEventListener("DOMContentLoaded", function () {

    Cart.updateCount();
    Cart.renderSidebar();
});