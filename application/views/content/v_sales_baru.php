            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>                  
                    <h3><?php echo $judul_content1;?></h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                    <?php echo form_open('sales/create_sales_baru', 'class="form-horizontal form-label-left" id="demo-form2"');?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Sales <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="id_sales" value="<?php echo $id_sales; ?>" required="required" class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Sales <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nama_sales" required="required" class="form-control col-md-7 col-xs-12">
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

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>                  
                    <h3><?php echo $judul_content2;?></h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />


                    <?php echo form_open('sales/create_relation_sales_to_produk', 'class="form-horizontal form-label-left" id="demo-form2"');?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="id_relation" value="<?php echo $id_relation; ?>" required="required" class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Produk <span class="required">*</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="kd_produk" required>
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
                          <select class="form-control" name="kd_sales" required>
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