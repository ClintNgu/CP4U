window.onload = () => {
  const btn = document.querySelector('input[name=filterSubmit]');
  const inputs = [...document.querySelectorAll('input.sidebar-input')];

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
      success: (html) => {
        document.querySelector('.product-items').innerHTML = html;
        // const products = Object.values(JSON.parse(json));
        // products.map((product, idx) => console.log(`${idx}: ${product}`));
      },
    });
  });
};
