<!-- eghdamat page -->
<div class="container-fluid">
    <h2 class="text-center">ثبت اقدامات</h2>
    <br>
    <br>

    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">


            <form method="post" action="<?php echo base_url(); ?>retrieve_page/insert_new_eghdamat/<?php echo $more_data['indicator_num']; ?>">
                <fieldset>
                    <legend>
                        <span>ثبت اقدامات برای فرم با شماره اندیکاتور:
                          <span name="serial_number" class="badge text-success"><?php echo $more_data['indicator_num']; ?></span>
                        </span>
                    </legend>

                    <?php if(!empty($session['add_eghdam_kartable_per'])): ?>
                        <div class="col-xs-11">
                            <div class="form-group right_padding" >
                                <label for="eghdam">اقدام صورت گرفته</label>
                                <textarea name="eghdam" id="eghdam" class="form-control" rows="4"><?php echo set_value('eghdam'); ?></textarea>
                                <?php echo form_error('eghdam'); ?>
                                <br>
                                <button type="submit"  class="btn btn-default ">افزودن به لیست اقدامات
                                    <span class="fa fa-plus-circle">
                                    </span>
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>



                </fieldset>

            </form>
            <br>
            <span>اقدامات ثبت شده</span>
            <div style="height: 400px; overflow: auto;">
                <table class="table table-bordered table-hover">
                    <thead style="color:white; background-color: #2aabd2;" >
                    <tr>
                        <th >ردیف</th>
                        <th> اقدام صورت گرفته</th>
                        <th style="padding-right:30px;padding-left: 30px; ">  توسط</th>
                        <?php if(!empty($session['del_eghdam_kartable_per'])): ?>
                            <th></th>
                        <?php endif;?>
                    </tr>
                    </thead>

                    <tbody>
                    <!--?php print_r($more_data['loggedin_user']); ?-->
                    <?php foreach ($more_data['eghdamat_data'] as $index => $row): ?>
                        <tr>
                            <td><?php echo $index+1; ?></td>
                            <td><?php echo $row['description']?></td>
                            <td><?php echo $row['user_full_name']?></td>
                            <?php if(!empty($session['del_eghdam_kartable_per'])): ?>
                                <td>
                                    <?php if($row['user_id'] == $more_data['loggedin_user']['user_id']): ?>
                                        <a href="<?php echo base_url(); ?>retrieve_page/delete_eghdam/<?php echo $more_data['user_id'].'/'.$more_data['indicator_num'].'/'.$row['id']; ?>" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></a>
                                    <?php endif; ?>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</body>
</html>