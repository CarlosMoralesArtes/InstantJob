window.addEventListener("load",inicio);
function inicio(){
    navigator.geolocation.getCurrentPosition(alexito, alerror);
    // navigator.geolocation.watchPosition(alexito, alerror);
}

async function alexito(info){
    const respuestaRaw3 = await fetch("obtener_productos3.php");
    const productos3 = await respuestaRaw3.json();
    console.log(productos3);
    for (const producto3 of productos3) {

    $men = producto3.mensaje;

    document.getElementById('mensaje').innerHTML = $men;
    }


    // document.getElementById('latitud').innerHTML = info.coords.latitude;
    // document.getElementById('longitud').innerHTML = info.coords.longitude;
    // lat = info.coords.latitude;
    // lon = info.coords.longitude;

    // localStorage.setItem("lat", lat);
    // localStorage.setItem("lon", lon);

    let ultimaCapa;
    var map = new ol.Map({
        target: 'map',
        layers: [
            new ol.layer.Tile({
            source: new ol.source.OSM()
            })
        ],
        view: new ol.View({
            center: ol.proj.fromLonLat([2.096726, 41.544223]),
            zoom: 16
        })
    });

    if (ultimaCapa) {
        mapa.removeLayer(ultimaCapa);
    }

    const respuestaRaw2 = await fetch("obtener_productos3.php");
    const productos = await respuestaRaw2.json();
    console.log(productos);
    for (const producto of productos) {

    $lati = producto.lat;
    $loni = producto.lon;

    document.getElementById('latitud').innerHTML = $loni;
    document.getElementById('longitud').innerHTML = $lati;

    var posicion ={ "longitud":$lati , "latitud":$loni, "foto":"jefe.jpg" };

    var coordenadas=[]
    coordenadas.push(posicion);
    }

    const marcadores = [];
    coordenadas.forEach(coordenada => {
        let marcador = new ol.Feature({
            geometry: new ol.geom.Point(
                ol.proj.fromLonLat([coordenada.longitud, coordenada.latitud])
            ),
        });
        marcador.setStyle(new ol.style.Style({
            image: new ol.style.Icon(({
                src: coordenada.foto,
                crossOrigin: null
            }))
        }));
        marcadores.push(marcador);
    });
    ultimaCapa = new ol.layer.Vector({
        source: new ol.source.Vector({
            features: marcadores,
        }),
    });
    map.addLayer(ultimaCapa);
    var date = new Date();
    result = date.toISOString();
    console.log(result);

    console.log(coordenadas);

}
function alerror(error){
    alert("No has acceptado al localizacion");
}

async function envi(){
    var usuario = document.getElementById("user").value;

    const user = usuario;
    const cargaUtil = {
        user: user,
    };
    const cargaUtilCodificada = JSON.stringify(cargaUtil);
    try {
        const respuestaRaw = await fetch("registrar2.php", {
            method: "POST",
            body: cargaUtilCodificada,
        });
        const respuesta = await respuestaRaw.json();
        console.log(respuesta);
        if (respuesta) {
            alert("Se ha puesto a la venta correctamente!");
            user = pass = admin = "";
        } else {
            alert("error");
        }
    } catch (e) {}
    location.reload;
}