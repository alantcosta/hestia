<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="description" content="Golden Iris | Automated Detection of Hazards">
    <meta name="keywords" content="Automated, Detection, Hazards, Fire, Nasa, Satelite">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HestIA - Golden Iris | Automated Detection of Hazards</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>


</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
  
    <section class="hero">
        <div class="container-fluid">            
            <div class="row">
            <div class="col-md-2">                         
                                <form  autocomplete="off" action="" id="form_maps" name="form_maps" method="POST" >
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Raio</label>                        
                                                <select class="form-control multiselect" name="raio" >
                                                    <option value="1000">1 Km</option>
                                                    <option value="2000">2 Km</option>
                                                    <option value="3000">3 Km</option>
                                                    <option value="4000">4 Km</option>
                                                    <option value="5000">5 Km</option>
                                                    <option value="10000">5 Km</option>
                                                </select>
                                            </div>       
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Lat</label>                        
                                                <input type="number" id="lat" class="form-control" min="-90" max="90" step="0.000000" name="lat" value="">            
                                            </div>       
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Lon</label>  
                                                <input type="number" id="lon" class="form-control" min="-180" max="180" step="0.000000" name="lon" value="">            
                                            </div>       
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">        
                                            <div class="form-group text-center">
                                                <button type="submit" name="" id="btn_salvar" value="1" class="btn btn-primary btn_acao">Filtrar</button>   
                                                <input type="reset" id="btn_limpar" class="btn btn-warning btn_acao" value="Limpar">             
                                            </div>       
                                        </div>     
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-10">
                                
                                    <div id="mapid" style="width: 100%; height: 800px;"></div>
                            </div>
                   
            </div>
        </div>
    </section>


    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <script>

        var lat =  -15.9378 
        var lon = -47.8663

        var mymap = L.map('mapid').setView([-15.9378 , -55.8663], 5);


        https://gibs.earthdata.nasa.gov/wmts/epsg4326/best/MODIS_Terra_L3_EVI_16Day/default/{Time}/{TileMatrixSet}/{TileMatrix}/{TileRow}/{TileCol}.png

        
        var tileLayer = L.tileLayer(
            'https://gibs-{s}.earthdata.nasa.gov/wmts/epsg3857/best/' +
            '{layer}/default/{time}/{tileMatrixSet}/{z}/{y}/{x}.jpg',
            {
                layer: 'MODIS_Terra_CorrectedReflectance_TrueColor',
                tileMatrixSet: 'GoogleMapsCompatible_Level9',
                maxZoom: 9,
                time: '',
                tileSize: 256,
                subdomains: 'abc',
                noWrap: true,
                continuousWorld: true,
                // Prevent Leaflet from retrieving non-existent tiles on the
                // borders.
                bounds: [
                [-85.0511287776, -179.999999975],
                [85.0511287776, 179.999999975]
                ],
                attribution:
                '<a href="https://wiki.earthdata.nasa.gov/display/GIBS">' +
                'NASA EOSDIS GIBS</a>&nbsp;&nbsp;&nbsp;' +
                '<a href="https://github.com/nasa-gibs/web-examples/blob/master/examples/leaflet/webmercator-epsg3857.js">' +
                'View Source' +
                '</a>'
            });
            tileLayer.addTo(mymap);


    var logo = L.icon({
        iconUrl: 'img/fogo.png',
        iconSize:     [16, 16], // size of the icon
    });            

    /*
    L.marker([-23.501974, -46.846334],{icon: logo}).bindPopup('Foco 1234 <br> coord: -23.501974, -46.846334<br> direção: 175° <br> Velocidade: 50m/h <br> Duração: 3 dias <br> Area: 15000km<sup>2</sup>').addTo(mymap);
    L.marker([-7.2626, -49.3391],{icon: logo}).bindPopup('Foco 1234 <br> coord: -23.501974, -46.846334<br> direção: 175° <br> Velocidade: 50m/h <br> Duração: 3 dias <br> Area: 15000km<sup>2</sup>')   .addTo(mymap);
    L.marker([-10.4673, -56.9313],{icon: logo}).bindPopup('Foco 1234 <br> coord: -23.501974, -46.846334<br> direção: 175° <br> Velocidade: 50m/h <br> Duração: 3 dias <br> Area: 15000km<sup>2</sup>')   .addTo(mymap);
    L.marker([-12.2099, -63.5228],{icon: logo}).bindPopup('Foco 1234 <br> coord: -23.501974, -46.846334<br> direção: 175° <br> Velocidade: 50m/h <br> Duração: 3 dias <br> Area: 15000km<sup>2</sup>').addTo(mymap);
    L.marker([-15.9378, -47.8663],{icon: logo}).bindPopup('Foco 1234 <br> coord: -23.501974, -46.846334<br> direção: 175° <br> Velocidade: 50m/h <br> Duração: 3 dias <br> Area: 15000km<sup>2</sup>').addTo(mymap);
    */
    var server = "https://eonet.sci.gsfc.nasa.gov/api/v3/events/geojson?status=open";

    // First, show the list of events
    jQuery (document ).ready(function() {
        jQuery.getJSON( server )
            .done(function( data ) {

                for(i = 0; i < data.features.length; i++){

                    if(data.features[i].properties.categories[0].id == 'wildfires'){
                        console.log()
                        lat = data.features[i].geometry.coordinates[0]
                        lon = data.features[i].geometry.coordinates[1]
                        console.log(lat,lon)
                        L.marker([lon.toFixed(4),lat.toFixed(4)],{icon: logo}).bindPopup('Foco 1234 <br> coord: -23.501974, -46.846334<br> direção: 175° <br> Velocidade: 50m/h <br> Duração: 3 dias <br> Area: 15000km<sup>2</sup>').addTo(mymap);
                    }
                    
                }
                
            });
    });

    </script>

</body>

</html>