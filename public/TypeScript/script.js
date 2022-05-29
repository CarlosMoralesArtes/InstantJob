// Creacio dels arrays
var botonsSeleccionats = new Array;

var contador = 0;

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
  console.log("hola");
    // Apartat de la animació de carrega de la pàgina
    setTimeout(function(){
      var contenedor = document.getElementById('contenedor_carga');
      contenedor.style.visibility = 'hidden';
      contenedor.style.opacity = '0';
    }, 50);

    var btnAbrirPopup = document.getElementById('btn-abrir-popup'),
        overlay = document.getElementById('overlay'),
        popup = document.getElementById('popup'),
        btnCerrarPopup = document.getElementById('btn-cerrar-popup');
    console.log(btnAbrirPopup);

    if(btnAbrirPopup != null){
      // Aquest apartat serveix per quan es dona un clic fora que es tregui el iniciar sessio
      // var overlay2 = document.getElementById('overlay');

      // overlay2.addEventListener('click', function(){
      //   overlay.classList.remove('active');
      //     popup.classList.remove('active');
      // });

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
    }

    var btnAbrirPopup2 = document.getElementById('btn-abrir-popup2'),
        overlay2 = document.getElementById('overlay2'),
        popup2 = document.getElementById('popup2'),
        btnCerrarPopup2 = document.getElementById('btn-cerrar-popup2');

    if(btnAbrirPopup2 != null){
      // Aquest apartat serveix per quan es dona un clic fora que es tregui el registrar-se
      // var overlay2 = document.getElementById('overlay2');

      // overlay2.addEventListener('click', function(){
      //   overlay.classList.remove('active');
      //     popup.classList.remove('active');
      // });

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

    var btnAbrirPopup3 = document.getElementById('btn-abrir-popup3'),
    overlay3 = document.getElementById('overlay3'),
    popup3 = document.getElementById('popup3'),
    btnCerrarPopup3 = document.getElementById('btn-cerrar-popup3');

    if(btnAbrirPopup3 != null){
      // Aquest apartat serveix per quan es dona un clic fora que es tregui el registrar-se
      // var overlay3 = document.getElementById('overlay3');

      // overlay3.addEventListener('click', function(){
      //   overlay.classList.remove('active');
      //     popup.classList.remove('active');
      // });

      btnAbrirPopup3.addEventListener('click', function(){
        overlay3.classList.add('active');
        popup3.classList.add('active');
        overlay.classList.remove('active');
        popup.classList.remove('active');
      });

      btnCerrarPopup3.addEventListener('click', function(e3){
        e3.preventDefault();
        overlay3.classList.remove('active');
        popup3.classList.remove('active');
      });
    }

    var btnAbrirPopup4 = document.getElementById('btn-abrir-popup4'),
    overlay4 = document.getElementById('overlay4'),
    popup4 = document.getElementById('popup4'),
    btnCerrarPopup4 = document.getElementById('btn-cerrar-popup4');

    if(btnAbrirPopup4 != null){
      // Aquest apartat serveix per quan es dona un clic fora que es tregui el registrar-se
      // var overlay4 = document.getElementById('overlay4');

      // overlay4.addEventListener('click', function(){
      //   overlay.classList.remove('active');
      //     popup.classList.remove('active');
      // });

      btnAbrirPopup4.addEventListener('click', function(){
        overlay4.classList.add('active');
        popup4.classList.add('active');
        overlay.classList.remove('active');
        popup.classList.remove('active');
      });

      btnCerrarPopup4.addEventListener('click', function(e4){
        e4.preventDefault();
        overlay4.classList.remove('active');
        popup4.classList.remove('active');
      });
    }

    var btnAbrirPopup5 = document.getElementById('btn-abrir-popup5'),
    overlay5 = document.getElementById('overlay5'),
    popup5 = document.getElementById('popup5'),
    btnCerrarPopup5 = document.getElementById('btn-cerrar-popup5');

    if(btnAbrirPopup5 != null){
      // Aquest apartat serveix per quan es dona un clic fora que es tregui el registrar-se
      // var overlay5 = document.getElementById('overlay5');

      // overlay5.addEventListener('click', function(){
      //   overlay.classList.remove('active');
      //     popup.classList.remove('active');
      // });

      btnAbrirPopup5.addEventListener('click', function(){
        overlay5.classList.add('active');
        popup5.classList.add('active');
        overlay.classList.remove('active');
        popup.classList.remove('active');
      });

      btnCerrarPopup5.addEventListener('click', function(e5){
        e5.preventDefault();
        overlay5.classList.remove('active');
        popup5.classList.remove('active');
      });
    }
}

function openNav(){
	document.getElementById('mySidenav').style.width="250px";
}

function closeNav(){
	document.getElementById("mySidenav").style.width="0";
}

function ImatgeSeleccionada(clicked){

  if(botonsSeleccionats.length != 0){
    var imatgeSeleccionada = document.getElementById(botonsSeleccionats[0]);
    imatgeSeleccionada.classList.remove('seleccionat');
    botonsSeleccionats = [];
    var imatge = document.getElementById(clicked);
    imatge.classList.add('seleccionat');
    botonsSeleccionats.push(clicked);
  } else {
    var imatge = document.getElementById(clicked);
    imatge.classList.add('seleccionat');
    botonsSeleccionats.push(clicked);
  }
  console.log(botonsSeleccionats);
  window.location.href = window.location.pathname + "?w1=" + botonsSeleccionats;
// $.ajax(
//   {
//       url: 'get_var.php?var=<?php echo $var; ?>',
//       success: function( data ) {
//           alert( 'El servidor devolvio "' + botonsSeleccionats + '"' );
//       }
//   }
// )
}

// $('ul li').on('click', function() {
// 	$('li').removeClass('active');
// 	$(this).addClass('active');
// });



