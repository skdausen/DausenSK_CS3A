// Controls a slideshow: shows the slide at the given index by shifting slides container and highlights the corresponding dot indicator.

let currentSlide = 0;

function showSlide(index) {
    const slides = document.querySelector('.slides');
    const dots = document.querySelectorAll('.dot');
    currentSlide = index;

    slides.style.transform = `translateX(-${index * 100}%)`; //move slides based on index

    dots.forEach(dot => dot.classList.remove('active'));
    dots[index].classList.add('active');
}

showSlide(0);
