'use strict';

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.slideshow').forEach(slideshow => {
        const caption = slideshow.querySelector('figcaption');
        const images = slideshow.querySelectorAll('img');

        let counter = Math.floor(Math.random() * images.length);
        let previousSlide;

        function update() {
            previousSlide?.classList.remove('active');

            const slide = images[++counter % images.length];
            slide.classList.add('active');
            if (caption) {
                caption.textContent = slide.alt;
            }

            previousSlide = slide;
        };

        update();
        setInterval(update, 5000);
    });
});
