<?php
include_once 'header.php';
 ?>

<main>
  <h1>Transports</h1>
  <p>Envie de découvrir la région ? Besoin de bouger dans ta ville ? Regarde les transports disponibles pour toi... </p>
  <div class="">
    <h2>Bus,trams...</h2>
    <div class="">
      <p>Voici les services de transports en communs disponibles dans ta ville</p>
      <a href="https://www.solea.info/">Soléa ( Mulhouse )</a>
      <a href="https://www.cts-strasbourg.eu/fr">CTS ( Strasbourg )</a>
    </div>


  </div>
  <div class="">
    <h2>Trains</h2>
    <div class="">
      <p>Jette un oeil ici si tu a besoin d'un billet de train</p>
      <a href="https://www.sncf.com/fr"> SNCF </a>
      <a href="https://www.ouigo.com/"> Ouigo </a>
    </div>


  </div>
  <div class="">
    <h2>Covoiturage</h2>
    <div class="">
      <p>Si tu préfère la Compagnie en voiture Regardes ici</p>
      <a href="https://www.blablacar.fr/"> Blablacar </a>
    </div>


  </div>
  <div class="">
    <h2>Vélos</h2>
    <div class="">
      <p>Si tu es sportif tu peut toujours utiliser le vélo ;)</p>
      <a href="https://www.compte-mobilite.fr/">A Mulhouse</a>
      <a href="https://velhop.strasbourg.eu/">A Strasbourg</a>
    </div>


  </div>
  <div class="">
    <h2>Cars</h2>
    <div class="">
      <p>Pour les longs trajets pas trop chers regarde ici </p>
      <a href="https://fr.ouibus.com/"> Ouibus </a>
      <a href="https://www.flixbus.fr/"> Flixbus </a>
    </div>
  </div>

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

</main>




 <?php
include_once 'footer.php';
 ?>
