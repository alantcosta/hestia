<html>
<head>
    <meta charset="utf-8">
    <title>EONET How-to</title>

    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- OpenLayers -->
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.2.1/build/ol.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.2.1/css/ol.css" type="text/css">
    <style>
        .selections {
            width: 600px;
            float: left;
        }
        .map {
            height: 400px;
            width: 400px;
            float: left;
        }
    </style>

</head>
<body>

    <?php 
        //40.419898812 -120.824649104
        $lon = -120.824649104;
        $lat = 40.419898812;
        $zoom = 9;
        $x = floor((($lon + 180) / 360) * pow(2, $zoom));
        $y = floor((1 - log(tan(deg2rad($lat)) + 1 / cos(deg2rad($lat))) / pi()) /2 * pow(2, $zoom));
        echo "https://gibs-{s}.earthdata.nasa.gov/wmts/epsg3857/best/VIIRS_SNPP_CorrectedReflectance_TrueColor/default/2020-10-02/GoogleMapsCompatible_Level9/9/$y/$x.jpg"


        /*
         
api_json.html:101 40.419898812 0.7054603175923445 0.8516657400118339 1.3135199019085722 0.7725061046238556 1024 2.165185641920406
api_json.html:75 0 427
api_json.html:78 0 427 "tile.osm.org/9/0/427.png"

        */
        
    ?>
<div id="selections" class="selections">
    <h2>EONET How-to<span id="eventTitle"></span></h2>
    <div id="eventSelect"><dl id="eventList"></dl></div>
    <div id="layerSelect"><dl id="layerList"></dl></div>
</div>
<div id="map" class="map"></div>

<script>
    var server = "https://eonet.sci.gsfc.nasa.gov/api/v3/events/geojson";

    var zoom = 9
    // First, show the list of events
    $( document ).ready(function() {
        $.getJSON( server )
            .done(function( data ) {

                for(i = 0; i < data.features.length; i++){

                    if(data.features[i].properties.categories[0].id == 'wildfires'){
                        //console.log(data.features[i])
                        lat = data.features[i].geometry.coordinates[1]
                        lon = data.features[i].geometry.coordinates[0]


                        url = '<a href="http://localhost/golden_iris/maps3.php?lat='+lat+'&lon='+lon+'" target="_blank">link'+i+'</a><br>'
                        console.log(url)
                        

/*
                        var x = lat2tile(lat, zoom); // eg.lat2tile(34.422, 9);
                        var y = lon2tile(lon, zoom);
                        //var bottom_tile = lat2tile(south_edge, zoom);
                        // var right_tile  = lon2tile(east_edge, zoom);
                        // var width       = Math.abs(left_tile - right_tile) + 1;
                        // var height      = Math.abs(top_tile - bottom_tile) + 1;

                        // total tiles
                        // var total_tiles = width * height; // -> eg. 377
                        console.log(x,y)
                        tileUrl = "tile.osm.org/" + zoom + "/" + x + "/" + y + ".png"

                        console.log(x,y,tileUrl)
*/
                    }
                    
                }
                
            });
    });

    function lon2tile(lon,zoom) { 
        //lon = Math.abs(lon)
        return (Math.floor((lon+180)/360)*Math.pow(2,zoom)); 
    }
    function lat2tile(lat,zoom) { 
        // lat = Math.abs(lat))

        lat_rad = deg2rad(lat)
        lat_tan = Math.tan(lat_rad)
        lat_cos = 1/Math.cos(lat_rad)
        log = lat_tan + lat_cos
        lat_log = Math.log(log)
        pow = 2 * Math.pow(2,zoom)
        $y = Math.floor(
            (1 - Math.log(lat_tan + 1 / lat_cos) / Math.PI) / pow
        );

        
        console.log(lat,lat_rad,lat_tan,lat_cos ,lat_log,pow,log,$y)

        return Math.floor((1- Math.log(lat_log)/Math.PI)/ pow);
    }

    //function lat2tile(lat,zoom)  { return (Math.floor((1-Math.log(Math.tan(lat*Math.PI/180) + 1/Math.cos(lat*Math.PI/180))/Math.PI)/2 *Math.pow(2,zoom))); }

        
    function deg2rad(degrees){
        var pi = Math.PI;
        return degrees * (pi/180);
    }


    function tile2long(x,z) {
        return (x/Math.pow(2,z)*360-180);
    }
    function tile2lat(y,z) {
        var n=Math.PI-2*Math.PI*y/Math.pow(2,z);
        return (180/Math.PI*Math.atan(0.5*(Math.exp(n)-Math.exp(-n))));
    }


</script>

</body>
</html>