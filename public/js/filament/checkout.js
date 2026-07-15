/**
 * checkout.js
 *
 * Production-ready guest checkout script.
 *
 * Expects a LocalStorage key "cart" containing an array of items shaped like:
 * [
 *   {
 *     "id": 12,
 *     "name": "Felted Shirt for Man",
 *     "slug": "felted-shirt-for-man",
 *     "image": "storage/products/felted-shirt.jpg",
 *     "price": 24.00,
 *     "quantity": 1
 *   },
 *   ...
 * ]
 *
 * If your existing cart.js uses a different LocalStorage key or item shape,
 * update the CART_STORAGE_KEY constant and the readCart()/mapCartItem()
 * functions below accordingly.
 */

(function () {
   'use strict';

   const CART_STORAGE_KEY = 'shopping_cart';

   const SHIPPING_CHARGE = 0; // Flat/free shipping. Adjust as needed.
   const TAX_RATE = 0; // e.g. 0.05 for 5%. Adjust as needed.
   const DISCOUNT_AMOUNT = 0; // Flat discount. Adjust as needed / wire up coupon logic.

   const CURRENCY_SYMBOL = '₹';

   const form = document.getElementById('checkout-form');
   const orderItemsTbody = document.getElementById('order-items-tbody');
   const subtotalEl = document.getElementById('subtotal-amount');
   const shippingEl = document.getElementById('shipping-amount');
   const discountRowEl = document.getElementById('discount-row');
   const discountEl = document.getElementById('discount-amount');
   const taxEl = document.getElementById('tax-amount');
   const grandTotalEl = document.getElementById('grand-total-amount');
   const cartDataInput = document.getElementById('cart-data');
   const placeOrderBtn = document.getElementById('place-order-btn');
   const placeOrderBtnText = document.getElementById('place-order-btn-text');
   const emptyCartMessage = document.getElementById('empty-cart-message');
   const formWrapper = document.getElementById('checkout-form-wrapper');
   const errorsBox = document.getElementById('checkout-errors');
   const errorsList = document.getElementById('checkout-errors-list');

   let currentCart = [];
   let currentTotals = {
      subtotal: 0,
      shipping: 0,
      discount: 0,
      tax: 0,
      grandTotal: 0,
   };

   function formatMoney(amount) {
      return CURRENCY_SYMBOL + Number(amount).toFixed(2);
   }

   function readCart() {
      try {
         const raw = localStorage.getItem(CART_STORAGE_KEY);
         const parsed = raw ? JSON.parse(raw) : [];
         return Array.isArray(parsed) ? parsed : [];
      } catch (e) {
         console.error('Failed to parse cart from LocalStorage:', e);
         return [];
      }
   }

   function mapCartItem(item) {
      return {
         id: item.id,
         name: item.name,
         slug: item.slug || '',
         image: item.image || '',
         price: Number(item.price) || 0,
         quantity: Number(item.quantity) || 1,
         size: item.size || '',
         color: item.color || '',
      };
   }

   function clearCart() {
      localStorage.removeItem(CART_STORAGE_KEY);
   }

   function showErrors(messages) {
      errorsList.innerHTML = '';
      messages.forEach(function (msg) {
         const li = document.createElement('li');
         li.textContent = msg;
         errorsList.appendChild(li);
      });
      errorsBox.style.display = 'block';
      errorsBox.scrollIntoView({ behavior: 'smooth', block: 'start' });
   }

   function hideErrors() {
      errorsBox.style.display = 'none';
      errorsList.innerHTML = '';
   }

   function renderOrderSummary() {
      currentCart = readCart().map(mapCartItem).filter(function (item) {
         return item.id && item.quantity > 0;
      });

      if (currentCart.length === 0) {
         if (formWrapper) formWrapper.style.display = 'none';
         if (emptyCartMessage) emptyCartMessage.style.display = 'block';
         return false;
      }

      if (formWrapper) formWrapper.style.display = '';
      if (emptyCartMessage) emptyCartMessage.style.display = 'none';

      orderItemsTbody.innerHTML = '';

      let subtotal = 0;

      currentCart.forEach(function (item) {
         const lineTotal = item.price * item.quantity;
         subtotal += lineTotal;

         const variantBadge = [
            item.size ? '<span class="badge bg-secondary" style="font-size:11px; margin-right:5px; padding: 4px 8px; font-weight: normal; color: #fff;">Size: ' + escapeHtml(item.size) + '</span>' : '',
            item.color ? '<span class="badge bg-secondary" style="font-size:11px; margin-right:5px; padding: 4px 8px; font-weight: normal; color: #fff;">Color: ' + escapeHtml(item.color) + '</span>' : ''
         ].filter(Boolean).join(' ');

         const tr = document.createElement('tr');
         tr.className = 'cart_item';
         tr.innerHTML =
            '<td class="product-name">' +
               (item.image ? '<img src="' + item.image + '" alt="' + escapeHtml(item.name) + '" style="width:50px;height:50px;object-fit:cover;margin-right:10px;vertical-align:middle;">' : '') +
               escapeHtml(item.name) +
               (variantBadge ? '<div style="margin-top:5px; margin-left:60px;">' + variantBadge + '</div>' : '') +
               ' <strong class="product-quantity"> × ' + item.quantity + '</strong>' +
            '</td>' +
            '<td class="product-total"><span class="amount">' + formatMoney(lineTotal) + '</span></td>';

         orderItemsTbody.appendChild(tr);
      });

      const shipping = SHIPPING_CHARGE;
      const discount = DISCOUNT_AMOUNT;
      const tax = Math.round((subtotal - discount) * TAX_RATE * 100) / 100;
      const grandTotal = subtotal + shipping + tax - discount;

      currentTotals = { subtotal: subtotal, shipping: shipping, discount: discount, tax: tax, grandTotal: grandTotal };

      subtotalEl.textContent = formatMoney(subtotal);
      shippingEl.textContent = shipping > 0 ? formatMoney(shipping) : 'Free';
      taxEl.textContent = formatMoney(tax);
      grandTotalEl.textContent = formatMoney(grandTotal);

      if (discount > 0) {
         discountRowEl.style.display = '';
         discountEl.textContent = '- ' + formatMoney(discount);
      } else {
         discountRowEl.style.display = 'none';
      }

      cartDataInput.value = JSON.stringify(currentCart);

      return true;
   }

   function escapeHtml(str) {
      const div = document.createElement('div');
      div.textContent = str == null ? '' : String(str);
      return div.innerHTML;
   }

   function setLoading(isLoading) {
      if (!placeOrderBtn) return;
      placeOrderBtn.disabled = isLoading;
      placeOrderBtn.style.opacity = isLoading ? '0.7' : '1';
      placeOrderBtn.style.cursor = isLoading ? 'not-allowed' : 'pointer';
      if (placeOrderBtnText) {
         placeOrderBtnText.textContent = isLoading ? 'Processing...' : 'Place order';
      }
   }

   function collectFormPayload() {
      const selectedPaymentMethodInput = document.querySelector('input[name="payment_method"]:checked');
      const paymentMethod = selectedPaymentMethodInput ? selectedPaymentMethodInput.value : 'razorpay';

      return {
         customer_name: document.getElementById('customer_name').value.trim(),
         email: document.getElementById('email').value.trim(),
         phone: document.getElementById('phone').value.trim(),
         address: document.getElementById('address').value.trim(),
         city: document.getElementById('city').value.trim(),
         state: document.getElementById('state').value.trim(),
         postal_code: document.getElementById('postal_code').value.trim(),
         customer_note: document.getElementById('customer_note') ? document.getElementById('customer_note').value.trim() : '',
         payment_method: paymentMethod,
         cart: currentCart,
      };
   }

   function postJson(url, payload) {
      return fetch(url, {
         method: 'POST',
         headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': window.CSRF_TOKEN,
            'X-Requested-With': 'XMLHttpRequest',
         },
         body: JSON.stringify(payload),
      }).then(function (response) {
         return response.json().then(function (data) {
            return { ok: response.ok, status: response.status, data: data };
         });
      });
   }

   function openRazorpay(checkoutData) {
      const options = {
         key: checkoutData.key,
         amount: checkoutData.amount,
         currency: 'INR',
         name: 'Your Store',
         description: 'Order #' + checkoutData.order_number,
         order_id: checkoutData.razorpay_order_id,
         prefill: {
            name: checkoutData.customer_name,
            email: checkoutData.email,
            contact: checkoutData.phone,
         },
         handler: function (response) {
            handlePaymentSuccess(checkoutData.order_id, response);
         },
         modal: {
            ondismiss: function () {
               handlePaymentFailed(checkoutData.order_id, 'Payment popup closed by user.');
               setLoading(false);
            },
         },
         theme: {
            color: '#000000',
         },
      };

      const rzp = new Razorpay(options);

      rzp.on('payment.failed', function (response) {
         handlePaymentFailed(
            checkoutData.order_id,
            response.error && response.error.description ? response.error.description : 'Payment failed.',
            response.error && response.error.metadata ? response.error.metadata.payment_id : null
         );
      });

      rzp.open();
   }

   function handlePaymentSuccess(orderId, razorpayResponse) {
      setLoading(true);

      postJson(window.PAYMENT_SUCCESS_URL, {
         order_id: orderId,
         razorpay_order_id: razorpayResponse.razorpay_order_id,
         razorpay_payment_id: razorpayResponse.razorpay_payment_id,
         razorpay_signature: razorpayResponse.razorpay_signature,
      })
         .then(function (result) {
            setLoading(false);

            if (result.ok && result.data.success) {
               clearCart();
               window.location.href = result.data.redirect_url || (window.ORDER_SUCCESS_BASE_URL + '/' + orderId);
            } else {
               showErrors([result.data.message || 'Payment verification failed. Please contact support.']);
            }
         })
         .catch(function (err) {
            setLoading(false);
            console.error(err);
            showErrors(['A network error occurred while verifying your payment. Please contact support if the amount was deducted.']);
         });
   }

   function handlePaymentFailed(orderId, reason, razorpayPaymentId) {
      postJson(window.PAYMENT_FAILED_URL, {
         order_id: orderId,
         reason: reason || 'Payment failed.',
         razorpay_payment_id: razorpayPaymentId || null,
      })
         .then(function () {
            showErrors([reason || 'Payment was not completed. You can try again.']);
         })
         .catch(function (err) {
            console.error(err);
            showErrors(['Payment was not completed, and we could not record the failure. Please try again.']);
         });
   }

   function handleFormSubmit(e) {
      e.preventDefault();
      hideErrors();

      if (!renderOrderSummary()) {
         showErrors(['Your cart is empty.']);
         return;
      }

      const payload = collectFormPayload();

      const requiredFields = ['customer_name', 'email', 'phone', 'address', 'city', 'state', 'postal_code'];
      const missing = requiredFields.filter(function (field) {
         return !payload[field];
      });

      if (missing.length > 0) {
         showErrors(['Please fill in all required billing fields.']);
         return;
      }

      setLoading(true);

      postJson(window.CHECKOUT_STORE_URL, payload)
         .then(function (result) {
            if (result.ok && result.data.success) {
               if (result.data.payment_method === 'cod') {
                  clearCart();
                  window.location.href = result.data.redirect_url;
               } else {
                  openRazorpay(result.data);
               }
               // Keep the button in loading state until Razorpay modal resolves;
               // it is reset in ondismiss / payment.failed / handlePaymentSuccess.
            } else {
               setLoading(false);

               if (result.status === 422 && result.data.errors) {
                  const messages = [];
                  Object.keys(result.data.errors).forEach(function (key) {
                     result.data.errors[key].forEach(function (msg) {
                        messages.push(msg);
                     });
                  });
                  showErrors(messages);
               } else {
                  showErrors([result.data.message || 'Something went wrong. Please try again.']);
               }
            }
         })
         .catch(function (err) {
            setLoading(false);
            console.error(err);
            showErrors(['A network error occurred. Please check your connection and try again.']);
         });
   }

   document.addEventListener('DOMContentLoaded', function () {
      renderOrderSummary();

      if (form) {
         form.addEventListener('submit', handleFormSubmit);
      }
   });
})();