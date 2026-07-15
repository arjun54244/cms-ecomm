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

                        ${(item.size || item.color) ? `
                        <div class="variant-badges mt-1">
                            ${item.size  ? `<span class="cart-badge">${item.size}</span>` : ''}
                            ${item.color ? `<span class="cart-badge" style="background:${item.color.toLowerCase()};color:#fff;border-color:${item.color.toLowerCase()}">${item.color}</span>` : ''}
                        </div>` : ''}

                    </td>

                    <td class="product-price">
                        ${formatPrice(item.price)}
                    </td>

                    <td class="product-quantity">

                        <div class="d-flex align-items-center justify-content-center">

                            <button
                                class="qty-minus btn btn-sm btn-light"
                                data-id="${item.id}"
                                data-size="${item.size || ''}"
                                data-color="${item.color || ''}">

                                -

                            </button>

                            <input
                                type="number"
                                min="1"
                                value="${item.quantity}"
                                data-id="${item.id}"
                                data-size="${item.size || ''}"
                                data-color="${item.color || ''}"
                                class="cart-qty form-control text-center mx-2"
                                style="width:70px">

                            <button
                                class="qty-plus btn btn-sm btn-light"
                                data-id="${item.id}"
                                data-size="${item.size || ''}"
                                data-color="${item.color || ''}">

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
                            data-id="${item.id}"
                            data-size="${item.size || ''}"
                            data-color="${item.color || ''}">

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

            const btn = e.target.closest(".qty-plus");

            let id = Number(btn.dataset.id);

            let size = btn.dataset.size || '';

            let color = btn.dataset.color || '';

            let cart = Cart.get();

            let product = cart.find(i =>
                i.id === id &&
                (i.size  || '') === size &&
                (i.color || '') === color
            );

            if (product) {

                Cart.update(id, size, color, product.quantity + 1);

                renderCart();
            }
        }

        if (e.target.closest(".qty-minus")) {

            const btn = e.target.closest(".qty-minus");

            let id = Number(btn.dataset.id);

            let size = btn.dataset.size || '';

            let color = btn.dataset.color || '';

            let cart = Cart.get();

            let product = cart.find(i =>
                i.id === id &&
                (i.size  || '') === size &&
                (i.color || '') === color
            );

            if (product) {

                let qty = product.quantity - 1;

                if (qty < 1) qty = 1;

                Cart.update(id, size, color, qty);

                renderCart();
            }
        }

        if (e.target.closest(".remove-cart")) {

            e.preventDefault();

            const el = e.target.closest(".remove-cart");
            Cart.remove(
                Number(el.dataset.id),
                el.dataset.size  || '',
                el.dataset.color || ''
            );

            renderCart();
        }

    });

    document.addEventListener("change", function (e) {

        if (!e.target.classList.contains("cart-qty")) return;

        let qty = parseInt(e.target.value);

        if (isNaN(qty) || qty < 1)
            qty = 1;

        const input = e.target;

        Cart.update(

            Number(input.dataset.id),

            input.dataset.size  || '',

            input.dataset.color || '',

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