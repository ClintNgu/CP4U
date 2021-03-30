const spinner = document.querySelector('.spinner');
const productItem = document.querySelector('.product-item');

const filterBtn = document.querySelector('input[name=filterSubmit]');
const supplierInputs = [...document.querySelectorAll('.sidebar .suppliers input[type=checkbox')];
const priceInputs = [...document.querySelectorAll('.sidebar .prices input[type=checkbox]')];

const loadMoreBtn = document.querySelector('button.loadMoreBtn');
let items = [...document.querySelectorAll('.item-wrapper')];
let showItemsCount = 10;

const toggleSpinner = () => {
  spinner.classList.toggle('d-none');
  productItem.classList.toggle('d-none');
};

// Load More Items
const showItems = (items, count) => {
  for (let i = 0; i < count; i++) {
    items[i].classList.remove('d-none');
  }
};

loadMoreBtn.addEventListener('click', () => {
  showItemsCount += 10;
  showItems(items, showItemsCount);
});

//  Filter Ajax
const findChecked = (inputs = []) => {
  let filtered = inputs.filter(({ checked }) => checked);
  filtered = (filtered.length === 0 ? inputs : filtered).map(({ value }) => value.toLowerCase());
  return filtered;
};

filterBtn.addEventListener('click', () => {
  let suppliers = findChecked(supplierInputs);
  let prices = findChecked(priceInputs);

  $.ajax({
    url: window.location.href,
    method: 'POST',
    data: { suppliers, prices },
    beforeSend: () => {
      toggleSpinner();
      $('html, body').animate({ scrollTop: 50 }, 1);
    },
    success: (html) => {
      setTimeout(toggleSpinner, 800);
      document.querySelector('.product-item').innerHTML = html;
      items = [...document.querySelectorAll('.item-wrapper')];
      showItemsCount = 10;

      showItems(items, showItemsCount);
    },
  });
});

// On Load
showItems(items, showItemsCount); // init first 10 items
