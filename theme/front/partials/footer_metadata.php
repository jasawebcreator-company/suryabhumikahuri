<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lenis@1.1.13/dist/lenis.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/motion@11.11.13/dist/motion.js"></script>
<script>
	const lenis = new Lenis({
  duration: 1.15,
  smoothWheel: true
});

function lenisFrame(time) {
  lenis.raf(time);
  requestAnimationFrame(lenisFrame);
}
requestAnimationFrame(lenisFrame);

function animateEntrance(target, options = {}) {
  const section = typeof target === 'string' ? document.querySelector(target) : target;
  const items = section.querySelectorAll(options.items || '[data-animate]');
  const targets = items.length ? Array.from(items) : [section];

  targets.forEach(function (item) {
    item.style.opacity = 0;
  });

  Motion.inView(section, function () {
    Motion.animate(
      targets,
      { opacity: [0, 1], transform: ['translateY(28px)', 'translateY(0px)'] },
      { duration: 0.8, delay: Motion.stagger(options.stagger || 0.1), ease: [0.22, 1, 0.36, 1] }
    );
  }, { amount: 'some' });
}

function animateHover(selector, options = {}) {
  document.querySelectorAll(selector).forEach(function (item) {
    item.addEventListener('mouseenter', function () {
      Motion.animate(item, { transform: 'translateY(' + (options.y || -6) + 'px) scale(' + (options.scale || 1) + ')' }, { duration: 0.3 });
    });

    item.addEventListener('mouseleave', function () {
      Motion.animate(item, { transform: 'translateY(0px) scale(1)' }, { duration: 0.3 });
    });
  });
}

</script>