// Si necesitas funcionalidad para la búsqueda
document.querySelector('.btn-search').addEventListener('click', function() {
    const searchTerm = document.querySelector('.search-input').value;
    // Implementar lógica de búsqueda
    console.log('Búsqueda:', searchTerm);
});

// custom.js
document.addEventListener("scroll", function() {
    const section = document.querySelector('.personal-care-section');
    if (section) {
      const offset = window.pageYOffset;
      section.style.backgroundPositionY = offset * 0.5 + "px";
    }
});
  