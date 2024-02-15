//показ и скрытие описания товара
import axios from "axios";

let productsWrapper = document.querySelector('.products-wrapper'),
	productParams = document.querySelector('.product-params');

if (productsWrapper || productParams) {
	if (productsWrapper) {
		showProductDescription(productsWrapper);
	}
	addToCart(productsWrapper ?? productParams);
}

clearCart();

function showProductDescription(catalogWrapper) {
	catalogWrapper.addEventListener('click', (e) => {
		if (e.target.hasAttribute('data-open') && e.target.tagName === 'BUTTON') {
			e.target.closest('div').parentNode.previousElementSibling.style.display = 'flex'
		}
		if (e.target.hasAttribute('data-close')) {
			e.target.closest('div').style.display = 'none';
		}
	})
}


//Добавление в корзину
function addToCart(catalogWrapper) {
	catalogWrapper.addEventListener('click', (e) => {
		if (e.target.hasAttribute('data-id') && e.target.tagName === 'BUTTON') {
			let productId = e.target.getAttribute('data-id');
			if (Number(productId)) {
				axios.post('/cart', {'id': productId})
					.then(function (response) {
						if (response.status === 200) {
							e.target.innerHTML = 'В корзине'
							e.target.classList.add('status-in-cart')
						}
					})
					.catch(function (response) {
						console.log(response.status)
					})
			}
		}
	})
}

//Очистка корзины
function clearCart() {
	let button = document.querySelector('.clear-cart-button');
	if (button) {
		button.addEventListener('click', (e) => {
			e.preventDefault();
			console.log(button);
			if (confirm('Очистить корзину?')) {
				axios.post('/cart/clear', {clear: true}).then(function (response) {
					if (response.status === 200) {
						e.target.parentNode.remove();
						document.querySelector(".cart-products-wrapper").remove();
					}
				})
			}
		})
	}
}
