//показ и скрытие описания товара
let productsWrapper = document.querySelector('.products-wrapper');

if(productsWrapper) {
showProductDescription(productsWrapper)
}

function showProductDescription(catalogWrapper)
{
	catalogWrapper.addEventListener('click', (e) => {
		if(e.target.hasAttribute('data-open')) {
			e.target.closest('div').parentNode.previousElementSibling.style.display = 'flex'
		}
		if (e.target.hasAttribute('data-close')) {
			e.target.closest('div').style.display = 'none';
		}
	})
}


//Добавление в корзину
