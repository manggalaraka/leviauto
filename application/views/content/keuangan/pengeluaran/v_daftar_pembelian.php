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
                                <th class="text-center"> Keterangan </th>
                                <th class="text-center"> Tanggal Pembelian</th>
                                <th class="text-center"> Total </th>
                                <th class="text-center"> Action </th>
                            </tr>
                        </thead>
                        <tbody>      
                            <?php  if($pembelian){ $no = 0; $totalPembelian = 0; foreach($pembelian->result() as $hasil){ $no++;  ?> 
                            <?php  $totalPembelian += $hasil->total; ?>
                            <tr>
                                <td class="text-center"><?php echo $no;?></td>
                                <td class="text-center"><?php echo $hasil->keterangan." ".$hasil->nama_produk;?></td>
                                <td class="text-center"><?php echo $hasil->tanggal_pembelian;?></td>
                                <td class="text-center"><?php echo "Rp ". number_format($hasil->total,2,",",".");?></td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-rounded btn-sm" data-toggle="modal" data-target="#modal_edit_<?php echo $hasil->id_pembelian;?>"><span class="fa fa-edit"></span></button> &nbsp;
                                    <button class="btn btn-danger btn-rounded btn-sm" data-toggle="modal" data-target="#modal_delete_<?php echo $hasil->id_pembelian;?>"><span class="fa fa-minus-square"></span></button>
                                </td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3" class="text-center"> Total </td> <td colspan="1" class="text-center"> <?php echo "Rp ". number_format($totalPembelian,2,",",".");?> </td><td colspan="1" class="text-center"> </td>
                            </tr>
                            <?php }else{ ?>     
                                <td colspan="5" class="text-center"> tidak ada data </td>
                            <?php } ?>                        
                        </tbody>
                    </table>
                </div>                     
                </div>
            </div>
            </div>
            
        </div>
    </div>                    
    
</div>



