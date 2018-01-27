<!--log in page-->

<body dir="rtl">



<section id="login">
    <div class="container">
        <div class="row ">
            <div class="col-xs-offset-4 col-xs-4">
                <img src="<?php echo base_url(); ?>images/l.png" class="img-responsive">
                <div class="form-wrap">
                    <h1>ورود با نام کاربری</h1>
                    <form action="<?php echo base_url(); ?>retrieve_page/login" role="form" action="javascript:;" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="email" class="sr-only">نام کاربری</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="نام کاربری" value="<?php echo set_value('email'); ?>">
                            <?php echo form_error('email'); ?>
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">کلمه عبور</label>
                            <input type="password" name="key" id="key" class="form-control" placeholder="کلمه عبور" value="<?php echo set_value('key'); ?>">
                            <?php echo form_error('key'); ?>
                        </div>
                        <div class="checkbox">
                            <span class="character-checkbox" onclick="showPassword()"></span>
                            <span class="label">نمایش کلمه عبور</span>
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="ورود">
                    </form>

                    <hr>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

</body>
</html>