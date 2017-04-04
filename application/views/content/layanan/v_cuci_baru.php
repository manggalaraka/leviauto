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
                <?php echo form_open('pelanggan/add'); ?>
                    <div class="form-group">
                        <div class="col-md-offset-1 col-md-8 col-xs-12">      
                                <label class="control-label">Nama Pelanggan</label> </br>                                      
                            <div class="input-group">
                                <input type="text" class="form-control" name="nama" placeholder="nama pelanggan"  required/>
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            </div>                                            
                            <span class="help-block">*isi nama pelanggan</span>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <div class="col-md-offset-1 col-md-10 col-xs-12">
                            <label class="control-label">Pilih Layanan</label> </br> 
                            <div class="panel-body">  
                                <?php  $no=0; foreach($layanan->result() as $hasil){ $no++;
                                    $val1 = $this->userauth->session_usr_encode($hasil->id_service);
                                    $val2 = $this->userauth->session_usr_encode($hasil->estimasi_service."_".$hasil->harga_service);
                                ?> 
                                    <div class="col-md-4 col-xs-4">                          
                                        <label class="check">
                                            <input type="checkbox" id="<?php echo $hasil->id_service;?>" name="layanan[]" value="<?php echo  $val1;?>" class="icheckbox"/> 
                                            <?php echo $hasil->nama_service;?>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                                        
                    <div class="form-group">
                        <div class="col-md-offset-1 col-md-8 col-xs-12">
                            <label class="control-label">Estimasi Waktu</label> </br> 
                            <div class="input-group bootstrap-timepicker">
                                <input type="text" class="form-control" name="estimasi_waktu" value="00:00:00" id="estimasi_waktu" placeholder="estimasi waktu" readonly/>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                            </div>
                            <span class="help-block">waktu layanan</span>
                        </div>
                    </div>
                    
                    <div class="form-group">                                        
                        <div class="col-md-offset-1 col-md-8 col-xs-12">
                                <label class="control-label">Harga</label> </br> 
                            <div class="input-group">
                                <input type="number" class="form-control" name="harga" id="harga" placeholder="harga" value="0" required readonly/>
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            </div>            
                            <span class="help-block">total harga</span>
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
