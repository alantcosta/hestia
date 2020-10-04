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