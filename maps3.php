<!DOCTYPE html>
<html>
<head>
	
	<title>Quick Start - Leaflet</title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <link rel="stylesheet" href="css/Leaflet.BigImage.min.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-image@latest/leaflet-image.js"></script>
    <script src="js/Leaflet.BigImage.min.js"></script>
	
</head>
<body>    
<header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.jpg" alt="" width="120px"></a>
                    </div>
                </div>
            </div>
        </div>
</header>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline-inverse">   
                    <div class="card-header">                
                        <h4 class="m-b-0 text-white"></h4>
                    </div>         
                    <div class="card-body">  
                        <div class="row">
                            <div class="col-md-2">   
                            <button id="snap" class="ui-button">Take a snapshot</button>
                      <br>
<a href="http://localhost/golden_iris/maps3.php?lat=45.366138604&lon=-122.986818801" target="_blank">link61</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=46.88251&lon=-123.05149" target="_blank">link62</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=48.218446822&lon=-118.270947453" target="_blank">link63</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=41.851314814&lon=-123.42684426" target="_blank">link64</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=42.227928799&lon=-122.742197181" target="_blank">link65</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=43.350955739&lon=-122.834541731" target="_blank">link66</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=39.48986&lon=-123.39049" target="_blank">link67</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=39.88961&lon=-111.77318" target="_blank">link68</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=47.91084&lon=-119.95536" target="_blank">link69</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=47.197243395&lon=-122.19787815" target="_blank">link70</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=47.680183716&lon=-117.545052067" target="_blank">link71</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=38.954&lon=-120.399" target="_blank">link72</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=42.608374486&lon=-121.908803321" target="_blank">link73</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=44.149852157&lon=-122.348473253" target="_blank">link74</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=41.766&lon=-123.375" target="_blank">link75</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=45.926&lon=-121.979" target="_blank">link76</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=48.397&lon=-116.089" target="_blank">link77</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=40.855780823&lon=-8.206094974" target="_blank">link78</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=47.21307&lon=-117.43577" target="_blank">link79</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=46.453&lon=-116.286" target="_blank">link80</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=44.172&lon=-122.231" target="_blank">link81</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=47.946&lon=-116.51" target="_blank">link82</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=40.619865222&lon=-105.687890624" target="_blank">link83</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=43.541&lon=-115.173" target="_blank">link84</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=39.937&lon=-111.779" target="_blank">link85</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=34.241&lon=-117.868" target="_blank">link86</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=40.628&lon=-106.794" target="_blank">link87</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=41.83497&lon=-106.60665" target="_blank">link88</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=32.738763631&lon=-116.721916532" target="_blank">link89</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=37.22187&lon=-119.30186" target="_blank">link90</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=45.732003266&lon=-110.92528361" target="_blank">link91</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=34.068932369&lon=-116.981639623" target="_blank">link92</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=34.053&lon=-116.992" target="_blank">link93</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=45.72&lon=-110.974" target="_blank">link94</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=46.3142&lon=-108.41234" target="_blank">link95</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=45.716&lon=-107.056" target="_blank">link96</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=46.849673063&lon=-120.698884248" target="_blank">link97</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=37.72701&lon=-6.78226" target="_blank">link98</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=20.86075&lon=-156.45003" target="_blank">link99</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=38.568&lon=-119.568" target="_blank">link100</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=46.099&lon=-112.233" target="_blank">link101</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=45.12807&lon=-121.45292" target="_blank">link102</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=33.45463&lon=-110.65461" target="_blank">link103</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=44.786&lon=-115.476" target="_blank">link104</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=48.14&lon=-113.165" target="_blank">link105</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=33.981&lon=-111.184" target="_blank">link106</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=38.03797&lon=-122.82678" target="_blank">link107</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=45.248&lon=-115.438" target="_blank">link108</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=40.64&lon=-110.452" target="_blank">link109</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=39.81831&lon=-121.08665" target="_blank">link110</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=39.52808&lon=-122.92501" target="_blank">link111</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=33.829&lon=-110.69" target="_blank">link112</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=44.389&lon=-110.821" target="_blank">link113</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=33.093&lon=-110.575" target="_blank">link114</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=40.611&lon=-110.714" target="_blank">link115</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=46.507&lon=-114.603" target="_blank">link116</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=40.164651466&lon=-120.782868339" target="_blank">link117</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=36.12778&lon=-121.59939" target="_blank">link118</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=33.53225&lon=-110.92064" target="_blank">link119</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=39.66555&lon=-122.67021" target="_blank">link120</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=33.405&lon=-111.385" target="_blank">link121</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=37.21565&lon=-122.28047" target="_blank">link122</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=38.60341&lon=-123.03842" target="_blank">link123</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=38.52873&lon=-122.29922" target="_blank">link124</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=49.47773&lon=-119.0852" target="_blank">link125</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=46.591&lon=-113.799" target="_blank">link126</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=36.43093&lon=-121.68527" target="_blank">link127</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=46.438&lon=-114.661" target="_blank">link128</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=48.845070236&lon=-119.546487749" target="_blank">link129</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=36.161&lon=-118.453" target="_blank">link130</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=34.46741&lon=-118.73451" target="_blank">link131</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=39.55093&lon=-121.49785" target="_blank">link132</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=33.742&lon=-109.709" target="_blank">link133</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=46.53214&lon=-120.55782" target="_blank">link134</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=38.65233&lon=-122.28957" target="_blank">link135</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=38.54583&lon=-122.38234" target="_blank">link136</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=38.50778&lon=-122.31088" target="_blank">link137</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=48.837&lon=-119.575" target="_blank">link138</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=33.561&lon=-109.099" target="_blank">link139</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=45.76&lon=-115.193" target="_blank">link140</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=35.831&lon=-105.863" target="_blank">link141</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=37.83803&lon=-121.78656" target="_blank">link142</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=39.28575&lon=-121.09252" target="_blank">link143</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=39.858&lon=-120.912" target="_blank">link144</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=44.723&lon=-121.679" target="_blank">link145</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=44.773&lon=-121.618" target="_blank">link146</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=43.808&lon=-117.898" target="_blank">link147</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=48.264&lon=-121.21" target="_blank">link148</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=36.42&lon=-118.448" target="_blank">link149</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=39.851&lon=-106.065" target="_blank">link150</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=34.157&lon=-117.91" target="_blank">link151</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=40.609&lon=-105.879" target="_blank">link152</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=45.63712&lon=-121.35347" target="_blank">link153</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=34.67655&lon=-118.51918" target="_blank">link154</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=37.882&lon=-119.643" target="_blank">link155</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=-13.18817&lon=-73.08268" target="_blank">link156</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=39.572&lon=-107.266" target="_blank">link157</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=47.991&lon=-120.7" target="_blank">link162</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=41.185&lon=-123.433" target="_blank">link163</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=37.812&lon=-119.647" target="_blank">link164</a><br>
<a href="http://localhost/golden_iris/maps3.php?lat=40.419898812&lon=-120.824649104" target="_blank">link165</a><br>
                            </div>
                            <div class="col-md-5">
                                    <div id="snapshot"></div>
                            </div>
                            <div class="col-md-5">
                                
                                    <div id="mapid" style="width: 100%; height: 800px;"></div>
                                    
                            </div>
                        </div>
                    </div> 
                </div>     
            </div>
        </div>
    </div>


    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>

        var lat = <?php echo $_GET['lat'] ?>;

        var lon = <?php echo $_GET['lon'] ?>

        var mymap = L.map('mapid').setView([lat , lon], 9);


        https://gibs.earthdata.nasa.gov/wmts/epsg4326/best/MODIS_Terra_L3_EVI_16Day/default/{Time}/{TileMatrixSet}/{TileMatrix}/{TileRow}/{TileCol}.png
        

        layer1 = 'MODIS_Terra_CorrectedReflectance_TrueColor';
        layer2 = 'MODIS_Aqua_CorrectedReflectance_TrueColor';
        layer3 = 'VIIRS_SNPP_CorrectedReflectance_TrueColor';
        var tileLayer = L.tileLayer(
            'https://gibs-{s}.earthdata.nasa.gov/wmts/epsg3857/best/' +
            '{layer}/default/{time}/{tileMatrixSet}/{z}/{y}/{x}.jpg',
            {
                layer: layer3,
                tileMatrixSet: 'GoogleMapsCompatible_Level9',
                maxZoom: 7,
                time: '2020-10-01',
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
    L.marker([-18.077,-45.426],{icon: logo}).bindPopup('Foco 1234 <br> coord: -23.501974, -46.846334<br> direção: 175° <br> Velocidade: 50m/h <br> Duração: 3 dias <br> Area: 15000km<sup>2</sup>').addTo(mymap);
    */


    var server = "https://eonet.sci.gsfc.nasa.gov/api/v3/events/geojson?status=open";

    // First, show the list of events
    jQuery (document ).ready(function() {
        jQuery.getJSON( server )
            .done(function( data ) {

                for(i = 0; i < data.features.length; i++){

                    if(data.features[i].properties.categories[0].id == 'wildfires'){
                        lat = data.features[i].geometry.coordinates[1]
                        lon = data.features[i].geometry.coordinates[0]
                        console.log(lat,lon)
                       // L.marker([lat.toFixed(4),lon.toFixed(4)],{icon: logo}).bindPopup('Foco 1234 <br> coord: -23.501974, -46.846334<br> direção: 175° <br> Velocidade: 50m/h <br> Duração: 3 dias <br> Area: 15000km<sup>2</sup>').addTo(mymap);
                    }
                    
                }
                
            });
    });


    L.control.bigImage().addTo(mymap);
    document.getElementById('snap').addEventListener('click', function() {
    leafletImage(mymap, doImage);
});

function doImage(err, canvas) {
    var img = document.createElement('img');
    var dimensions = map.getSize();
    img.width = dimensions.x;
    img.height = dimensions.y;
    img.src = canvas.toDataURL();
    snapshot.innerHTML = '';
    snapshot.appendChild(img);
}
    
   


    function lon2tile(lon,zoom) { 
        return (Math.floor((lon+180)/360*Math.pow(2,zoom))); 
    }
    function lat2tile(lat,zoom) { 
        return (Math.floor((1-Math.log(Math.tan(lat*Math.PI/180) + 1/Math.cos(lat*Math.PI/180))/Math.PI)/2 *Math.pow(2,zoom))); 
    }

    function tile2long(x,z) {
        return (x/Math.pow(2,z)*360-180);
    }
    function tile2lat(y,z) {
        var n=Math.PI-2*Math.PI*y/Math.pow(2,z);
        return (180/Math.PI*Math.atan(0.5*(Math.exp(n)-Math.exp(-n))));
    }

    var zoom        = 9;
    var top_tile    = lat2tile(-15.9378, zoom); // eg.lat2tile(34.422, 9);
    var left_tile   = lon2tile(-47.8663, zoom);
    //var bottom_tile = lat2tile(south_edge, zoom);
    // var right_tile  = lon2tile(east_edge, zoom);
    // var width       = Math.abs(left_tile - right_tile) + 1;
    // var height      = Math.abs(top_tile - bottom_tile) + 1;

    // total tiles
    // var total_tiles = width * height; // -> eg. 377
    console.log(top_tile,left_tile)

    </script>
</body>
</html>
