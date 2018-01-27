<style>
    li{
        list-style-type: none;
    }
</style>
<?php if(!empty($session['edit_registerd_role_display_manager_per'])): ?>
<div class="container">

    <form method="post" action="<?php echo base_url(); ?>role_page/update_role_per/<?php echo $more_data['id']?>" onsubmit="cal()">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-xs-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="role_name" type="text" class="form-control" name="role_name" placeholder="نام نقش" value="<?php echo $more_data['role_name']; ?>">
                </div>
                <?php echo form_error('role_name'); ?>
            </div>
        </div><!-- row of input role End-->







        <div class="row">
            <div class="col-md-6 col-xs-12">
                <h3 class="page-header">تعیین دسترسی کارتابل</h3>
                <div class="well">
                    <ul class="treeview">


                        <li><input type="checkbox"  name="permissions[]" value="kartable_per0"> <label data-per="kartable_per0">کارتابل</label>
                            <ul>
                                <li><input type="checkbox"  name="permissions[]" value="history_kartable_per"> <label data-per="history_kartable_per">کارتابل سابق</label></li>
                                <li><input type="checkbox"  name="permissions[]" value="kartable_per"> <label data-per="kartable_per">کارتابل جاری</label>

                                    <ul>
                                        <li><input type="checkbox" name="permissions[]" value="erja_kartable_per"> <label data-per="erja_kartable_per">ارجاع دادن</label></li>

                                        <li><input type="checkbox" name="permissions[]" value="del_kartable_per"> <label data-per="del_kartable_per">حذف کردن فرم</label></li>

                                        <li>
                                            <input type="checkbox"  name="permissions[]" value="open_kartable_per"> <label data-per="open_kartable_per">بازکردن فرم</label>
                                            <ul>
                                                <li><input type="checkbox" name="permissions[]" value="edit_duty_eghdamat_open_kartable_per" > <label data-per="edit_duty_eghdamat_open_kartable_per">تغییر اطلاعات و ثبت وظیفه و اقدامات</label>
                                                    <ul>
                                                        <li><input type="checkbox" name="permissions[]" value="edit_open_kartable_per" > <label data-per="edit_open_kartable_per">تغییر فرم</label>
                                                        </li>
                                                        <li><input type="checkbox" name="permissions[]" value="duty_kartable_per"> <label data-per="duty_kartable_per">ثبت وظیفه</label>
                                                            <ul>
                                                                <li><input type="checkbox" name="permissions[]" value="add_duty_kartable_per" > <label data-per="add_duty_kartable_per">افزودن</label></li>
                                                                <li><input type="checkbox" name="permissions[]" value="del_duty_kartable_per"> <label data-per="del_duty_kartable_per">حذف</label></li>
                                                            </ul>
                                                        </li>
                                                        <li><input type="checkbox" name="permissions[]" value="eghdam_kartable_per" > <label data-per="eghdam_kartable_per">ثبت اقدام</label>
                                                            <ul>
                                                                <li><input type="checkbox" name="permissions[]" value="add_eghdam_kartable_per"> <label data-per="add_eghdam_kartable_per">افزودن</label></li>
                                                                <li><input type="checkbox" name="permissions[]" value="del_eghdam_kartable_per"> <label data-per="del_eghdam_kartable_per">حذف</label></li>
                                                            </ul>
                                                        </li>
                                                        <li><input type="checkbox" name="permissions[]" value="display_auto_kartable_per" > <label data-per="display_auto_kartable_per">مشاهده اقدامات اتوماتیک</label>
                                                            <ul>
                                                                <li><input type="checkbox" name="permissions[]" value="display_detail_auto_kartable_per" > <label data-per="display_detail_auto_kartable_per">مشاهده ریز اقدامات اتوماتیک</label></li>
                                                                <li><input type="checkbox" name="permissions[]" value="delete_auto_kartable_per" > <label data-per="delete_auto_kartable_per">حذف اقدامات اتوماتیک</label></li>
                                                            </ul>
                                                        </li>

                                                    </ul>

                                                </li>
                                                <li><input type="checkbox" name="permissions[]" value="open_erja_kartable_per"> <label data-per="open_erja_kartable_per">ارجاع</label></li>
                                                <li><input type="checkbox" name="permissions[]" value="pishnahd_kartable_per"> <label data-per="pishnahd_kartable_per">ثبت شماره بیمه نامه و پیشنهاد</label></li>
                                                <li><input type="checkbox" name="permissions[]" value="mali_kartable_per" > <label data-per="mali_kartable_per">ثبت مالی</label>
                                                    <ul>
                                                        <li><input type="checkbox"  name="permissions[]" value="nconf_mali_kartable_per"> <label data-per="nconf_mali_kartable_per">تایید نکردن</label></li>
                                                        <li><input type="checkbox"  name="permissions[]" value="conf_mali_kartable_per"> <label data-per="conf_mali_kartable_per">تایید کردن</label></li>
                                                        <li><input type="checkbox" name="permissions[]" value="open_mali_kartable_per" > <label data-per="open_mali_kartable_per">باز کردن</label>
                                                            <ul>
                                                                <li><input type="checkbox" name="permissions[]" value="add_open_mali_kartable_per"> <label data-per="add_open_mali_kartable_per">افزودن</label></li>
                                                                <li><input type="checkbox" name="permissions[]" value="edit_open_mali_kartable_per"> <label data-per="edit_open_mali_kartable_per">ویرایش</label></li>
                                                                <li><input type="checkbox" name="permissions[]" value="del_open_mali_kartable_per"> <label data-per="del_open_mali_kartable_per">حذف</label></li>
                                                            </ul>
                                                        </li>
                                                    </ul>

                                                </li>
                                            </ul>
                                        </li>
                                    </ul>

                                </li>   <!--- end li kartable -->
                            </ul>
                    </ul>   <!-- end ul tree -->
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <h3 class="page-header">تعیین دسترسی فرم پیشنهاد بیمه</h3>
                <div class="well">
                    <ul class="treeview">
                        <li><input type="checkbox" name="permissions[]" value="bime_per"> <label data-per="bime_per">پیشنهاد بیمه</label>
                            <ul>
                                <li><input type="checkbox" name="permissions[]" value="new_form_per"> <label data-per="new_form_per"> ثبت فرم جدید</label></li>
                                <li><input type="checkbox" name="permissions[]" value="mali_per"> <label data-per="mali_per">ثبت امور مالی</label>
                                    <ul>
                                        <li><input type="checkbox" name="permissions[]" value="edit_mali_per"> <label data-per="edit_mali_per">ویرایش فرم</label></li>
                                        <li><input type="checkbox" name="permissions[]" value="del_mali_per"> <label data-per="del_mali_per">حذف فرم</label></li>
                                        <li><input type="checkbox" name="permissions[]" value="open_mali_per"> <label data-per="open_mali_per">باز کردن بخش مالی</label>
                                            <ul>
                                                <li><input type="checkbox" name="permissions[]" value="add_open_mali_per"> <label data-per="add_open_mali_per">افزودن</label></li>
                                                <li><input type="checkbox" name="permissions[]" value="edit_open_mali_per"> <label data-per="edit_open_mali_per">ویرایش</label></li>
                                                <li><input type="checkbox" name="permissions[]" value="del_open_mali_per"> <label data-per="del_open_mali_per">حذف</label></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <h3 class="page-header">تعیین دسترسی موقعیت ها</h3>
                <div class="well">
                    <ul class="treeview">
                        <li><input type="checkbox" name="permissions[]" value="position_per"> <label data-per="position_per">موقعیت</label>
                            <ul>
                                <li><input type="checkbox" name="permissions[]" value="add_position_per"> <label  data-per="add_position_per">افزودن</label></li>
                                <li><input type="checkbox" name="permissions[]" value="del_position_per"> <label  data-per="del_position_per">حذف</label></li>
                            </ul>
                        </li>
                    </ul>
                </div>




            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-xs-12">
                <h3 class="page-header">تعیین دسترسی مدیریت</h3>

                <div class="well">
                    <ul class="treeview">
                        <li><input type="checkbox" name="permissions[]" value="manager_per"> <label data-per="manager_per">مدیریت</label>
                            <ul>
                                <li><input type="checkbox"  name="permissions[]" value="role_manager_per"> <label data-per="role_manager_per"> ثبت نقش جدید</label>
                                    <ul>
                                        <li><input type="checkbox" name="permissions[]" value="new_role_manager_per"> <label data-per="new_role_manager_per">ثبت نقش</label> </li>
                                        <li><input type="checkbox" name="permissions[]" value="registerd_role_display_manager_per"> <label data-per="registerd_role_display_manager_per">مشاهده نقش های ثبت شده</label>
                                            <ul>
                                                <li><input type="checkbox" name="permissions[]" value="remove_registerd_role_display_manager_per"> <label data-per="remove_registerd_role_display_manager_per">حذف نقش</label> </li>
                                                <li><input type="checkbox" name="permissions[]" value="edit_registerd_role_display_manager_per"> <label data-per="edit_registerd_role_display_manager_per">تغییر سطح دسترسی نقش</label></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><input type="checkbox" name="permissions[]" value="user_manager_per"> <label data-per="user_manager_per"> ثبت کاربر جدید</label>
                                    <ul>
                                        <li><input type="checkbox" name="permissions[]" value="registerd_user_manager_per"> <label data-per="registerd_user_manager_per">ثبت نام کردن</label> </li>
                                        <li><input type="checkbox" name="permissions[]" value="show_manager_per"> <label data-per="show_manager_per">مشاهده ثبت نام شده ها</label>
                                            <ul>
                                                <li><input type="checkbox" name="permissions[]" value="del_show_manager_per"> <label data-per="del_show_manager_per">امکان غیرفعال کردن ثبت نام شده ها</label></li>
                                                <li><input type="checkbox" name="permissions[]" value="edit_show_manager_per"> <label data-per="edit_show_manager_per">امکان تغییر ثبت نام شده ها</label></li>
                                            </ul>
                                        </li>

                                    </ul>
                                </li>
                                <li><input type="checkbox" name="permissions[]" value="role_relation_manager_per"> <label data-per="role_relation_manager_per">ارتباط نقش ها</label>
                                    <ul>
                                        <li><input type="checkbox" name="permissions[]" value="add_role_relation_manager_per"> <label data-per="add_role_relation_manager_per">ایجاد</label> </li>
                                        <li><input type="checkbox" name="permissions[]" value="del_role_relation_manager_per"> <label data-per="del_role_relation_manager_per">حذف</label> </li>
                                    </ul>
                                </li>
                                <li><input type="checkbox" name="permissions[]" value="panel_manager_per"> <label data-per="panel_manager_per"> پنل مدیریت</label></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div> <!--- col-md-6-->

            <div class="col-xs-12 col-md-6">
                <h3 class="page-header">تعیین دسترسی برای گزارش گیری</h3>
                <div class="well">

                    <ul>
                        <li><input type="checkbox" name="permissions[]" value="reporting_per"> <label data-per="reporting_per">گزارش گیری</label>
                        </li>
                    </ul>
                </div>

                <h3 class="page-header">تعیین دسترسی اقدامات</h3>
                <div class="well">
                    <ul class="treeview">
                        <li><input type="checkbox" name="permissions[]" value="independent_eghdam_per"> <label data-per="independent_eghdam_per">اقدامات</label>
                            <ul>
                                <li><input type="checkbox" name="permissions[]" value="open_independent_eghdam_per"> <label  data-per="open_independent_eghdam_per">باز کردن اقدامات فرم ها</label>
                                    <ul>
                                        <li><input type="checkbox" name="permissions[]" value="display_independent_eghdam_per"> <label  data-per="display_independent_eghdam_per">مشاهده ریز اقدامات</label></li>
                                        <li><input type="checkbox" name="permissions[]" value="delete_independent_eghdam_per"> <label  data-per="delete_independent_eghdam_per">حذف اقدامات</label></li>
                                    </ul>

                                </li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!--- col-md-6 -->
        </div>


        <div class="row">
            <div class="col-xs-3">
                <input type="submit" value="به روزرسانی نقش" class="btn btn-info btn-block">
            </div>

        </div>

        <div class="row">
            <input id="permission" name="permission" style="display:none;">
        </div> <!-- hidden input -->


    </form>


</div>

<script>
    $('documnet').ready(function()
    {
    })
    function cal()
    {
        var custom_indeterminate =$('.custom-indeterminate');
        var custom_checked =$('.custom-checked');
        var result = "";
        $.each(custom_indeterminate , function(key , value)
        {
            var a=$(value);
            result+=$(value).data('per')+",";
        });
        $.each(custom_checked , function(key , value)
        {
            var a=$(value);
            result+=$(value).data('per')+",";
        });
        $("#permission").val(result);

        return true;
    }
</script>

<script  src="<?php echo base_url(); ?>js/index.js"></script>

<?php endif; ?>

</body>

</html>
