<?php 

$lon = $_GET['lat'];
$lat = $_GET['lon'];
$zoom = $_GET['zoom'];
$x = floor((($lon + 180) / 360) * pow(2, $zoom));
$y = floor((1 - log(tan(deg2rad($lat)) + 1 / cos(deg2rad($lat))) / pi()) /2 * pow(2, $zoom));
echo "https://gibs-{s}.earthdata.nasa.gov/wmts/epsg3857/best/VIIRS_SNPP_CorrectedReflectance_TrueColor/default/2020-10-02/GoogleMapsCompatible_Level9/9/$y/$x.jpg";  