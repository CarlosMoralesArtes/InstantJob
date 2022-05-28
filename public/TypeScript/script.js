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

    var btnAbrirPopup2 = document.getElementById('btn-abrir-popup2'),
        overlay2 = document.getElementById('overlay2'),
        popup2 = document.getElementById('popup2'),
        btnCerrarPopup2 = document.getElementById('btn-cerrar-popup2');

    // Aquest apartat serveix per quan es dona un clic fora que es tregui el registrar-se
    // var overlay3 = document.getElementById('overlay2');

    // overlay3.addEventListener('click', function(){
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

function openNav(){
	document.getElementById('mySidenav').style.width="250px";
}

function closeNav(){
	document.getElementById("mySidenav").style.width="0";
}

botonsSeleccionats = ['imatgeCategoria1','imatgeCategoria2', 'imatgeCategoria3', 'imatgeCategoria4', 'imatgeCategoria5', 'imatgeCategoria6', 'imatgeCategoria7', 'imatgeCategoria8']

function ImatgeSeleccionada(clicked){
  var imatge = document.getElementById(clicked);
  for (let i = 0; i < botonsSeleccionats.length; i++) {
    var myIndex = botonsSeleccionats.indexOf(clicked);
    if (myIndex !== -1) {
      botonsSeleccionats.splice(myIndex, 1);
    }
    var imatgeEditar = document.getElementById(botonsSeleccionats[i]);
    imatgeEditar.classList.add('deseleccionat');
    imatgeEditar.setAttribute('disabled', 'disabled')
  }
  if(contador != 0){
    imatge.classList.remove('seleccionat');
    botonsSeleccionats.push(clicked);
    if (myIndex !== -1) {
      botonsSeleccionats.splice(myIndex, 1);
    }

    botonsSeleccionats = ['imatgeCategoria1','imatgeCategoria2', 'imatgeCategoria3', 'imatgeCategoria4', 'imatgeCategoria5', 'imatgeCategoria6', 'imatgeCategoria7', 'imatgeCategoria8']

    for (let i = 0; i < botonsSeleccionats.length; i++) {
      var myIndex = botonsSeleccionats.indexOf(clicked);
      if (myIndex !== -1) {
        botonsSeleccionats.splice(myIndex, 1);
      }
      var imatgeEditar = document.getElementById(botonsSeleccionats[i]);

      var imatgeSeleccionada = document.getElementById(clicked);
      imatgeSeleccionada.classList.remove('seleccionat');
      imatgeEditar.classList.remove('deseleccionat');
      console.log("hola");
    }
    contador = 0;
  } else {
    imatge.classList.add('seleccionat');
  }
}

// $('ul li').on('click', function() {
// 	$('li').removeClass('active');
// 	$(this).addClass('active');
// });
