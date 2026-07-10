document.addEventListener("DOMContentLoaded", function () {

    const tbody = document.getElementById("cart-items");

    if (!tbody) return;

    const subtotalEl = document.getElementById("cart-subtotal");
    const totalEl = document.getElementById("cart-total");
    const emptyCart = document.getElementById("empty-cart");
    const clearBtn = document.getElementById("clear-cart");

    function formatPrice(price) {
        return "₹" + Number(price).toLocaleString("en-IN", {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    function renderCart() {

        const cart = Cart.get();

        tbody.innerHTML = "";

        if (cart.length === 0) {

            emptyCart.style.display = "block";

            document.querySelector(".table-content").style.display = "none";

            subtotalEl.innerHTML = formatPrice(0);
            totalEl.innerHTML = formatPrice(0);

            return;
        }

        emptyCart.style.display = "none";
        document.querySelector(".table-content").style.display = "block";

        let subtotal = 0;

        cart.forEach(item => {

            const itemTotal = item.price * item.quantity;

            subtotal += itemTotal;

            tbody.innerHTML += `
                <tr>

                    <td class="product-thumbnail">

                        <a href="/product/${item.slug}">
                            <img src="${item.image}" width="90">
                        </a>

                    </td>

                    <td class="product-name">

                        <a href="/product/${item.slug}">
                            ${item.name}
                        </a>

                    </td>

                    <td class="product-price">
                        ${formatPrice(item.price)}
                    </td>

                    <td class="product-quantity">

                        <div class="d-flex align-items-center justify-content-center">

                            <button
                                class="qty-minus btn btn-sm btn-light"
                                data-id="${item.id}">

                                -

                            </button>

                            <input
                                type="number"
                                min="1"
                                value="${item.quantity}"
                                data-id="${item.id}"
                                class="cart-qty form-control text-center mx-2"
                                style="width:70px">

                            <button
                                class="qty-plus btn btn-sm btn-light"
                                data-id="${item.id}">

                                +

                            </button>

                        </div>

                    </td>

                    <td class="product-subtotal">

                        ${formatPrice(itemTotal)}

                    </td>

                    <td class="product-remove">

                        <a href="#"
                            class="remove-cart"
                            data-id="${item.id}">

                            <i class="fa fa-times"></i>

                        </a>

                    </td>

                </tr>
            `;
        });

        subtotalEl.innerHTML = formatPrice(subtotal);
        totalEl.innerHTML = formatPrice(subtotal);

        Cart.updateCount();
    }

    renderCart();

    document.addEventListener("click", function (e) {

        if (e.target.closest(".qty-plus")) {

            let id = Number(e.target.closest(".qty-plus").dataset.id);

            let cart = Cart.get();

            let product = cart.find(i => i.id === id);

            if (product) {

                Cart.update(id, product.quantity + 1);

                renderCart();
            }
        }

        if (e.target.closest(".qty-minus")) {

            let id = Number(e.target.closest(".qty-minus").dataset.id);

            let cart = Cart.get();

            let product = cart.find(i => i.id === id);

            if (product) {

                let qty = product.quantity - 1;

                if (qty < 1) qty = 1;

                Cart.update(id, qty);

                renderCart();
            }
        }

        if (e.target.closest(".remove-cart")) {

            e.preventDefault();

            let id = Number(e.target.closest(".remove-cart").dataset.id);

            Cart.remove(id);

            renderCart();
        }

    });

    document.addEventListener("change", function (e) {

        if (!e.target.classList.contains("cart-qty")) return;

        let qty = parseInt(e.target.value);

        if (isNaN(qty) || qty < 1)
            qty = 1;

        Cart.update(

            Number(e.target.dataset.id),

            qty

        );

        renderCart();

    });

    if (clearBtn) {

        clearBtn.addEventListener("click", function () {

            if (!confirm("Clear your shopping cart?"))
                return;

            Cart.clear();

            renderCart();

        });

    }

});