window.onload = () => {
  const filterBtn = document.querySelector('input[name=filterSubmit]');
  const inputs = [...document.querySelectorAll('input.sidebar-input')];
  const spinner = document.querySelector('.spinner');
  const productItem = document.querySelector('.product-item');

  const toggleSpinner = () => {
    spinner.classList.toggle('d-none');
    productItem.classList.toggle('d-none');
  };

  filterBtn.addEventListener('click', () => {
    let suppliers = inputs.filter(({ checked }) => checked).map(({ value }) => value.toLowerCase());

    //get all suppliers
    if (suppliers.length === 0) {
      suppliers = inputs.map(({ value }) => value.toLowerCase());
    }

    $.ajax({
      url: window.location.href,
      method: 'POST',
      data: { suppliers: suppliers },
      beforeSend: toggleSpinner,
      success: (html) => {
        setTimeout(toggleSpinner, 800);
        document.querySelector('.product-item').innerHTML = html;
      },
    });
  });
};
