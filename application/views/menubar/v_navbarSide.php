            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">

                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="<?php echo base_url();?>/assets/image/profile_picture/<?php echo $this->data['log_photo'];?>" alt="<?php echo $this->data['log_username'];?>"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="<?php echo base_url();?>/assets/image/profile_picture/<?php echo $this->data['log_photo'];?>" alt="<?php echo $this->data['log_username'];?>"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo $this->data['log_username'];?></div>
                                <div class="profile-data-title">Web Developer/Designer</div>
                            </div>
                        </div>                                                                        
                    </li>

                    <li class="xn-title">Kepegawaian</li>          
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Kelola Pegawai</span></a>
                        <ul>
                            <li><a href="<?php echo base_url('administrator/tambah_pegawai');?>"><span class="fa fa-user"></span>Tambah Pegawai</a></li>
                            <li><a href="#"><span class="fa fa-image"></span>Data Pegawai</a></li>
                            <li><a href="#"><span class="fa fa-desktop"></span> <span class="xn-text">Log User</span></a> </li>      
                        </ul>   
                    </li>


                    <li class="xn-title">Keuangan</li>     
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Pemasukan</span></a>
                        <ul>
                            <li><a href="#">Data Pemasukan</a></li>
                        </ul>
                    </li>          
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-edit"></span> <span class="xn-text">Pengeluaran</span></a>
                        <ul>
                            <li><a href="#">Tambah Pengeluaran</a></li>
                            <li><a href="<?php echo base_url('administrator/daftar_pembelian');?>">Data Pembelian</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-desktop"></span> <span class="xn-text">Neraca Keuangan</span></a>                        
                    </li>  


                    <li class="xn-title">Layanan</li>          
                    <li>
                        <a href="<?php echo base_url('administrator/cuci_mobil');?>"><span class="fa fa-files-o"></span> <span class="xn-text">Cuci Mobil</span></a>
                    </li>         
                    <li>
                        <a href="<?php echo base_url('administrator/ganti_onderdil');?>"><span class="fa fa-file-text-o"></span> <span class="xn-text">Ganti Onderdil</span></a>
                    </li>         
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-edit"></span> <span class="xn-text">Kelola Layanan</span></a>
                        <ul>
                            <li><a href="<?php echo base_url('administrator/tambah_layanan');?>"> Tambah Layanan</span></a></li>  
                            <li><a href="<?php echo base_url('administrator/daftar_layanan');?>"> Daftar Layanan</span></a></li>  
                        </ul>
                    </li>      
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-edit"></span> <span class="xn-text">Kelola Cucian</span></a>
                        <ul>
                            <li><a href="<?php echo base_url('administrator/daftar_cuci');?>">Daftar Cucian</span></a></li>  
                        </ul>
                    </li>

                    
                    <li class="xn-title">Inventory</li>          
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-edit"></span> <span class="xn-text">Stock barang</span></a>
                        <ul>
                            <li><a href="<?php echo base_url('administrator/tambah_stocklist');?>">Stock Barang Baru</a></li>
                            <!-- <li><a href="<?php echo base_url('administrator/restock_produk');?>">Restock Barang</a></li> -->
                            <li><a href="<?php echo base_url('administrator/daftar_stocklist');?>">Kelola Stock Barang</a></li>
                        </ul>
                    </li>

                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
