            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3><?php echo $judul_content;?></h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />



                    <?php echo form_open('produk/create_produk_baru', 'class="form-horizontal form-label-left" id="demo-form2"');?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama produk <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nama_produk" placeholder="nama produk" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga produk <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="harga_produk" placeholder="harga produk" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Stock (Piece) <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="stok_produk" placeholder="stok produk" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>                          
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Suplier <span class="required">*</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="kd_suplier" required>
                            <option selected="selected" disabled="disabled" value="">Pilih Suplier</option>
                                <?php $total_spl = $data_suplier->num_rows();
                                  if($total_spl > 0) foreach($data_suplier->result() as $hasil){?>
                                    <option value="<?php echo $hasil->kd_suplier;?>"> <?php echo $hasil->nama_suplier;?> </option>
                                  <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori <span class="required">*</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="kd_kategori" required>
                            <option selected="selected" disabled="disabled" value="">Pilih Kategori</option>
                                <?php $total_ktg = $data_kategori->num_rows();
                                  if($total_ktg > 0) foreach($data_kategori->result() as $hasil){?>
                                    <option value="<?php echo $hasil->kd_kategori;?>"> <?php echo $hasil->kategori_produk;?> </option>
                                  <?php } ?>
                          </select>
                        </div>
                      </div>
             
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
        <!-- /page content -->