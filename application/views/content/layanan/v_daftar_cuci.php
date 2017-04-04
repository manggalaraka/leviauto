    <div class="row">
        <div class="col-md-12">
            
            <div class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="col-md-9 col-xs-12">
                        <h3 class="panel-title"><strong><?php echo $judulContent; ?></strong> </h3>
                    </div>
                </div>
                <div class="panel-body">

                <div class="panel-body">
                <div class="row">
<!--                     <div class="col-lg-12">
                        <?php echo $keyword;?>
                    </div> -->
                    <div class="col-md-9 col-xs-0">
                        
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <form action="" method="get" class="form-inline">
                            <div class="form-group">
                                <div class="input-group">                      
                                    <input class="form-control" type="text" name="keyword" placeholder="keyword"/>
                                </div>
                            </div>                                  
                            <button type="submit" class="btn btn-primary"> &nbsp;&nbsp;<i class="fa fa-search"></i></button>
                        </form>  
                    </div>
                </div> 
                </br>

                <div class="table-responsive">
                    <table id="table-leviauto" class="table table-bordered table-striped table-actions">
                        <thead>
                            <tr>
                                <th class="text-center"> No </th>
                                <th class="text-center"> Nama </th>
                                <th class="text-center"> Telepon </th>
                                <th class="text-center"> Tanggal </th>
                                <th class="text-center"> Status </th>
                                <th class="text-center"> Total Harga </th>
                                <th class="text-center"> Action </th>


                            </tr>
                        </thead>
                        <tbody>      
                            <?php  $no=0; if($data_cucian){ 
                                        foreach ($data_cucian as $value) { $no++; ?>
                                        <tr data-toggle="collapse" data-target="#accordion<?php echo $value['id_layanan']; ?>" class="clickable">
                                             <td class="text-center"><?php echo $no;?></td>
                                             <td class="text-center"><?php echo $value['nama_pelanggan'];?></td>
                                             <td class="text-center"><?php if(empty($value['telepon'])){echo "tidak ada data";}else{echo $value['telepon'];} ?></td>
                                             <td class="text-center"><?php echo $value['tanggal'];?></td>
                                             <td class="text-center"><?php echo $value['status'];?></td>
                                             <td class="text-center"><?php echo "Rp ". number_format($value['harga_total'],2,",",".");?></td>
                                            <td>
                                                <button class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="7">
                                                <div id="accordion<?php echo $value['id_layanan']; ?>" class="collapse">
                                                    <h5 class="text-center"><strong>Detail Pesanan</strong><h5> 
                                                    <blockquote class="blockquote-primary">
                                                        <?php foreach ($value['detail'] as $details) { ?>
                                                            <?php if($details['status'] == "check"){ ?>
                                                                    <label> <?php echo $details['nama_layanan']; ?> <i class="fa fa-check-circle text-info"></i> &nbsp;&nbsp; </label>
                                                               
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </blockquote>
                                                </div>
                                            </td>
                                        </tr>

                            <?php       }
                                    }else{ ?>
                                        <td colspan="7"  class="text-center"> <label> tidak ada data </label> </td>
                            <?php   }
                            ?>
                        </tbody>
                    </table>
                </div>                     
                </div>
            </div>
            </div>
            
        </div>
    </div>                    
    
</div>
