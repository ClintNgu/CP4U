const quanInput = document.querySelector('.product-container input[name=quantity]');
const quanDiv = document.querySelector('.product-container div.quantityDiv');

const minusBtn = document.querySelector('.product-container .btn.minus');
const plusBtn = document.querySelector('.product-container .btn.plus');

minusBtn.addEventListener('click', () => {
  const quantity = +quanInput.value;
  if (quantity > 1) {
    quanInput.value = quantity - 1;
    quanDiv.innerHTML = quantity - 1;
  }
});

plusBtn.addEventListener('click', () => {
  const quantity = +quanInput.value;
  quanInput.value = quantity + 1;
  quanDiv.innerHTML = quantity + 1;
});
