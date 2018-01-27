
<div class="container-fluid">

    <?php if(!empty($session['show_manager_per'])): ?>
    <h2 class="text-center">کاربران ثبت نام شده</h2>
    <br>
    <br>
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <?php if($more_data['succ']==1): ?>
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        تغییرات با موفقیت انجام شد
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <div style="height: 400px; overflow: auto;">
                <table class="table table-bordered table-hover">
                    <thead style="color:white; background-color: #2aabd2;" >
                    <tr>
                        <th >ردیف</th>
                        <th> نام کاربری</th>
                        <th>نام و نام خانوادگی</th>
                        <th>نقش</th>
                        <th>تاریخ شروع قرار داد</th>
                        <th>تاریخ پایان قرار داد</th>
                        <th>وضعیت</th>
                        <?php if(!empty($session['del_show_manager_per'])&&!empty($session['edit_show_manager_per'])): ?>
                            <th></th>
                        <?php endif?>
                    </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($more_data['users'] as $index=>$user): ?>
                            <tr>
                                <td><?php echo $index+1 ?></td>
                                <td><?php echo $user['username']; ?></td>
                                <td><?php echo $user['f_name'] .' ' . $user['l_name']; ?></td>
                                <td><?php echo $user['role_name']; ?></td>
                                <td><?php echo $user['contract_start']; ?></td>
                                <td><?php echo $user['contract_end']; ?></td>
                                <td><?php echo ($user['active']==0)?'غیرفعال':'فعال' ; ?></td>
                                <?php if(!empty($session['del_show_manager_per'])&&!empty($session['edit_show_manager_per'])): ?>
                                <td>
                                    <?php if(!empty($session['del_show_manager_per'])): ?>
                                        <a href="<?php echo base_url(); ?>register_page/deactive_user/<?php echo $user['user_id'].'/'.$user['active']?>" class="btn btn-default "><span class="glyphicon glyphicon-off"></span></a>
                                    <?php endif; ?>
                                    <?php if(!empty($session['edit_show_manager_per'])): ?>
                                        <a href="<?php echo base_url(); ?>register_page/show_update_user/<?php echo $user['user_id']; ?>/1" class="btn btn-default "><span class="fa fa-pencil"></span></a>
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
    <?php endif; ?>
</div>
</body>
</html>