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
searchBox.oninput = async (e) => {
  const { value } = e.target;
  const data = new FormData();
  data.append('searchVal', JSON.stringify(value));

  const response = await fetch(window.location.href, {
    method: 'POST',
    body: data,
  });

  productItem.innerHTML = await response.text();
  initItems();
};

// Sidebar Filter Ajax
const findChecked = (inputs = []) => {
  let filtered = inputs.filter(({ checked }) => checked);
  filtered = (filtered.length === 0 ? inputs : filtered).map(({ value }) => value.toLowerCase());
  return filtered;
};

filterBtn.onclick = async () => {
  let suppliers = findChecked(supplierInputs);
  let prices = findChecked(priceInputs);
  toggleSpinner();

  const data = new FormData();
  data.append('suppliers', JSON.stringify(suppliers));
  data.append('prices', JSON.stringify(prices));
  data.append('searchVal', JSON.stringify(searchBox.value));
  const response = await fetch(window.location.href, {
    method: 'POST',
    body: data,
  });

  setTimeout(toggleSpinner, 700);
  productItem.innerHTML = await response.text();
  initItems();
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

// On Load
initItems();
