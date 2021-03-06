<!-- register page -->




<section id="login">
    <div class="container" style="margin-top: 50px">
        <div class="row ">

            <div class="col-xs-offset-4 col-xs-4">
                <img src="<?php echo base_url(); ?>images/l.png" class="img-responsive">
                <br />
                <?php if($more_data[0]==1):?>
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        ثبت کاربر جدید با موفقیت انجام شد.
                    </div>
                <?php endif; ?>

                <div class="form-wrap">
                    <h1>ثبت نام کاربران</h1>
                    <form action="<?php echo base_url(); ?>register_page/add_new_user" role="form" method="post" id="login-form" autocomplete="off" class="form-horizontal">
                        <?php if(!empty($session['user_manager_per'])): ?>


                        <div class="form-group necessary" >
                            <span>*</span>
                            <label for="f_name" class="control-label" >نام </label>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="f_name" id="f_name" class="form-control" placeholder="نام" value="<?php echo ($more_data[0]==1)?'' : set_value('f_name'); ?>" >
                                    <?php echo form_error('f_name'); ?>
                                </div>
                                <div class="col-xs-6">
                                    <input type="text" name="l_name" placeholder="نام خانوادگی" id="l_name" class="form-control" value="<?php echo ($more_data[0]==1)?'' : set_value('l_name'); ?>">
                                    <?php echo form_error('l_name'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group necessary">
                            <span>*</span>
                            <label for="username" class="control-label" >نام کاربری</label>
                            <input type="text" name="username" placeholder="نام کاربری" id="username" class="form-control" value="<?php echo ($more_data[0]==1)?'' : set_value('username'); ?>">
                            <?php echo form_error('username'); ?>
                        </div>
                        <div class="form-group necessary">
                            <span>*</span>
                            <label for="key" >کلمه عبور</label>
                            <input type="password" name="key" id="key" class="form-control" placeholder="کلمه عبور">
                            <?php echo form_error('key'); ?>
                        </div>
                        <div class="form-group">
                            <label  class="control-label">سمت</label>
                            <select class="form-control" name="role">
                                <?php foreach ($more_data['roles'] as $role): ?>
                                    <option value="<?php echo $role['id']; ?>"><?php echo $role['role_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="start_date" class="control-label">تاریخ شروع قرار داد</label>
                            <input type="text" name="start_date" id="start_date" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="end_date" class="control-label">تاریخ پایان قرار داد</label>
                            <input type="text" name="end_date" id="end_date" class="form-control" >
                        </div>
                        <div class="checkbox">


                            <label for="active_user"><input type="checkbox" name="active_user" <?php echo set_checkbox('active_user','on'); ?>> کاربر فعال است</label>
                        </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <?php if(!empty($session['user_manager_per'])): ?>
                                <input type="submit" id="btn-login" class="btn btn-info" value="ثبت نام">
                            <?php endif; ?>

                            <?php if(!empty($session['show_manager_per'])): ?>
                                <a href="<?php echo base_url(); ?>register_page/show_registerd_user_page" id="btn-login" class="btn btn-warning">مشاهده ثبت نام شده ها</a>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div> <!-- /.col-xs-12 -->

        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


<script src="<?php echo base_url(); ?>js/persianDatepicker.js"></script>
<script>
    $(function() {
        $("#start_date").persianDatepicker();
        $("#end_date").persianDatepicker();
    });
</script>

</body>
</html>