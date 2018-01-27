
<div class="container-fluid">
    <h2 class="text-center">کاربران ثبت نام شده</h2>
    <br>
    <br>

    <div class="row">
        <div class="col-xs-6 col-xs-offset-2">
            <?php if($more_data[1] == 1): ?>
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    به روز رسانی با موفقیت انجام شد
                </div>
            <?php endif; ?>
            <div style="height: 400px; overflow: auto;">
                <table class="table table-bordered table-hover">
                    <thead style="color:white; background-color: #2aabd2;" >
                    <tr>
                        <th >ردیف</th>
                        <th> نام نقش</th>
                        <?php if(!empty($session['remove_registerd_role_display_manager_per'])&&!empty($session['edit_registerd_role_display_manager_per'])): ?>
                        <th></th>
                        <?php endif;?>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($more_data[0] as $index => $role): ?>
                        <tr>
                            <td><?php echo $index + 1?></td>
                            <td><?php echo $role['role_name']; ?></td>
                            <?php if(!empty($session['remove_registerd_role_display_manager_per'])&&!empty($session['edit_registerd_role_display_manager_per'])): ?>
                            <td>
                                <?php if(!empty($session['remove_registerd_role_display_manager_per'])): ?>
                                    <a data-toggle="modal" data-target="#delete_modal" data-id="<?php echo $role['id']; ?>" class="btn btn-default show_delete_modal">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                <?php endif;?>

                                <?php if(!empty($session['edit_registerd_role_display_manager_per'])): ?>
                                    <a href="<?php echo base_url(); ?>role_page/show_update_role_per/<?php echo $role['id']; ?>" class="btn btn-default "><span class="fa fa-edit"></span></a>
                                <?php endif;?>
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

<div class="modal fade" id="delete_modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">حذف</h4>
            </div>
            <div class="modal-body">
                <p>آیا از حذف مطمئن هستید؟</p>
            </div>
            <div class="modal-footer">
                <a id="delete_button" href="#" class="btn btn-default btn-warning">بلی</a>
                <button type="button" class="btn btn-default btn-info" data-dismiss="modal">خیر</button>
            </div>
        </div>
    </div>
</div>

<script>
    var base = '<?php echo base_url(); ?>';
    $('.show_delete_modal').click(function(){
        var key_value = $(this).attr('data-id');

        $('#delete_button').attr('href',base + 'role_page/delete_role/'+key_value);

    });

</script>
</body>
</html>