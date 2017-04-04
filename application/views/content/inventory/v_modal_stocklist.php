<?php if($stock){ foreach($stock->result() as $hasil){ ?>

<!-- Modal Restock-->
<div id="modal_restock_<?php echo $hasil->id_stock;?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title text-center"><strong><?php echo $judul1;?></strong></h3>
      </div>
            <?php echo form_open('stocklist/restock'); ?>
                <div class="modal-body">
                <div class="panel-body">

                    <div class="form-group">
                        <div class="col-md-offset-1 col-md-8 col-xs-12"> 
                                <label class="control-label">ID Barang</label> </br>                                             
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="form-control" name="id" value="<?php echo $hasil->id_stock;?>" readonly required/>
                            </div>      
                            <span class="help-block"> </br></span>                                          
                        </div>
                    </div>
 
                    <div class="form-group">
                        <div class="col-md-offset-1 col-md-8 col-xs-12"> 
                                <label class="control-label">Nama Barang</label> </br>                                             
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="form-control" name="nama" value="<?php echo $hasil->nama_produk;?>" readonly required/>
                            </div>      
                            <span class="help-block"> </br></span>                                          
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-1 col-md-8 col-xs-12"> 
                                <label class="control-label">Stock Awal</label> </br>                                             
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="number" class="form-control" name="stock_awal" value="<?php echo $hasil->stock_barang;?>" placeholder="stock awal"  readonly required/>
                            </div>         
                            <span class="help-block"> </br></span>                                    
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
                            <span class="help-block"> </br></span>   
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <div class="col-md-offset-1 col-md-8 col-xs-12"> 
                                <label class="control-label">Harga Beli Satuan</label> </br>                                             
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="number" class="form-control" name="harga_beli"  placeholder="harga beli"  required/>
                            </div>                                            
                            <span class="help-block">*isi harga beli satuan dengan angka</span>
                            <span class="help-block"> </br></span>   
                        </div>
                    </div>
                    

                     <div class="col-md-offset-1 col-md-8 col-xs-12">      
                        <label class="control-label">
                            <strong>field bertanda * wajib diisi</strong>
                       </label>
                    </div>
                </div>    
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>             
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
              </div>

            </form>

    </div>

  </div>
</div>


<!-- Modal Restock-->
<div id="modal_edit_<?php echo $hasil->id_stock;?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title text-center"><strong><?php echo $judul2;?></strong></h3>
      </div>
            <?php echo form_open('stocklist/edit'); ?>
                <div class="modal-body">
                <div class="panel-body"> 
                    <div class="form-group">
                        <div class="col-md-offset-1 col-md-8 col-xs-12"> 
                                <label class="control-label">Nama Barang</label> </br>                                             
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="form-control" name="nama"   value="<?php echo $hasil->nama_produk;?>" readonly required/>
                            </div>                                            
                            <span class="help-block">*isi stock barang dengan angka</span>
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
                    
                    

                     <div class="col-md-offset-1 col-md-8 col-xs-12">      
                        <label class="control-label">
                            <strong>field bertanda * wajib diisi</strong>
                       </label>
                    </div>
                </div>    
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>             
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
              </div>

            </form>

    </div>

  </div>
</div>


<!-- Modal Restock-->
<div id="modal_delete_<?php echo $hasil->id_stock;?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title text-center"><strong><?php echo $judul3;?></strong></h3>
      </div>
            <?php echo form_open('stocklist/delete'); ?>
                <div class="modal-body">
                    <div class="panel-body"> 
                      <label> apakah anda yakin ingin menghapus inventory <strong><?php echo $hasil->nama_produk;?></strong> ? </label>
                    </div>    
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>             
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
              </div>

            </form>

    </div>

  </div>
</div>

<?php } }?>

