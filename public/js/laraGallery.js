// Modal window
const modal = document.querySelector('#s-gallery-modal'),
    // Preview items
    previewItems = Array.from(document.querySelectorAll('.s-preview-item')),
    // Slides
    slides = Array.from(document.querySelectorAll('.s-slide'));

// Slide index
let currentIndex = 0;

// Open modal
function openModal(element) {
    // Checking device width
    if (window.innerWidth >= 991) {
        modal.style.display = 'block';
        changeSlider(element);
    }
}

// Close modal
function closeModal() {
    modal.style.display = 'none';
    updateClass(slides, 'active');
}

// Change current slider
function changeSlider(element) {
    let index = previewItems.indexOf(element);
    slides[index].classList.add('active');
    currentIndex = index;
}

// Move current slider
function moveSlider(direction) {
    currentIndex += direction;
    updateClass(slides, 'active');
    if (currentIndex >= slides.length) {
        currentIndex = 0;
    }

    if (currentIndex < 0) {
        currentIndex = slides.length - 1;
    }

    slides[currentIndex].classList.add('active');
}

// Update Class from a
// selected element
function updateClass(group, className) {
    group.forEach(item => {
        item.classList.remove(className);
    });
}


