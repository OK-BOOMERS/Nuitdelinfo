<?php
include_once 'header.php';
 ?>

<main class="info">
  <div class="f">

  <h2>Transports</h2>
  <div id="trait"></div>

  <p>Envie de découvrir la région ? Besoin de bouger dans ta ville ? Regarde les transports disponibles pour toi... </p>
  <div class="">
    <h3>Bus,trams...</h3>
    <div class="">
      <p>Voici les services de transports en communs disponibles dans ta ville</p>
      <br><a href="https://www.solea.info/">Soléa ( Mulhouse )</a><br>
      <a href="https://www.cts-strasbourg.eu/fr">CTS ( Strasbourg )</a>
    </div>


  </div>
  <div class="">
    <h3>Trains</h3>
    <div class="">
      <p>Jette un oeil ici si tu a besoin d'un billet de train</p>
      <br><a href="https://www.sncf.com/fr"> SNCF </a><br>
      <br><a href="https://www.ouigo.com/"> Ouigo </a>
    </div>


  </div>
  <div class="">
    <h3>Covoiturage</h3>
    <div class="">
      <p>Si tu préfère la compagnie en voiture regardes ici</p>
      <br><a href="https://www.blablacar.fr/"> Blablacar </a>
    </div>


  </div>
  <div class="">
    <h3>Vélos</h3>
    <div class="">
      <p>Si tu es sportif tu peut toujours utiliser le vélo !</p>
      <br><a href="https://www.compte-mobilite.fr/">A Mulhouse</a><br>
      <br><a href="https://velhop.strasbourg.eu/">A Strasbourg</a>
    </div>


  </div>
  <div class="">
    <h3>Cars</h3>
    <div class="">
      <p>Pour les longs trajets pas trop chers en car  regarde ici </p>
      <a href="https://fr.ouibus.com/"> Ouibus </a>
      <a href="https://www.flixbus.fr/"> Flixbus </a>
    </div>
  </div>

  <p> Et si tu as besoin , voici les gares à proximité d'ici :</p>

  <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.min.js'></script>
  <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.css' type='text/css' />
  <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
    <div id='map'></div>

  <script>
    mapboxgl.accessToken = 'pk.eyJ1Ijoibmljb251aXRkZWxpbmZvIiwiYSI6ImNrM3RiMjN6aTAwenkzbnBzNTM2eTVuNWwifQ.CIJrzI0F2tlctfZSQ-w8uA';
    var map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/mapbox/streets-v11',
      center: [7.335888, 47.750839],
      zoom: 13
    });

  map.addControl(new MapboxGeocoder({
  accessToken: mapboxgl.accessToken,
  mapboxgl: mapboxgl
  }));
</script>
</div>

<div class="s">

  <img id="tra" src="transport.png" alt="">
</div>
</main>




 <?php
include_once 'footer.php';
 ?>
