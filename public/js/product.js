window.onload = () => {
  const scrollBtn = document.querySelector('.btn-scroll-up');

  window.addEventListener('scroll', () => {
    if (window.pageYOffset >= 100) {
      scrollBtn.classList.remove('d-none');
    } else {
      scrollBtn.classList.add('d-none');
    }
  });

  scrollBtn.addEventListener('click', () => {
    $('html, body').animate({ scrollTop: 0 }, 1);
  });
};
