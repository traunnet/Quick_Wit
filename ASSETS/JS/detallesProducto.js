document.querySelectorAll('.miniatura').forEach(img => {
    img.addEventListener('click', function() {
        document.querySelector('.imagen-principal img').src = this.src;
    });
});
