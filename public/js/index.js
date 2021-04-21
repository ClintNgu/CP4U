const scrollBtn = document.querySelector('.btn-scroll-up');

window.onscroll = () => {
  if (window.pageYOffset >= 300) {
    scrollBtn.classList.add('btn-scroll-up-active');
  } else {
    scrollBtn.classList.remove('btn-scroll-up-active');
  }
};

scrollBtn.onclick = () => {
  $('html, body').animate({ scrollTop: 0 }, 1);
};
