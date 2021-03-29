const clearBtn = document.querySelector('.cart-container #clearCartBtn');

clearBtn.addEventListener('click', () => {
  $.ajax({
    url: window.location.href,
    method: 'POST',
    data: { clearAll: true },
    success: (html) => {
      document.querySelector('.cart-container .cart-items').innerHTML = html;
    },
  });
});
