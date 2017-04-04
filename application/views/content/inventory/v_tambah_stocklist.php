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
                <?php echo form_open('stocklist/add'); ?>
                    <div class="form-group">
                        <div class="col-md-offset-1 col-md-8 col-xs-12">      
                            	<label class="control-label">Nama Barang</label> </br>                                      
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="form-control" name="nama" placeholder="nama"  required/>
                            </div>                                            
                            <span class="help-block">*isi nama barang</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-1 col-md-8 col-xs-12"> 
                            	<label class="control-label">Stock Barang</label> </br>                                             
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="number" class="form-control" name="stock"  placeholder="stock"  required/>
                            </div>                                            
                            <span class="help-block">*isi stock barang dengan angka</span>
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <div class="col-md-offset-1 col-md-8 col-xs-12"> 
                                <label class="control-label">Harga Beli Satuan</label> </br>                                             
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="number" class="form-control" name="harga_beli"  placeholder="harga beli"  required/>
                            </div>                                            
                            <span class="help-block">*isi harga beli satua dengan angkan</span>
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <div class="col-md-offset-1 col-md-8 col-xs-12"> 
                                <label class="control-label">Harga Jual Satuan</label> </br>                                             
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="number" class="form-control" name="harga_jual"  placeholder="harga jual"  required/>
                            </div>                                           
                            <span class="help-block">*isi harga jual satuan dengan angka</span>
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