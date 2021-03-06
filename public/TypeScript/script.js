// Creacio dels arrays
var botonsSeleccionats = new Array;

var contador = 0;
var contador2 = 0;

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
    var final = document.getElementById("possiblesParaules");
    if(final != null){
      final.style.visibility = "hidden";
    }
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

    if(btnAbrirPopup != null){
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

    var btnAbrirPopup6 = document.getElementById('btn-abrir-popup6'),
    overlay6 = document.getElementById('overlay6'),
    popup6 = document.getElementById('popup6'),
    btnCerrarPopup6 = document.getElementById('btn-cerrar-popup6');

    if(btnAbrirPopup6 != null){
      btnAbrirPopup6.addEventListener('click', function(){
        overlay6.classList.add('active');
        popup6.classList.add('active');
        overlay.classList.remove('active');
        popup.classList.remove('active');
      });

      btnCerrarPopup6.addEventListener('click', function(e6){
        e6.preventDefault();
        overlay6.classList.remove('active');
        popup6.classList.remove('active');
      });
    }

    var btnAbrirPopup7 = document.getElementById('btn-abrir-popup7'),
    overlay7 = document.getElementById('overlay7'),
    popup7 = document.getElementById('popup7'),
    btnCerrarPopup7 = document.getElementById('btn-cerrar-popup7');

    if(btnAbrirPopup7 != null){
      btnAbrirPopup7.addEventListener('click', function(){
        overlay7.classList.add('active');
        popup7.classList.add('active');
        overlay.classList.remove('active');
        popup.classList.remove('active');
      });

      btnCerrarPopup7.addEventListener('click', function(e7){
        e7.preventDefault();
        overlay7.classList.remove('active');
        popup7.classList.remove('active');
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
    window.location.href = window.location.pathname + "?w1=" + botonsSeleccionats;
}

function ImatgeSeleccionada2(clicked){
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
}

// Funcio que serveix per que funcioni el apartat del buscador
function buscador(){
  contador2++;
      if(contador2 >= 1){
          // Aqui s'agafa el div de la llista prevista
          var element = document.getElementById("possiblesParaules");
          // Aqui s'eliminen tots els elements
          while(element.firstChild){
              element.removeChild(element.firstChild);
          }
      }
      // Aquest apartat agafa el valor que es coloca dins del buscador
      var buscador = document.getElementById("paraulaBuscada").value;
      // Aquest apartat es conecta al php que esta conectat al a la base de dades
      var variableAjax3=new XMLHttpRequest();
      variableAjax3.open("POST","consultaBaseDades.php",true);
      variableAjax3.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      variableAjax3.send("paraulaPasada=" + buscador);
      var final = document.getElementById("possiblesParaules");
      final.style.visibility = "visible";
      // Aquest apartat funciona quan canvia el estat de la variable variableAjax3
      variableAjax3.onreadystatechange = function(){
      // Apartat on es comprova si es correcte la connexio amb el php
      if(variableAjax3.readyState == 4 && variableAjax3.status == 200){
          // Aquest apartat agafa el response de la variableAjax3
          var xmlDoc=variableAjax3.responseXML;
          // Aquest apartat agafa els tags nom i descripcio
          var x5= xmlDoc.getElementsByTagName("nombre");
          var x6= xmlDoc.getElementsByTagName("id_servicio");
          // Inicialitzacio de les variables
          var contingut5 = "";
          var contingut6 = "";
          // For que coloca el contingut dins de les variables
          for (let i = 0; i < x5.length; i++) {
              // Aquest apartat crea el formulari
              var formulari = document.createElement("form");
              formulari.action = "http://localhost/InstantJob/public/compraProductes";
              formulari.method = "POST";
              // Aquest apartat coloca dins de les variables el contingut
              contingut5 = x5[i];
              contingut6 = x6[i];
              // Aquest apartat crea el boto que servira per veure la opcio que vol el usuari de totes les que es mostren
              var boto = document.createElement("input");
              var lletra = document.createElement("p");
              // Valors del boto amb el contingut
              boto.type = "submit";
              boto.id = contingut6.innerHTML;
              boto.classList.add("botoBuscador");
              boto.appendChild(lletra);
              boto.name = "boton";
              boto.value = contingut5.innerHTML;
              // Aquest apartat coloca el input hidden amb el id per aconseguir mostrar el producte en la vista de compra
              var inputHidden = document.createElement("input");
              inputHidden.type = "hidden";
              inputHidden.name = "id_servei";
              inputHidden.value = contingut6.innerHTML;
              formulari.appendChild(inputHidden);
              // Aquest apartat coloca al formulari el boto
              formulari.appendChild(boto);
              // Apartat on es coloca el resultat en el HTML
              var final = document.getElementById("possiblesParaules");
              final.appendChild(formulari);
          }
      }
  }
}

// Aquesta funcio recull la ubicacio de cada usuari cada minut i la guarda dins de la base de dades
function recollirUbicacio(id){
  // Aquest es l'apartat de opcions que s'executaran per obtenir l'ubicacio de l'usuari
  var options = {
      enableHighAccuracy: true,
      timeout: 5000,
      maximumAge: 0
    };
    
  // Aquesta funcio s'executa si s'aconsegueix l'obtencio de la posicio
    function success(pos) {
      // Variable que conte les coordenades de les posicions
      var crd = pos.coords;
      console.log(crd.longitude);
      console.log(crd.latitude);
      console.log(id);
      // Insercio en la base de dades de la longitud i la latitud amb el dia i l'hora 
      var variableAjax = new XMLHttpRequest();
      variableAjax.open("POST", "actualitzarUsuari.php", true);
      variableAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      variableAjax.send("id=" + id + "&longitud=" + crd.longitude + "&latitud=" + crd.latitude);
      variableAjax.onreadystatechange = function () {
          if (variableAjax.readyState == 4 && variableAjax.status == 200) {
              console.log("Proces realitzat correctament.");
          }
      }
    };
    
  // Funcio que s'executa quan el usuari bloqueja l aobtencio de la ubicacio del navegador
    function error(err) {
      console.log("error");

    };
    
    navigator.geolocation.getCurrentPosition(success, error, options);

}