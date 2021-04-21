const qtyInput = document.querySelector(
  '.product-container input[name=quantity]',
);
const qtyDiv = document.querySelector('.product-container div.quantityDiv');

const minusBtn = document.querySelector('.product-container .btn.minus');
const plusBtn = document.querySelector('.product-container .btn.plus');

minusBtn.onclick = () => {
  const quantity = +qtyInput.value;
  if (quantity > 1) {
    qtyInput.value = quantity - 1;
    qtyDiv.innerHTML = quantity - 1;
  }
};

plusBtn.onclick = () => {
  const quantity = +qtyInput.value;
  qtyInput.value = quantity + 1;
  qtyDiv.innerHTML = quantity + 1;
};
