    <body class="<?php echo $this->data['body_layout'];?>">
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
                <?=$menuNavigasiSamping;?>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <!-- <?=$menuNavigasiAtas;?> -->
                <?=$this->data['navtop'];?>
                <!-- END X-NAVIGATION VERTICAL -->                     

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('administrator')?>" class="active"><?php echo $this->data['main_breadcrumb'];?></a></li>  
                     <?php if($judulHalaman != "Dashboard"){ ?>
                            <li><a href="<?php site_url('administrator')?>"><?php echo $judulHalaman;?></a></li>
                    <?php }?>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row"><?php echo $this->data['content_report_successornot'];?> </div>
                    <?=$contentUtama;?>
                    <?=$contentPendukung;?>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->

        <!-- END MESSAGE BOX-->
    </body>