<!-- START RESPONSIVE TABLES -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title"><strong><?php echo $judulContent; ?></strong></h3>
                <div class="btn-group pull-right">
                    <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                    <ul class="dropdown-menu">
                        <li><a href="#" onClick ="$('#table-leviauto').tableExport({type:'excel',escape:'false'});"><img src='<?php echo base_url();?>/assets/themeforest/img/icons/xls.png' width="24"/> XLS</a></li>
                        <li><a href="#" onClick ="$('#table-leviauto').tableExport({type:'pdf',escape:'false'});"><img src='<?php echo base_url();?>/assets/themeforest/img/icons/pdf.png' width="24"/> PDF</a></li>
                    </ul>
                </div>                                                    
            </div>

            <div class="panel-body panel-body-table">

                <div class="table-responsive">
                    <table id="table-leviauto" class="table table-bordered table-striped table-actions">
                        <thead>
                            <tr>
                                <th class="text-center"> No </th>
                                <th class="text-center"> Id </th>
                                <th class="text-center"> Nama </th>
                                <th class="text-center"> Keterangan </th>
                                <th class="text-center"> Estimasi Pengerjaan </th>
                                <th class="text-center"> Harga Pengerjaan </th>
                                <th class="text-center"> Action </th>


                            </tr>
                        </thead>
                        <tbody>          
                            <?php $no = 0; foreach($layanan->result() as $hasil){ $no++;?> 
                            <tr>
                                <td class="text-center"><?php echo $no;?></td>
                                <td class="text-center"><?php echo $hasil->id_service;?></td>
                                <td class="text-center"><?php echo $hasil->nama_service;?></td>
                                <td class="text-center"><?php if(empty($hasil->keterangan_service)){echo "tidak ada data";}else{echo $hasil->keterangan_service;}?></td>
                                <td class="text-center"><?php echo $hasil->estimasi_service;?></td>
                                <td class="text-center"><?php echo "Rp ". number_format($hasil->harga_service,2,",","."); ?></td>
                                <td>
                                    <button class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></button>
                                </td>
                            </tr>
                            <?php } ?> 
                        </tbody>
                    </table>
                </div>                                

            </div>
        </div>                                                

    </div>
</div>
<!-- END RESPONSIVE TABLES -->                    