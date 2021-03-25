window.onload = () => {
  const btn = document.querySelector('input[name=filterSubmit]');
  const inputs = [...document.querySelectorAll('input.sidebar-input')];

  const toggleSpinner = () => {
    document.querySelector('.spinner').classList.toggle('d-none');
    document.querySelector('.product-item').classList.toggle('d-none');
  };
  btn.addEventListener('click', () => {
    let suppliers = inputs.filter(({ checked }) => checked).map(({ value }) => value.toLowerCase());

    //get all suppliers
    if (suppliers.length === 0) {
      suppliers = inputs.map(({ value }) => value.toLowerCase());
    }

    $.ajax({
      url: `${window.location.href.replace(/\/+$/, '')}/filterSuppliers`,
      method: 'POST',
      data: { suppliers: suppliers },
      beforeSend: toggleSpinner,
      success: (html) => {
        setTimeout(toggleSpinner, 500);
        document.querySelector('.product-item').innerHTML = html;
      },
    });
  });
};
