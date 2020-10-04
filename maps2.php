<?php 
 include('db.php');



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lat = isset($_POST['lat'])? $_POST['lat'] : -18.35;
    $lon = isset($_POST['lon'])? $_POST['lon'] : -49.40;
    $data = isset($_POST['data'])? $_POST['data'] : '2020-10-02';
    $raio = isset($_POST['raio'])? $_POST['raio'] : 10000;
    
    

    if ($_FILES['imagem']['name'] != ''){
        $uploaddir = '/tmp/';
        $uploadfile = $uploaddir . basename($_FILES['imagem']['name']);
        
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadfile)) {
            $type = pathinfo($uploadfile, PATHINFO_EXTENSION);
            $data = file_get_contents($uploadfile);
            $imgbase64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            $dados = [
                'imagem'=>$imgbase64,
                'lat'=>$lat,
                'lon'=>$lon        
            ];
            $resp = http_post('http://0.0.0.0:8080/predict',$dados);
            print_r($resp);
        } else {
            echo "Erro ao enviar os arquivos\n";
        }
    }
    



    //print_r($dados);



}else{
    $lat = -18.35;
    $lon = -49.40;
    $data = '2020-10-02';
    $raio = 10000;

}

 
 $sql = "
        with cte as (
            select lat,lon,geo,coord ,
            ST_Distance(geo, ST_SetSRID(ST_MakePoint(:lon,:lat),4326)::geography )::integer as distancia,
            5 as dias,
            15 as area
            from hestia.focos 
            where acq_date = :data 
            --and satellite = 'N' 
           
        )select * from cte 
        where distancia <= :distancia
        order by distancia 
        asc limit 2000
        ";

$stmt = $pdo->prepare($sql);

// pass values to the statement
$stmt->bindValue(':data', $data);
$stmt->bindValue(':lat', $lat);
$stmt->bindValue(':lon', $lon);
$stmt->bindValue(':distancia', $raio);
$stmt->execute();


$sql = "
        with cte_cluster as (
            with cte as (
                select lat,lon,geo,coord ,
                ST_Distance(geo, ST_SetSRID(ST_MakePoint(:lon,:lat),4326)::geography )::integer as distancia,
                5 as dias,
                15 as area
                from hestia.focos 
                where acq_date = :data 
                --and satellite = 'N' 

            )select unnest(ST_ClusterWithin(coord, 1000)) as cluster,  ( ST_Centroid(ST_Collect( ST_ClusterWithin(coord, 1000) )) ) AS center 
            from cte 
            where distancia <= :distancia
            --limit 1000
            )
        SELECT ST_X(center) as lon,ST_Y(center) as lat,
        center as coord, 
        ST_Distance(center::geography, ST_SetSRID(ST_MakePoint(:lon,:lat),4326)::geography )::integer as distancia,
        5 as dias,
		15 as area        
        FROM cte_cluster";
$stmt2 = $pdo->prepare($sql);

// pass values to the statement
$stmt2->bindValue(':data', $data);
$stmt2->bindValue(':lat', $lat);
$stmt2->bindValue(':lon', $lon);
$stmt2->bindValue(':distancia', $raio);
$stmt2->execute();        


function http_post($url,$data){	                                                                   
    $data_string = json_encode($data);  																				 
    $ch = curl_init($url);                                                                      
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',                                                                                
        'Content-Length: ' . strlen($data_string))                                                                       
    );                                       																			 
    $result = curl_exec($ch);
}        

?>

<!DOCTYPE html>
<html>
<head>
	
	<title>HestIA - Golden Irir | Automated Detection of Hazards</title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>


	
</head>
<body>    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline">   
                    <div class="card-body">                         
                        <div class="row">
                            <div class="col-md-2">        
                            <img src="img/logo.gif" alt="" width="120px">                 
                                <form  autocomplete="off" action="maps2.php" id="form_maps" name="form_maps" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Raio</label>                        
                                                <select class="form-control multiselect" name="raio" >
                                                    <option value="10000" <?php if($raio == 10000){ echo 'selected'; }?> >10 Km</option>
                                                    <option value="20000" <?php if($raio == 20000){ echo 'selected'; }?> >20 Km</option>
                                                    <option value="50000" <?php if($raio == 30000){ echo 'selected'; }?> >50 Km</option>                                                    
                                                    <option value="100000" <?php if($raio == 100000){ echo 'selected'; }?> >100 Km</option>
                                                </select>
                                            </div>       
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>UPLOAD</label>                        
                                                <input type='file' id="imagem" class="form-control"name="imagem" value="" />
                                            </div>       
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Lat</label>                        
                                                <input type="text" id="lat" class="form-control" name="lat" value="<?php echo $lat ?>">            
                                            </div>       
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Lon</label>  
                                                <input type="text" id="lon" class="form-control" name="lon" value="<?php echo $lon ?>">            
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
                                
                                    
                                <?php 
                                    if(isset($imgbase64)) { ?>

                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="<?php echo $imgbase64 ?>" width="100%" />
                                        </div>                                    
                                    </div>
                                <?php } ?>
                                    
                            </div>
                            <div class="col-md-10">
                                
                                    <div id="mapid" style="width: 100%; height: 800px;"></div>
                            </div>
                        </div>
                    </div> 
                </div>     
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>

        var lat = <?php echo $lat ?>;
        var lon = <?php echo $lon ?>;

        var mymap = L.map('mapid').setView([lat, lon], 9);


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
                maxZoom: 9,
                time: '2020-10-02',
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


    var server = "https://eonet.sci.gsfc.nasa.gov/api/v3/events/geojson?status=open";

    
    jQuery (document ).ready(function() {
        jQuery.getJSON( server )
            .done(function( data ) {

                for(i = 0; i < data.features.length; i++){

                    if(data.features[i].properties.categories[0].id == 'wildfires'){
                        lat = data.features[i].geometry.coordinates[1]
                        lon = data.features[i].geometry.coordinates[0]
                        console.log(lat,lon)
                        //L.marker([lat.toFixed(4),lon.toFixed(4)],{icon: logo}).bindPopup('Foco 1234 <br> coord: -23.501974, -46.846334<br> direção: 175° <br> Velocidade: 50m/h <br> Duração: 3 dias <br> Area: 15000km<sup>2</sup>').addTo(mymap);
                    }
                    
                }
                
            });
    });

    L.marker([<?php echo $lat ?>,<?php echo $lon ?>]).bindPopup('User').addTo(mymap);
    <?php while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) { 
        
            $desc = 'Foco: '.$row['coord'].'<br>';
            $desc .= 'Coord: '.$row['lat'].' , '.$row['lon'].'<br>';
            $desc .= 'Distancia: '.($row['distancia']/1000).' Km<br>';
            $desc .= 'Direção: '.'<br>';
            $desc .= 'Velocidade: '.'<br>';
            $desc .= 'Temperatura: '.'<br>';
            $desc .= 'Umidade: '.'<br>';
            $desc .= 'Duração: '.$row['dias'].'<br>';
            $desc .= 'Area: '.$row['area'].'km<sup>2</sup>';
        
        ?>
        
        L.marker([<?php echo $row['lat'] ?>,<?php echo $row['lon'] ?>],{icon: logo}).bindPopup('<?php echo $desc; ?>').addTo(mymap);

    <?php } ?>

    var logo = L.icon({
        iconUrl: 'img/fogo.png',
        iconSize:     [16, 16], // size of the icon
    }); 

    <?php while ($row = $stmt2->fetch(\PDO::FETCH_ASSOC)) { 
        
        $desc = 'Foco: '.$row['coord'].'<br>';
        $desc .= 'Coord: '.$row['lat'].' , '.$row['lon'].'<br>';
        $desc .= 'Distancia: '.($row['distancia']/1000).' Km<br>';
        $desc .= 'Direção: '.'<br>';
        $desc .= 'Velocidade: '.'<br>';
        $desc .= 'Temperatura: '.'<br>';
        $desc .= 'Umidade: '.'<br>';
        $desc .= 'Duração: '.$row['dias'].'<br>';
        $desc .= 'Area: '.$row['area'].'km<sup>2</sup>';
    
    ?>
    
    L.marker([<?php echo $row['lat'] ?>,<?php echo $row['lon'] ?>],{icon: logo}).bindPopup('<?php echo $desc; ?>').addTo(mymap);

<?php } ?>



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
