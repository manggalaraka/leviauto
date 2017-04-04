            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3><?php echo $judul_content;?></h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />



                    <?php echo form_open('sales/#', 'class="form-horizontal form-label-left" id="demo-form2"');?>
                         
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Produk <span class="required">*</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="kd_suplier" required>
                            <option selected="selected" disabled="disabled" value="">Pilih Produk</option>
                                <?php $total_prdk = $data_produk->num_rows();
                                  if($total_prdk > 0) foreach($data_produk->result() as $hasil){?>
                                    <option value="<?php echo $hasil->id_produk;?>"> <?php echo $hasil->nama_produk;?> </option>
                                  <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sales <span class="required">*</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="kd_suplier" required>
                            <option selected="selected" disabled="disabled" value="">Pilih Sales</option>
                                <?php $total_sls = $data_sales->num_rows();
                                  if($total_sls > 0) foreach($data_sales->result() as $hasil){?>
                                    <option value="<?php echo $hasil->id_sales;?>"> <?php echo $hasil->nama_sales;?> </option>
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