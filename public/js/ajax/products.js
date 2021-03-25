window.onload = () => {
  const btn = document.querySelector('input[name=filterSubmit]');
  const inputs = [...document.querySelectorAll('input.sidebar-input')];

  btn.addEventListener('click', () => {
    const suppliers = inputs.filter(({ checked }) => checked).map(({ value }) => value);
    $.ajax({
      method: 'POST',
      data: { suppliers },
      success: () => alert('success ajax'),
    });
  });
};
