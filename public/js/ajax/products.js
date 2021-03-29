const filterBtn = document.querySelector('input[name=filterSubmit]');
const supplierInputs = [...document.querySelectorAll('.sidebar .suppliers input[type=checkbox')];
const priceInputs = [...document.querySelectorAll('.sidebar .prices input[type=checkbox]')];
const spinner = document.querySelector('.spinner');
const productItem = document.querySelector('.product-item');

const toggleSpinner = () => {
  spinner.classList.toggle('d-none');
  productItem.classList.toggle('d-none');
};

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
      setTimeout(toggleSpinner, 900);
      // console.log(html);
      document.querySelector('.product-item').innerHTML = html;
    },
  });
});
