var btnAbrirPopup = document.getElementById('btn-abrir-popup'),
        overlay = document.getElementById('overlay'),
        popup = document.getElementById('popup'),
        btnCerrarPopup = document.getElementById('btn-cerrar-popup');

        overlay.classList.add('active');
        popup.classList.add('active');
        overlay2.classList.remove('active');
        popup2.classList.remove('active');

        e.preventDefault();
        overlay.classList.remove('active');
        popup.classList.remove('active');
