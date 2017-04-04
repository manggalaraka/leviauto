<body>
    
    <div class="login-container">
    
        <div class="login-box animated fadeInDown">
            <div class="login-body">
                    <div class="login-title">Welcome, <strong><?php echo $judulContent; ?></strong></div>
                <!-- <form action="index.html" class="form-horizontal" method="post"> -->
                <?php echo form_open_multipart('login/login_exe','class="form-horizontal"');?>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="user" placeholder="Username" required/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="password" class="form-control" name="password" placeholder="Password" required/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-link btn-block">Forgot your password?</a>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-info btn-block">Log In</button>
                    </div>
                </div>
                </form>
            </div>
            <div class="login-footer">
                <div class="pull-left">
                    &copy; themeforest
                </div>
                <div class="pull-right">
                    <a href="#">About</a> |
                    <a href="#">Signup</a> |
                    <a href="#">Contact Us</a>
                </div>
            </div>
        </div>
        <?php echo $content_report_successornot;?> 
    </div>
    
</body>