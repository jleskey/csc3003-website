'use strict';

const IMAGE_ROOT = '../assets/slideshow';
const TIMEOUT = 3000;

const images = {
    'code.png': 'Vim in Use (Public Domain)',
    'game.png': 'A Game (Public Domain)',
    'library.jpg': 'A Library (Public Domain)',
    'pen.jpeg': 'A Red Pen (Public Domain)',
};

window.addEventListener('DOMContentLoaded', () => {
    /** @type {HTMLImageElement[]} */
    const imageCache = [];

    /** The current slide index */
    let index = 0;

    /** The number of ticks before normal slideshow operations can continue */
    let delay = 0;

    // HTML elements
    const container = document.getElementById('slideshow');
    const slide = document.getElementById('slide');
    const caption = document.getElementById('caption');
    const thumbnails = document.getElementById('thumbnails');

    // Activate thumbnail functionality.
    thumbnails.addEventListener('click', (event) => {
        if (event.target instanceof HTMLImageElement) {
            changeSlide(+event.target.dataset.index);
            delay = 2;
        }
    });

    // Preload all slide images.
    loadSlides();

    // Display first slide.
    changeSlide(index);

    // Start looping through slides.
    setInterval(() => {
        if (!delay) {
            changeSlide((index + 1) % imageCache.length)
        } else {
            delay--;
        }
    }, TIMEOUT);

    /**
     * Displays the given slide.
     */
    function changeSlide(newIndex) {
        const image = imageCache[newIndex];
        if (image) {
            index = newIndex;
            slide.src = image.src;
            slide.alt = image.alt;
            caption.textContent = image.alt;

            container.classList.toggle('anim-odd');
            container.classList.toggle('anim-even');

            selectThumbnail(index);
        }
    }

    function selectThumbnail(index) {
        const selector = `.thumbnail[data-index="${index}"]`;
        const thumbnail = document.querySelector(selector);
        if (thumbnail) {
            document.querySelector('.thumbnail.on')?.classList.remove('on');
            document.querySelector(selector)?.classList.add('on');
        }
    }

    /**
     * Preloads the images into the slides array.
     */
    function loadSlides() {
        Object.entries(images).forEach(([filename, altText], i) => {
            const image = loadImage(filename, altText);

            imageCache.push(image);

            image.classList.add('thumbnail');
            image.dataset.index = i;
            thumbnails.append(image);
        });
    }

    /**
     * Gets an image element from a filename.
     *
     * @param {string} filename The name of the image file
     * @param {string} altText The alt text for the image
     * @returns {HTMLImageElement}
     */
    function loadImage(filename, altText) {
        let image = new Image();
        image.src = `${IMAGE_ROOT}/${filename}`;
        image.alt = altText;
        return image;
    }
});
