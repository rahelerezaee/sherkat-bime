
<div class="container-fluid">
    <h2 class="text-center">ثبت امور مالی</h2>
    <br>
    <br>

    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <?php if($more_data[3] == 1): ?>
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    به روز رسانی با موفقیت انجام شد
                </div>
            <?php endif; ?>
            <?php if($more_data[3] == 0): ?>
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    به روز رسانی ناموفق بود لطفا دوباره تلاش کنید
                </div>
            <?php endif; ?>

            <?php if($more_data[3] == 3): ?>
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    مجموع مبالغ پرداختی از مجموع حق بیمه سال اول با سپرده ی اولیه کمتر است
                </div>
            <?php endif; ?>

            <form method="post" action="<?php echo base_url(); ?>financial_page/insert_new_mali/<?php echo $more_data[0] ;?>">
                <fieldset>
                    <legend>
                        <span>ثبت امورمالی برای فرم با شماره اندیکاتور
                          <span name="serial_number" class="badge text-success"><?php echo $more_data[0] ;?></span>
                        </span>
                        <span style="padding-right: 20px">نام متقاضی:
                            <span><?php echo $more_data[2]?></span>
                        </span>

                    </legend>
                    <?php if(!empty($session['add_open_mali_kartable_per'])||!empty($session['add_open_mali_per'])): ?>
                    <div class="col-xs-11">
                        <div class="form-inline">
                            <div class="form-group right_padding" >
                                <label for="nahve_pardakht">نحوه پرداخت</label>
                                <select name="nahve_pardakht" id="nahve_pardakht" class="form-control">
                                    <option value="حواله" "<?php echo set_select('nahve_pardakht','حواله')?>">حواله</option>
                                    <option value="POS" "<?php echo set_select('nahve_pardakht','POS')?>">POS</option>
                                    <option value="نقدی" "<?php echo set_select('nahve_pardakht','نقدی')?>">نقدی</option>
                                </select>
                            </div>

                            <div class="form-group right_padding" >
                                <label for="mablagh">مبلغ</label>
                                <input name="mablagh" id="mablagh" class="form-control number" value="<?php echo set_value('mablagh')?>">
                                <?php echo form_error('mablagh')?>
                            </div>

                            <div class="form-group right_padding" >
                                <label for="shomare_marja">شماره مرجع</label>
                                <input name="shomare_marja" id="shomare_marja" class="form-control" value="<?php echo set_value('shomare_marja')?>">
                                <?php echo form_error('shomare_marja')?>
                            </div>

                            <div class="form-group right_padding" >
                                <label for="vaziat">وضعیت </label>
                                <select name="vaziat" id="vaziat" class="form-control" >
                                    <option value="تسویه" "<?php echo set_select('vaziat','تسویه')?>">تسویه</option>
                                    <option value="بیعانه" "<?php echo set_select('vaziat','بیعانه')?>">بیعانه</option>
                                </select>
                            </div>

                        </div>

                        <br>
                        <div class="row">
                            <div class="col-xs-3" id="tasvie_panel" style="display: none">
                                <div class="form-group right_padding" >
                                    <label for="tasvie">موعد تسویه</label>
                                    <input name="tasvie" id="tasvie" class="form-control" value="<?php echo set_value('tasvie')?>">
                                    <?php echo form_error('tasvie'); ?>
                                </div>
                            </div>
                            <div class="col-xs-9">

                                <div class="form-group right_padding " >
                                    <label for="tozihat">توضیحات</label>
                                    <textarea name="tozihat" id="tozihat" class="form-control" rows="3"><?php echo set_value('tozihat'); ?></textarea>
                                    <?php echo form_error('tozihat')?>
                                </div>
                            </div>
                        </div>

                            <div class="right_padding">
                                <button type="submit"  class="btn btn-default ">افزودن
                                    <span class="fa fa-plus-circle"></span>
                                </button>
                            </div>



                    </div>
                    <?php endif; ?>
                </fieldset>

            </form>
        </div><!------>
    </div><!----------->
    <br>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1"

            <div style="height: 400px; overflow: auto;">
                <table class="table table-bordered table-hover">
                    <thead style="color:white; background-color: #2aabd2;" >
                    <tr>
                        <th>ردیف</th>
                        <th>نحوه پرداخت</th>
                        <th>مبلغ</th>
                        <th>شماره مرجع</th>
                        <th>وضعیت</th>
                        <th>موعد تسویه</th>
                        <th>توضیحات</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($more_data[1] as $index=>$row): ?>
                        <tr>
                            <td><?php echo $index+1; ?></td>
                            <td><?php echo $row['nahve_pardakht']; ?></td>
                            <td><?php echo number_format($row['mablagh']); ?></td>
                            <td><?php echo $row['shomare_marja']; ?></td>
                            <td><?php echo $row['vaziat']; ?></td>
                            <td><?php echo $row['tarikh_tasvie']; ?></td>
                            <td><?php echo $row['tozihat']; ?></td>
                            <td>
                                <?php if(!empty($session['del_open_mali_per'])||!empty($session['del_open_mali_kartable_per'])): ?>
                                    <a class="btn btn-default show_delete_modal" data-id ="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#delete_modal">
                                        <span class="glyphicon glyphicon-trash ">
                                        </span>
                                    </a>
                                <?php endif; ?>
                                <?php if(!empty($session['edit_open_mali_per'])||!empty($session['edit_open_mali_kartable_per'])): ?>
                                    <a class="btn  btn-default show_edit_modal" data-id ="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#myModal"><span class="fa fa-pencil-square-o"> </span></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- modal start here -->
    <div class="modal fade" id="myModal" role="dialog">
        <form id="change_conf" method="post" action="">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><span>تغییر مبلغ ثبت شده برای فرم با شماره اندیکاتور
                          <span name="serial_number" class="badge text-success"><?php echo $more_data[0] ;?></span>
                        </span></h4>
                    </div>
                    <div class="modal-body">
                        <!-- modal Body -->

                        <div class="form-group right_padding" >
                            <label for="b_nahve_pardakht">نحوه پرداخت</label>
                            <select name="b_nahve_pardakht" id="b_nahve_pardakht" class="form-control">
                                <option value="حواله" "<?php echo set_select('b_nahve_pardakht','حواله')?>">حواله</option>
                                <option value="POS" "<?php echo set_select('b_nahve_pardakht','POS')?>">POS</option>
                                <option value="نقدی" "<?php echo set_select('b_nahve_pardakht','نقدی')?>">نقدی</option>
                            </select>
                        </div>

                        <div class="form-group right_padding" >
                            <label for="b_mablagh">مبلغ</label>
                            <input name="b_mablagh" id="b_mablagh" class="form-control number" value="<?php echo set_value('b_mablagh')?>">
                            <?php echo form_error('b_mablagh')?>
                        </div>

                        <div class="form-group right_padding" >
                            <label for="b_shomare_marja">شماره مرجع</label>
                            <input name="b_shomare_marja" id="b_shomare_marja" class="form-control" value="<?php echo set_value('b_shomare_marja')?>">
                            <?php echo form_error('shomare_marja')?>
                        </div>

                        <div class="form-group right_padding" >
                            <label for="b_vaziat">وضعیت </label>
                            <select name="b_vaziat" id="b_vaziat" class="form-control" >
                                <option value="تسویه" "<?php echo set_select('vaziat','تسویه')?>">تسویه</option>
                                <option value="بیعانه" "<?php echo set_select('vaziat','بیعانه')?>">بیعانه</option>
                            </select>
                        </div>
                        <div class="form-group right_padding" >
                            <label for="b_tasvie">موعد تسویه</label>
                            <input name="b_tasvie" id="b_tasvie" class="form-control" value="<?php echo set_value('b_tasvie')?>">
                            <?php echo form_error('b_tasvie'); ?>
                        </div>

                        <div class="form-group right_padding " >
                            <label for="b_tozihat">توضیحات</label>
                            <textarea name="b_tozihat" id="b_tozihat" class="form-control" rows="3"><?php echo set_value('b_tozihat'); ?></textarea>
                            <?php echo form_error('b_tozihat')?>
                        </div>



                        <!-- end modal body -->
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-info">اعمال تغییرات</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <!-- modal end here --->

    <!-- delete Modal start here ---->
    <!-- Modal -->
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
    </div>

    <!-- delete modal end here -->

    <script src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
    <script>
        $(function(){
            // ajax for modal
            var base = '<?php echo base_url(); ?>';
            $('.show_delete_modal').click(function(){
                var key_value = $(this).attr('data-id');
                var form_serial = <?php echo $more_data[0] ;?>;
                $('#delete_button').attr('href',base+ 'financial_page/delete_mali_detail_entry/'+form_serial+'/'+key_value);

            });


            $('.show_edit_modal').click(function(){
                var key_value = $(this).attr('data-id');
                var form_serial = <?php echo $more_data[0] ;?>;

                $.ajax({
                    url: base + 'financial_page/show_mali_by_id',
                    type: 'post',
                    dataType: 'json',
                    data: {'key' : key_value },
                    success: function(data){
                        var results = data;
                        $.each(data, function(i, item){
                            $("#b_mablagh").val(item.mablagh);
                            $("#b_nahve_pardakht").val(item.nahve_pardakht);
                            $("#b_shomare_marja").val(item.shomare_marja);
                            $("#b_vaziat").val(item.vaziat);
                            $("#b_tasvie").val(item.tarikh_tasvie);
                            $("#b_tozihat").val(item.tozihat);
                            $("#change_conf").attr("action",base+"financial_page/update_mali/"+key_value+"/"+form_serial)

                        });

                    },
                    error: function(){
                        alert('عدم امکان برقراری ارتباط با سرور');
                    }
                });

            });
            //end of ajax for modal

            $("#change_conf").validate({
                rules:{
                    b_mablagh: "required",
                    b_shomare_marja:{number:true},
                    b_tozihat:"required"
                },
                messages:{
                    b_mablagh: "وارد کردن این فیلد اجباری می باشد",
                    b_shomare_marja: "این فیلد باید عددی باشد",
                    b_tozihat: "وارد کردن این فیلد اجباری می باشد"
                }
            });
            if($("select#vaziat").val()=='بیعانه'){
                $("div#tasvie_panel").fadeIn("slow");
            }

            $("select#vaziat").change(function(){
                if($(this).val()=='بیعانه'){
                    $("div#tasvie_panel").fadeIn("slow");
                }
                if($(this).val()=='تسویه'){
                    $("div#tasvie_panel").fadeOut("slow");
                }
            });
        })

    </script>
    <script src="<?php echo base_url(); ?>js/persianDatepicker.js"></script>
    <script>
        $(function () {
            $(".number").number( true);
            $("input#tasvie").persianDatepicker();
            $("input#b_tasvie").persianDatepicker();
        })
    </script>
</div>
</body>
</html>