window.addEventListener('load', function(){
	new Glider(document.querySelector('.carousel__lista'), {
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: '.carousel__indicadores',
		arrows: {
			prev: '.carousel__anterior',
			next: '.carousel__siguiente'
		},
		responsive: [
			{
			  // screens greater than >= 775px
			  breakpoint: 450,
			  settings: {
				// Set to `auto` and provide item width to adjust to viewport
				slidesToShow: 2,
				slidesToScroll: 2
			  }
			},{
			  // screens greater than >= 1024px
			  breakpoint: 800,
			  settings: {
				slidesToShow: 4,
				slidesToScroll: 4
			  }
			}
		]
	});
});

window.onload = function(){
    var btnAbrirPopup = document.getElementById('btn-abrir-popup'),
        overlay = document.getElementById('overlay'),
        popup = document.getElementById('popup'),
        btnCerrarPopup = document.getElementById('btn-cerrar-popup');

    btnAbrirPopup.addEventListener('click', function(){
        overlay.classList.add('active');
        popup.classList.add('active');
        overlay2.classList.remove('active');
        popup2.classList.remove('active');
    });

    btnCerrarPopup.addEventListener('click', function(e){
        e.preventDefault();
        overlay.classList.remove('active');
        popup.classList.remove('active');
    });

    var btnAbrirPopup2 = document.getElementById('btn-abrir-popup2'),
        overlay2 = document.getElementById('overlay2'),
        popup2 = document.getElementById('popup2'),
        btnCerrarPopup2 = document.getElementById('btn-cerrar-popup2');

    btnAbrirPopup2.addEventListener('click', function(){
        overlay2.classList.add('active');
        popup2.classList.add('active');
        overlay.classList.remove('active');
        popup.classList.remove('active');
    });

    btnCerrarPopup2.addEventListener('click', function(e2){
        e2.preventDefault();
        overlay2.classList.remove('active');
        popup2.classList.remove('active');
    });
}

function openNav(){
	document.getElementById('mySidenav').style.width="250px";
}

function closeNav(){
	document.getElementById("mySidenav").style.width="0";
<<<<<<< HEAD
}

$('ul li').on('click', function() {
	$('li').removeClass('active');
	$(this).addClass('active');
});
=======
}
>>>>>>> a327172058787605a70e3cf5347a14faf3aafb91
