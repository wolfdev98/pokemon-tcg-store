import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Evita que la rueda del mouse cambie el valor de los campos numéricos
document.addEventListener('wheel', function (e) {
    const activo = document.activeElement;
    if (activo && activo.type === 'number' && activo === e.target) {
        e.preventDefault();
    }
}, { passive: false });
