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
                            	<label class="control-label">Nama</label> </br>                                      
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="form-control" name="nama" placeholder="nama"  required/>
                            </div>                                            
                            <span class="help-block">*isi nama akun</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-1 col-md-8 col-xs-12"> 
                            	<label class="control-label">Username</label> </br>                                             
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="form-control" name="username"  placeholder="username"  required/>
                            </div>                                            
                            <span class="help-block">*isi username akun</span>
                        </div>
                    </div>
                    
                    <div class="form-group">                                        
                        <div class="col-md-offset-1 col-md-8 col-xs-12">
                            	<label class="control-label">Password</label> </br> 
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="password" class="form-control" name="password" placeholder="password" required/>
                            </div>            
                            <span class="help-block">*isi username password</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-offset-1 col-md-8 col-xs-12">
                            <label class="control-label">Alamat</label> </br>                                            
                            <textarea class="form-control" rows="8"></textarea>
                            <span class="help-block">isi alamat</span>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">                                        
                        <div class="col-md-offset-1 col-md-8 col-xs-12">
                            	<label class="control-label">No Telepon</label> </br> 
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="number" class="form-control" name="telepon" placeholder="telepon" required/>
                            </div>            
                            <span class="help-block">*isi nomor telepon</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-1 col-md-8 col-xs-12">     
                            <label class="control-label">Previlege</label> </br>                                                                                        
                            <select class="form-control" name="previlege" required>
                                <option selected="selected" disabled>Silahkan Pilih</option>
                                <?php foreach($previlege->result() as $hasil){?>
                                    <option value="<?php echo $hasil->id_previlege;?>"><?php echo $hasil->nama_previlege;?></option>
                                <?php } ?>
                            </select>
                            <span class="help-block">*isi hak akses</span>
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