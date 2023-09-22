// Obtener el elemento select
const select = document.getElementById('criterio');

// Agregar un evento para detectar cuando se abre o cierra
select.addEventListener('focus', () => {
    document.querySelector('.select-wrapper .btn').style.display = 'block';
});

select.addEventListener('blur', () => {
    setTimeout(() => {
        document.querySelector('.select-wrapper .btn').style.display = 'none';
    }, 200); // Ajusta este tiempo para controlar la velocidad de la animación
});
