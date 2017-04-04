<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span> App Inventory Management</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">

              <div class="profile_info">
                <span>Welcome, <?php echo $this->data['log_nama']; ?> </span>
                </br>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br /><br /><br />

            <?php echo $this->data['content_menubar'];?>
            <?php echo $this->data['content_setting_user'];?>

          </div>
        </div>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
            <div class="clearfix"></div>
            <?php echo $content_report_successornot."</br>";?>
            <?php echo $main_content;?>
            </div>
          </div>
        </div>
</body>