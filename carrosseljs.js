let currentSlide = 0;
const slides = document.querySelectorAll('.carousel-item');

function showSlide(index) {
    // Corrige a transição entre os slides
    slides.forEach((slide, i) => {
        slide.style.display = 'none';  // Esconde todos os slides
        if (i === index) {
            slide.style.display = 'block';  // Mostra apenas o slide atual
        }
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;  // Alterna para o próximo slide
    showSlide(currentSlide);
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;  // Alterna para o slide anterior
    showSlide(currentSlide);
}

document.addEventListener('DOMContentLoaded', () => {
    showSlide(currentSlide);  // Mostra o slide inicial ao carregar a página
});
