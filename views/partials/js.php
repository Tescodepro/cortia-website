<!-- JS here - Deferred loading for better performance -->
<script src="views/assets/js/vendor/jquery.js" defer></script>
<script src="views/assets/js/vendor/waypoints.js" defer></script>
<script src="views/assets/js/bootstrap-bundle.js" defer></script>
<script src="views/assets/js/swiper-bundle.js" defer></script>
<script src="views/assets/js/slick.js" defer></script>
<script src="views/assets/js/range-slider.js" defer></script>
<script src="views/assets/js/magnific-popup.js" defer></script>
<script src="views/assets/js/nice-select.js" defer></script>
<script src="views/assets/js/purecounter.js" defer></script>
<script src="views/assets/js/wow.js" defer></script>
<script src="views/assets/js/isotope-pkgd.js" defer></script>
<script src="views/assets/js/imagesloaded-pkgd.js" defer></script>
<script src="views/assets/js/ajax-form.js" defer></script>
<script src="views/assets/js/main.js" defer></script>

<!-- Lazy Loading for images -->
<script>
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                    }
                    imageObserver.unobserve(img);
                }
            });
        });
        document.querySelectorAll('img[data-src]').forEach(img => imageObserver.observe(img));
    } else {
        document.querySelectorAll('img[data-src]').forEach(img => {
            img.src = img.dataset.src;
            img.removeAttribute('data-src');
        });
    }
</script>