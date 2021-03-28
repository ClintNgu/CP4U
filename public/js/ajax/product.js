const remain = +document.querySelector('.product-container .remain').innerHTML;
const quantity = document.querySelector('.product-container .quan');
const minusBtn = document.querySelector('.product-container .btn.minus');
const plusBtn = document.querySelector('.product-container .btn.plus');

const itemId = document.querySelector('.product-container #itemId');
const cartBtn = document.querySelector('.product-container input[name=cartSubmit]');

minusBtn.addEventListener('click', () => {
  const quan = +quantity.innerHTML;
  if (quan > 1) {
    quantity.innerHTML = quan - 1;
  }
});

plusBtn.addEventListener('click', () => {
  const quan = +quantity.innerHTML;
  if (quan < remain) {
    quantity.innerHTML = quan + 1;
  }
});

cartBtn.addEventListener('click', () => {
  // get product id

  console.log(itemId.value);
});
