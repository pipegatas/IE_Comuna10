<?php //Conexion a la base de datos
	define("PG_DB"  , "postgres");
	define("PG_HOST", "postgresaws.cgrjiwt5k1ob.us-east-1.rds.amazonaws.com");
	define("PG_USER", "postgres");
	define("PG_PSWD", "postgres");
	define("PG_PORT", "5432");
	
	$conexion = pg_connect("dbname=".PG_DB." host=".PG_HOST." user=".PG_USER ." password=".PG_PSWD." port=".PG_PORT."");
  if (!$conexion) {
    echo "Error de conexión con la base de datos.";
    exit;
  }
?>

<!doctype html> 
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="viewport"
	      content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="CraftingGamerTom">
        <link rel="stylesheet" href="css/leaflet.css"><link rel="stylesheet" href="css/L.Control.Locate.min.css">
        <link rel="stylesheet" href="css/qgis2web.css"><link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="./minimap/Control.MiniMap.css" />
        <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.EasyButton/2.4.0/easy-button.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="SlideMenu/src/L.Control.SlideMenu.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">  
       
       <style>
        html, body, #map {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
            background-color: #f5f5dc;
        }
        
        #norte{
        position:relative;
        width:2%;
        left: 3%;
        padding: 1.2%;
      }
      .content {
        margin: 0.25rem;
        border-top: 1px solid #000;
        padding-top: 0.5rem;
      }
      .header {
        font-size: 1.8rem;
        color: #7f7f7f;
      }
      .title {
        font-size: 1.1rem;
        color: #7f7f7f;
        font-weight: bold;
      }
      #form {   /* Estilo formulario eliminar */
        display: none;
        position: absolute;
        top: 50%;
        left:20%;
        transform: translate(-50%, -50%);
        padding: 15px;
        border: 1px solid black;
        border-radius: 5px;
        z-index: 9999;
        background-color: #f5f5dc;
        opacity: 1.2;
        border-radius: 10px;
        width: 15%;
        border-bottom: 1px solid var (--color);
        font-family: 'Roboto', sans-serif;
        cursor: pointer;
        box-shadow: 0 5px 10px -5px rgb(0 0 0 /30%);
        transform: scale (0);
        transform: left bottom;
        transition: transform .4s;

      }  
      #form2 {    /* Estilos Formulario editar */
        display: none;
        position: absolute;
        top: 45%;
        left: 15%;
        transform: translate(-50%, -50%);
        background-color: #f5f5dc;
        padding: 15px;
        border: 1px solid black;
        border-radius: 5px;
        z-index: 9999;
        opacity: 1.2;
        border-radius: 10px;
        width: 15%;
        border-bottom: 1px solid var (--color);
        font-family: 'Roboto', sans-serif;
        cursor: pointer;
        box-shadow: 0 5px 10px -5px rgb(0 0 0 /30%);
      }
      #form3 {    /* Estilo formulario agregar */
        display: none;
        position: absolute;
        top: 40%;
        left: 15%;
        transform: translate(-50%, -50%);
        background-color: #f5f5dc;
        padding: 15px;
        border: 1px solid black;
        border-radius: 5px;
        z-index: 9999;
        opacity: 1.2;
        border-radius: 10px;
        width: 15%;
        border-bottom: 1px solid var (--color);
        font-family: 'Roboto', sans-serif;
        cursor: pointer;
        box-shadow: 0 5px 10px -5px rgb(0 0 0 /30%);
        transform: scale (0);
        transform: left bottom;
        transition: background-color: white;
      }
      #form input {
        margin-top: 10px;
      }
      #form button { /* Estilos botones formularios */
        position: relative;
        text-align:left;
        margin-top: 10px;
        background: white;
        padding: .8em 0;
        border: none;
        border-radius: .5em; 
      }
      #form2 button { /* Estilos botones formularios */
        position: relative;
        text-align:left;
        margin-top: 10px;
        background: white;
        padding: .8em 0;
        border: none;
        border-radius: .5em; 
      }
      #form3 button { /* Estilos botones formularios */
        position: relative;
        text-align:left;
        margin-top: 10px;
        background: white;
        padding: .8em 0;
        border: none;
        border-radius: .5em; 
      }
      h1 { /* Estilos titulo página */
			 text-align: center;
			 font-size: 24px;
			 margin: 20px 0;
		  }
        </style>
        <title>Instituciones educativas - Comuna 10</title>
        <h1> Instituciones educativas de la comuna 10 de Santiago de Cali </h1>
        
        
    </head>
    <body>
        <div id="map">
          <img id="norte" src="norte.png" style="z-index:9999" ></img></div>
     <!-------------------------------<FORMULARIO ELIMINAR PUNTO>--------------------------------------------->
        <div id="form" class="w3-container">
        <h2>Eliminar Punto</h2>
        <form id="deleteForm">
          <label for="id">ID del Punto:</label>
          <input class="w3-input w3-border" type="text" id="id" placeholder="ID_INSTITUCION" required>
          <br>
          <button type="submit" class="w3-button w3-red">Eliminar</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <button class="w3-button w3-black" type="button" onclick="cancelForm1()">Cancelar</button>
        </form>
      </div>
       <!-------------------------------<FORMULARIO EDITAR PUNTO>--------------------------------------------->
      <div id="form2" class="w3-container">
        <h2>Editar Punto</h2>
        <form id="editForm" action="php/editar.php" method="POST">
          
          <!--<label for="id">ID:</label>-->
          <input id="id" class="w3-input w3-border" name="id" placeholder="ID_INSTITUCION" required><br>
          <!--<label for="nombre">Nombre:</label>-->
          <input id="nombre" class="w3-input w3-border" name="nombre" placeholder="Nombre de la sede"required><br>
          <!--<label for="categoria">Categoria:</label>-->
          <input id="direccion" class="w3-input w3-border" name="direccion" placeholder="Direccion de la sede" required>
          <label for="id">Latitud:</label>
          <input id="lat" class="w3-input w3-border" name="lat" placeholder="Latitud" required>
          <label for="id">Longitud:</label>
          <input id="long" class="w3-input w3-border" name="long" placeholder="Longitud" required><br>
          <input type="submit" class="w3-button w3-teal" value="Guardar">&nbsp;&nbsp;
          <button type="button" class="w3-button w3-black" id="cancelEditingBtn">Cancelar</button>
        </form>
      </div>
       <!-------------------------------<FORMULARIO AÑADIR PUNTO>--------------------------------------------->
      <div id="form3" class="w3-container">
        <h2>Agregar Punto</h2>
        <form id="addForm" method="POST" action="php/nuevo.php">
          <input type="text" class="w3-input w3-border" id="id" name="id" placeholder="ID_INSTITUCION" required>
          <br>
          <input type="text" class="w3-input w3-border" id="nombre_sede" name="nombre_sede" placeholder="Nombre de la sede" required>
          <br>
          <input type="text" class="w3-input w3-border" id="direccion"  name="direccion" placeholder="Direccion de la sede" required>
          <label for="id">Latitud:</label>
          <input type="text" id="latitude" class="w3-input w3-border" name="latitude" placeholder="Latitud" readonly>
          <label for="id">Longitud:</label>
          <input type="text" id="longitude" class="w3-input w3-border" name="longitude" placeholder="Longitud" readonly>
          <br>
          <button type="submit" class="w3-button w3-teal">Guardar</button>&nbsp;&nbsp;
          <button type="button" class="w3-button w3-black" onclick="cancelForm3()">Cancelar</button>
        </form>
      </div> 

        <script src="js/qgis2web_expressions.js"></script>
        <script src="js/leaflet.js"></script><script src="js/L.Control.Locate.min.js"></script>
        <script src="js/leaflet.rotatedMarker.js"></script>
        <script src="js/leaflet.pattern.js"></script>
        <script src="js/leaflet-hash.js"></script>
        <script src="js/Autolinker.min.js"></script>
        <script src="js/rbush.min.js"></script>
        <script src="js/labelgun.min.js"></script>
        <script src="js/labels.js"></script>
        <script src="data/Comuna10_3.js"></script>
        <script src="./minimap/Control.MiniMap.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.EasyButton/2.4.0/easy-button.js"></script>
        <script src="geosearch/leaflet-search.js"></script>
        <script src="SlideMenu/src/L.Control.SlideMenu.js"></script>
        <script type="text/javascript" src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
    </body>    
    <script>
        var highlightLayer;
        function highlightFeature(e) {
            highlightLayer = e.target;

            if (e.target.feature.geometry.type === 'LineString') {
              highlightLayer.setStyle({
                color: '#ffff00',
              });
            } else {
              highlightLayer.setStyle({
                fillColor: '#ffff00',
                fillOpacity: 1
              });
            }
            highlightLayer.openPopup();
        }
        
        //Configuración del mapa
        var map = L.map('map', {
            zoomControl:true, maxZoom:28, minZoom:1
        }).fitBounds([[3.4060773949204455,-76.54482128904594],[3.43773702545907,-76.50621848925647]]);
        var hash = new L.Hash(map);
        map.attributionControl.setPrefix('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>');
        var autolinker = new Autolinker({truncate: {length: 30, location: 'smart'}});
        var bounds_group = new L.featureGroup([]);
        function setBounds() {
        }

     //Ubicacion del usuario
       var lc = L.control.locate({
         position: 'topleft',
         strings: {
         title: "Mostrar tu ubicación",
         popup: "Estás a {distance} {unit} de este punto",
         outsideMapBoundsMsg: "Estás fuera del limite del mapa"
        },
      }).addTo(map);
   //Otros mapas base
        map.createPane('pane_OpenTopoMap_0');
        map.getPane('pane_OpenTopoMap_0').style.zIndex = 400;
        var layer_OpenTopoMap_0 = L.tileLayer('https://a.tile.opentopomap.org/{z}/{x}/{y}.png', {
            pane: 'pane_OpenTopoMap_0',
            opacity: 1.0,
            attribution: '<a href="https://www.openstreetmap.org/copyright">Kartendaten: © OpenStreetMap-Mitwirkende, SRTM | Kartendarstellung: © OpenTopoMap (CC-BY-SA)</a>',
            minZoom: 1,
            maxZoom: 28,
            minNativeZoom: 0,
            maxNativeZoom: 18
        });
        layer_OpenTopoMap_0;
        map.createPane('pane_ESRIStandard_1');
        map.getPane('pane_ESRIStandard_1').style.zIndex = 401;
        var layer_ESRIStandard_1 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
            pane: 'pane_ESRIStandard_1',
            opacity: 1.0,
            attribution: '',
            minZoom: 1,
            maxZoom: 28,
            minNativeZoom: 0,
            maxNativeZoom: 20
        });
        layer_ESRIStandard_1;
        map.createPane('pane_OpenStreetMap_2');
        map.getPane('pane_OpenStreetMap_2').style.zIndex = 402;
        var layer_OpenStreetMap_2 = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            pane: 'pane_OpenStreetMap_2',
            opacity: 1.0,
            attribution: '',
            minZoom: 1,
            maxZoom: 28,
            minNativeZoom: 0,
            maxNativeZoom: 19
        });
        layer_OpenStreetMap_2;
        map.addLayer(layer_OpenStreetMap_2);
        //////////////Caracteristicas-Poligono Comuna 10////////////
        function pop_Comuna10_3(feature, layer) {
            layer.on({
                mouseout: function(e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                    if (typeof layer.closePopup == 'function') {
                        layer.closePopup();
                    } else {
                        layer.eachLayer(function(feature){
                            feature.closePopup()
                        });
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">comuna</th>\
                        <td>' + (feature.properties['comuna'] !== null ? autolinker.link(feature.properties['comuna'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">nombre</th>\
                        <td>' + (feature.properties['nombre'] !== null ? autolinker.link(feature.properties['nombre'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">shape_leng</th>\
                        <td>' + (feature.properties['shape_leng'] !== null ? autolinker.link(feature.properties['shape_leng'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">shape_area</th>\
                        <td colspan="2">' + (feature.properties['shape_area'] !== null ? autolinker.link(feature.properties['shape_area'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }
        
        function style_Comuna10_3_0() {
            return {
                pane: 'pane_Comuna10_3',
                opacity: 1,
                color: 'rgba(35,35,35,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 2,
                fillColor: 'rgba(57,133,196,1.0)',
                interactive: true,
            }
        }
        
        map.createPane('pane_Comuna10_3');
        map.getPane('pane_Comuna10_3').style.zIndex = 403;
        map.getPane('pane_Comuna10_3').style['mix-blend-mode'] = 'normal';
        var layer_Comuna10_3 = new L.geoJson(json_Comuna10_3, {
            attribution: '',
            interactive: true,
            dataVar: 'json_Comuna10_3',
            layerName: 'layer_Comuna10_3',
            pane: 'pane_Comuna10_3',
            onEachFeature: pop_Comuna10_3,
            style: style_Comuna10_3_0,
        });
        bounds_group.addLayer(layer_Comuna10_3);
        map.addLayer(layer_Comuna10_3);
        
        //Control de capas 
        var baseMaps = {};
        var leyenda = L.control.layers(baseMaps,{'<img src="legend/Comuna10_3.png" /> Comuna10': layer_Comuna10_3,"OpenStreetMap": layer_OpenStreetMap_2,"ESRI Standard": layer_ESRIStandard_1,"OpenTopoMap": layer_OpenTopoMap_0,}).addTo(map);
        setBounds();

        //Funcion para obtener los datos de las instituciones al dar click
        function info_popup(feature, layer){
          layer.bindPopup("<h1>" + feature.properties.nombre_sede + "</h1><hr>"+"<strong> ID_INSTITUCION: </strong>"+feature.properties.id+"<br/>"+"<strong> Direccion de la institucion: </strong>"+feature.properties.direccion+"<br/>");
        }

        //Carga de la BDG de pgADMIN como GEOJSON
          var ins_educativas = L.geoJSON();
        $.post("php/conexion_tabla.php",{
          peticion: 'cargar_datosBDG',
        },function (data, status, feature){
            if(status=='success'){
              ins_educativas = eval('('+data+')');
              var ins_educativas = L.geoJSON(ins_educativas, {
                 onEachFeature: info_popup
               });
               ins_educativas.eachLayer(function (layer) {
               layer.setZIndexOffset(1000);
               });
               leyenda.addOverlay(ins_educativas, 'Instituciones educativas');
               map.addLayer(ins_educativas);
           }
        });
       

       //Escala
       L.control.scale({position:'bottomleft'}).addTo(map);

       //Minimapa
       var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
       var osmAttrib='Map data &copy; OpenStreetMap contributors';

       var osm2 = new L.TileLayer(osmUrl, {minZoom: 0, maxZoom: 8, attribution: osmAttrib });
       var miniMap2 = new L.Control.MiniMap(osm2, { toggleDisplay: true }).addTo(map);
       

       //Vista principal del visor
       var homeButton = L.easyButton({
         states: [{
         stateName: 'home',
         icon: '<img src="icon/regresar.png"  align="absmiddle" height="16px" >',
         title: 'Vista principal',
         onClick: function (control) {
             map.setView([3.419214, -76.527664], 15);  
            }
          }]
       });
      homeButton.addTo(map);
        
//---------DESPLIEGE DEL FORMULARIO PARA AGREGAR DATOS
       var clickedLatLng;
        var marker;
        var isFormOpened = false;
        //Función para abrir el formulario
       function toggleForm3() {
         $('#form3').toggle();
          isFormOpened = !isFormOpened;// Invertir el estado del formulario
          if (isFormOpened) {
            map.on('click', onMapClick);
          } else {
           map.off('click', onMapClick);
           if (marker) {
            map.removeLayer(marker);
           }
          }
        }
        // Manejador de eventos para el clic en el mapa
        function onMapClick(a) {
        if (isFormOpened) { // Verificar si el formulario está abierto
        if (marker) {
          map.removeLayer(marker);
        }
           clickedLatLng = a.latlng;
           document.getElementById('latitude').value = clickedLatLng.lat;
           document.getElementById('longitude').value = clickedLatLng.lng;
           marker = L.marker(clickedLatLng).addTo(map);
           }
        } 
         //Función para resetear el formulario
        function resetForm3() {
         document.getElementById('addForm').reset();
        }
        //Función para cancelar el formulario
         function cancelForm3() {
         $('#form3').hide();
         isFormOpened = false; // Marcar el formulario como cerrado
         map.off('click', onMapClick);
         if (marker) {
          map.removeLayer(marker);
         }
         resetForm3(); // Restablecer los valores del formulario
       }
        // Manejador de eventos para enviar el formulario
        $('#addForm').submit(function(e) {
          e.preventDefault();
          $.ajax({
          url: $(this).attr('action'),
          type: 'POST',
          data: $(this).serialize(),
          success: function(response) {
          alert(response);
          resetForm3();
          location.reload(); // Restablecer los valores del formulario después de enviarlo
          },
          error: function() {
          alert('Error al guardar el punto.');
          }
          });
        });
        // Crear el EasyButton para abrir el formulario de añadir dato - punto
        var easyButton = L.easyButton('fa fa-user-plus', function() {
           toggleForm3();
        },'Añadir punto').addTo(map);

          // Código para mostrar/ocultar el formulario de eliminación
       function toggleForm() {
      $('#form').toggle();
        }
        //Funcion para reiniciar el formulario de eliminar marcador o punto
        function resetForm() {
         document.getElementById('deleteForm').reset();
        }
    // Código para eliminar el marcador o punto
       function eliminarPunto(id) {
         $.ajax({
         url: 'php/eliminar.php',
         type: 'POST',
         data: { id: id },
         success: function(response) {
          alert(response);
          resetForm();
          location.reload();
         },
          error: function() {
          alert('Error al eliminar el marcador.');
           }
          });
       }
    // Manejador de eventos para enviar el formulario
       $('#deleteForm').on('submit', function(event) {
         event.preventDefault();
        var id = $('#id').val();
         eliminarPunto(id);
       });
       // Función para cancelar el formulario
       function cancelForm1() {
          $('#form').hide();
         isFormOpened = false; // Marcar el formulario como cerrado
          resetForm3(); // Restablecer los valores del formulario
        }

     // Crear el EasyButton para abrir el formulario de eliminar dato - punto
        var eliminarButton = L.easyButton('fa-trash', function() {
         toggleForm();
         }, 'Eliminar Punto').addTo(map);


         //---DESPLIEGE DEL FORMULARIO PARA EDITAR DATOS----
            var marker2; // Variable para almacenar el marcador
         // Función para abrir o cerrar el formulario
        function toggleForm2() {
           $('#form2').toggle();
          if ($('#form2').is(':visible')) {
           // Si el formulario se muestra, agregar el evento de clic al mapa
           map.on('click', onMapClick2);
          } else {
           // Si el formulario se oculta, eliminar el marcador y el evento de clic del mapa
           map.off('click', onMapClick2);
            if (marker2) {
               map.removeLayer(marker2);
              marker2 = null; // Eliminar la referencia al marcador
            }
           }
        }
       // Manejador de eventos para el clic en el mapa
        function onMapClick2(e) {
          if ($('#form2').is(':visible')) {
          // Verificar si el formulario está visible
          if (marker2) {
             map.removeLayer(marker2);
            }
           var lat = e.latlng.lat;
           var long = e.latlng.lng;
           marker2 = L.marker([lat, long]).addTo(map);
           document.getElementById('lat').value = lat;
           document.getElementById('long').value = long;
          }
        }   
    // Función para cancelar el formulario
        function cancelForm() {
        document.getElementById('form2').style.display = 'none';
        }
    // Obtener referencia al contenedor del formulario
        var formContainer = document.getElementById('formContainer');
    // Obtener referencia al botón de cancelar
        var cancelEditingBtn = document.getElementById('cancelEditingBtn');
    // Establecer el manejador de eventos para el botón de cancelar
        cancelEditingBtn.addEventListener('click', function() {
         toggleForm2();
        });
         // Crear el botón de mostrar/ocultar formulario
        var editButton = L.easyButton('fa-pencil', function() {
         toggleForm2();
        }, 'Editar Punto').addTo(map);
        //////////Tabla de datos en el visor de Leaflet//////////////
        const right = '<div class="header">INSTITUCIONES EDUCATIVAS</div>';
        let contentsright = `<div class="content">
         <h4>Este menu permite visualizar de manera individual las instituciones registradas de la comuna 10 en la base de datos a través de un marcador en el mapa.</h4>
         <!-- Agrega la tabla dentro del panel -->
         <table class="table" id="locationsTable">
          <!-- Encabezado de tabla -->
         <thead class="thead-dark">
           <tr>
             <th>Id</th>
             <th>Nombre_Sede</th>
             <th>Direccion</th>
             <th>Acercar</th>
           </tr>
        </thead>
        <tbody>
          <?php
            // Consulta SQL para obtener los puntos
            $query = "SELECT id, nombre_sede, direccion,ST_X(geom) as lng, ST_Y(geom) as lat FROM ins_educativas ORDER BY id";
            $result = pg_query($conexion, $query);
            if (!$result) {
              echo "Error al obtener los puntos.";
              exit;
            }
            // Array para almacenar marcadores
            $markers = [];
            // Iterar resultados, generar las filas de la tabla y marcadores
            while ($row = pg_fetch_assoc($result)) {
              $id = $row['id'];
              $nombre_sede = $row['nombre_sede'];
              $direccion = $row['direccion'];
              $lat = $row['lat'];
              $lng = $row['lng'];
              echo "<tr>";
              echo "<td>$id</td>";
              echo "<td>$nombre_sede</td>";
              echo "<td>$direccion</td>";
              echo "<td><button onclick=\"zoomToLocation($lat, $lng)\"> Ir a...</button></td>";
              echo "</tr>";
            }
          ?>
        </tbody>
      </table>
    </div>`;
    var currentMarker;
    // Funcion para acercamiento a puntos individuales
    function zoomToLocation(lat, lng, nombre_sede) {
      if (currentMarker) {
        map.removeLayer(currentMarker);
      }
      // Creación de marcador en el punto 
      currentMarker = L.marker([lat, lng]).addTo(map);
      map.flyTo([lat, lng], 18);
    }
    /* SLIDEMENU RIGTHT */
    const slideMenu = L.control.slideMenu("", {
      position: "topright",
      menuposition: "topright",
      width: "40%",
      height: "500px",
      delay: "10",
      icon: "fa fa-table",


    }).addTo(map);
    slideMenu.setContents(right + contentsright);

    </script>
   
</html>
