
<div class="container-fluid">
    <h2 class="text-center">موقعیت ها</h2>
    <br>
    <br>

    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">

            <form method="post" action="<?php echo base_url(); ?>location_page/insert_new_location">
                <fieldset>
                    <legend>
                        <span>افزودن موقعیت جدید</span>
                    </legend>
                    <?php if(!empty($session['add_position_per'])): ?>
                        <div class="col-xs-6">
                            <div class="form-group " >
                                <label for="location_name">نام موقعیت</label>
                                <input name="location_name" id="location_name" class="form-control" value="<?php echo set_value('location_name'); ?>">
                                <?php echo form_error('location_name'); ?>
                            </div>
                            <div class="form-group " >
                                <label for="location_address"> آدرس موقعیت</label>
                                <textarea name="location_address" id="location_address" class="form-control"><?php echo set_value('location_address'); ?></textarea>
                            </div>

                            <button type="submit"  class="btn btn-default ">افزودن موقعیت
                                <span class="fa fa-plus-circle">
                                </span>
                            </button>
                        </div>

                    <?php endif; ?>

                </fieldset>

            </form>
            <br>

            <div class="">
                <span>موقعیتهای ثبت شده</span>
                <div style="height: 400px; overflow: auto;">
                    <table class="table table-bordered table-hover">
                        <thead style="color:white; background-color: #2aabd2;" >
                        <tr>
                            <th >ردیف</th>
                            <th>نام موقعیت</th>
                            <th>آدرس موقعیت</th>
                            <?php if(!empty($session['del_position_per'])): ?>
                                <th></th>
                            <?php endif; ?>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($more_data as $index => $row):  ?>
                            <tr>
                                <td><?php echo $index + 1; ?></td>
                                <td><?php echo $row['location_name']?></td>
                                <td><?php echo $row['location_address']?></td>
                                <?php if(!empty($session['del_position_per'])): ?>
                                    <td><a href="<?php echo base_url(); ?>location_page/delete_location/<?php echo $row['location_id']; ?>" class="btn btn-default "><span class="glyphicon glyphicon-trash "></span></a></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>


                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>
</body>
</html>