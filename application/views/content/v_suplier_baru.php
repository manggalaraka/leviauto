            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3><?php echo $judul_content;?></h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                    <?php echo form_open('suplier/create_suplier_baru', 'class="form-horizontal form-label-left" id="demo-form2"');?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Suplier <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="id_suplier" value="<?php echo $id_suplier; ?>" required="required" class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Suplier <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nama_suplier" placeholder="nama suplier" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat Suplier <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="alamat_suplier" class="form-control col-md-7 col-xs-12" rows="3" placeholder='Alamat Suplier' required></textarea>
                        </div>
                      </div>                       
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Keterangan Suplier
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="ket_suplier" class="form-control col-md-7 col-xs-12" rows="7" placeholder='Keterangan Suplier'></textarea>
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