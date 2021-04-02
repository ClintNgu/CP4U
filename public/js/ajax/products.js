const spinner = document.querySelector('.spinner');
const searchBox = document.querySelector('.products-container .search-box');
const productItem = document.querySelector('.product-item');

const filterBtn = document.querySelector('input[name=filterSubmit]');
const supplierInputs = [...document.querySelectorAll('.sidebar .suppliers input[type=checkbox')];
const priceInputs = [...document.querySelectorAll('.sidebar .prices input[type=checkbox]')];

const loadMoreBtn = document.querySelector('button.loadMoreBtn');

const LOAD_COUNT = 8;
let showItemsCount;
let items;

// init items
const initItems = () => {
  items = [...document.querySelectorAll('.item-wrapper')];
  showItemsCount = LOAD_COUNT;
  loadMoreBtn.classList.remove('d-none');
  showItems(items, showItemsCount);
};

// Spinner
const toggleSpinner = () => {
  spinner.classList.toggle('d-none');
  productItem.classList.toggle('d-none');
  $('html, body').animate({ scrollTop: 60 }, 100);
};

// Search Box
searchBox.oninput = (e) => {
  const { value: searchVal } = e.target;

  $.ajax({
    method: 'POST',
    data: { searchVal },
    success: (html) => {
      productItem.innerHTML = html;
      initItems();
    },
  });
};

// Load More Btn
const showItems = (items, count) => {
  const { length } = items;

  if (count > length) {
    count = length;
    loadMoreBtn.classList.add('d-none');
  }

  for (let i = 0; i < count; i++) {
    items[i].classList.remove('d-none');
  }
};

loadMoreBtn.onclick = () => {
  showItemsCount += LOAD_COUNT;
  showItems(items, showItemsCount);
};

// Filter Ajax
const findChecked = (inputs = []) => {
  let filtered = inputs.filter(({ checked }) => checked);
  filtered = (filtered.length === 0 ? inputs : filtered).map(({ value }) => value.toLowerCase());
  return filtered;
};

filterBtn.onclick = () => {
  let suppliers = findChecked(supplierInputs);
  let prices = findChecked(priceInputs);

  $.ajax({
    method: 'POST',
    data: { suppliers, prices },
    beforeSend: toggleSpinner,
    success: (html) => {
      setTimeout(toggleSpinner, 600);
      productItem.innerHTML = html;
      initItems();
    },
  });
};

// On Load
initItems();
