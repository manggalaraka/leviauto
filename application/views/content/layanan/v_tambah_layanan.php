    <div class="row">
        <div class="col-md-12">
            
            <div class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong><?php echo $judulContent; ?></strong> </h3>
                    <ul class="panel-controls">
                    </ul>
                </div>
                <div class="panel-body">

                <div class="panel-body">                                                                        
                <form>
                    <div class="form-group">
                        <div class="col-md-offset-1 col-md-8 col-xs-12">      
                            	<label class="control-label">Nama Layanan</label> </br>                                      
                            <div class="input-group">
                                <input type="text" class="form-control" name="nama" placeholder="nama layanan"  required/>
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            </div>                                            
                            <span class="help-block">*isi nama layanan</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-offset-1 col-md-8 col-xs-12">
                            <label class="control-label">Keterangan Layanan</label> </br>                                            
                            <textarea class="form-control" rows="8"></textarea>
                            <span class="help-block">isi Keterangan</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-offset-1 col-md-8 col-xs-12">
                            <label class="control-label">Estimasi Waktu</label> </br> 
                            <div class="input-group bootstrap-timepicker">
                                <input type="text" class="form-control timepicker24"/>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                            </div>
                            <span class="help-block">*isi waktu layanan</span>
                        </div>
                    </div>
                    
                    <div class="form-group">                                        
                        <div class="col-md-offset-1 col-md-8 col-xs-12">
                            	<label class="control-label">Harga</label> </br> 
                            <div class="input-group">
                                <input type="number" class="form-control" name="telepon" placeholder="telepon" required/>
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            </div>            
                            <span class="help-block">*isi harga</span>
                        </div>
                    </div>
                    
                 <div class="col-md-offset-1 col-md-8 col-xs-12">      
                    <label class="control-label">
                   		<strong>field bertanda * wajib diisi</strong>
                   </label>
                </div>
                    
                    </br></br></br>
                    <button class="btn btn-default">Clear Form</button>                                    
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
    

                </form>

                </div>
            </div>
            </div>
            
        </div>
    </div>                    
    
</div>