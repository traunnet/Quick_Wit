document.addEventListener('DOMContentLoaded', () => {
    const cols = document.querySelectorAll('.col-habilidad');

    function startRandomAnimation() {
        const randomIndex = Math.floor(Math.random() * cols.length);
        cols[randomIndex].style.animation = 'float 2s infinite alternate';
    }

    function stopAnimationOnHover() {
        cols.forEach(col => {
            col.addEventListener('mouseover', () => {
                col.style.animation = 'none';
            });

            col.addEventListener('mouseout', () => {
                col.style.animation = 'float 2s infinite alternate';
            });
        });
    }

    // Iniciar la animación aleatoria
    startRandomAnimation();
    setInterval(startRandomAnimation, 2000); // Cambiar cada 3 segundos
    stopAnimationOnHover();
});
