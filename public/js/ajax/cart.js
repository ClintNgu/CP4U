let removeBtns;
const cartItemsContainer = document.querySelector('.cart-container .cart-items');
const navCartCount = document.querySelector('#navCartCount');

const initItems = () => {
  removeBtns = [...document.querySelectorAll('.cart-container .remove-btn')];
  removeBtns.forEach((btn) => {
    btn.onclick = async function () {
      const formData = new FormData();
      formData.append('removeBtn', this.dataset.idx);
      const response = await fetch(window.location.href, { method: 'POST', body: formData });
      cartItemsContainer.innerHTML = await response.text();
      navCartCount.innerHTML = removeBtns.length - 1;
      initItems();
    };
  });
};

initItems(); //onload
