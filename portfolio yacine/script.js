const menuHamburger = document.querySelector(".menu-hamburger")
const navLinks = document.querySelector(".contenant-liste-boutons")
const choices = document.querySelectorAll('.boutons a');

menuHamburger.addEventListener('click',()=>{
navLinks.classList.toggle('mobile-menu')
})
choices.forEach(choice => {
choice.addEventListener('click', () => {
    navLinks.classList.remove('mobile-menu');
});
});

const links = document.querySelectorAll('a[href^="#"]');

links.forEach(link => {
  link.addEventListener("click", e => {
    e.preventDefault();
    const href = link.getAttribute("href");
    const target = document.querySelector(href);
    const targetPosition = target.getBoundingClientRect().top;
    const startPosition = window.pageYOffset;
    const distance = targetPosition - startPosition;
    let startTime = null;

    function animation(currentTime) {
      if (startTime === null) startTime = currentTime;
      const timeElapsed = currentTime - startTime;
      const run = ease(timeElapsed, startPosition, distance, 900);
      window.scrollTo(0, run);
      if (timeElapsed < 900) requestAnimationFrame(animation);
    }

    function ease(t, b, c, d) {
      t /= d / 2;
      if (t < 1) return (c / 2) * t * t + b;
      t--;
      return (-c / 2) * (t * (t - 2) - 1) + b;
    }

    requestAnimationFrame(animation);
  });
});

document.querySelectorAll('a[href^="http"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    document.querySelector('.container').classList.remove('active');
    setTimeout(() => {
      window.location.href = this.getAttribute('href');
    }, 500);
    target.classList.add('active');
  });
});