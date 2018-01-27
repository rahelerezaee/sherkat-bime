<!-- inbox_page -->
<div class="container-fluid">
    <h3 class="text-center">اقدامات صورت گرفته بر فرم پیشنهاد</h3>
    <br>
    <br>

    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">

            <div class="row">
                <div class="col-xs-10">
                    <form class="form-inline">
                        <div class="form-group" >
                            <label for="category">جستجو براساس</label>
                            <select name="category" id="category" class="form-control" >

                                <option value="1">شرح رویداد</option>
                                <option value="2">انجام شده بوسیله</option>
                                <option value="3">برای</option>
                                <option value="4">تاریخ رویداد</option>
                                <option value="5">زمان رویداد</option>
                            </select>
                        </div>
                        &nbsp;
                        <div class="form-group input-group">
                            <input type="search" name="query" id="query" class="form-control" placeholder="عبارت جستجو" onkeyup="search_function()" >
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-xs-12">

                    <form class="form-inline" method="post" action="<?php echo base_url().'form_log/delete_log/'.$more_data['indicator_num'] ?>">
                        <div style="height: 400px; overflow: auto;">
                            <table id="data_table" class="table table-bordered table-hover">
                                <thead style="color:white; background-color: #2aabd2;" >
                                <tr>
                                    <?php if(!empty($session['delete_independent_eghdam_per'])||!empty($session['delete_auto_kartable_per'])): ?>
                                    <th></th>
                                    <?php endif;?>
                                    <th>ردیف</th>
                                    <th>شرح رویداد</th>
                                    <th>انجام شده بوسیله</th>
                                    <th>برای</th>
                                    <th>تاریخ رویداد</th>
                                    <th>زمان رویداد</th>


                                </tr>
                                </thead>

                                <tbody>

                                <?php foreach ($more_data['log_data'] as $index=>$row ): ?>
                                    <tr class="tr-click" style="cursor: pointer;"  data-id="<?php echo $row['id']; ?>"">
                                    <?php if(!empty($session['delete_independent_eghdam_per'])||!empty($session['delete_auto_kartable_per'])): ?>
                                    <th>
                                        <input type="checkbox" value="<?php echo  $row['id']; ?>" name="forms_value[]">
                                    </th>
                                    <?php endif;?>
                                    <td><?php echo $index+1; ?></td>
                                    <td><?php echo $row['action_description']; ?></td>
                                    <td><?php echo $row['by_user_full_name']; ?></td>
                                    <td><?php echo $row['to_user_full_name']; ?></td>
                                    <td><?php echo $row['action_date']; ?></td>
                                    <td><?php echo $row['action_time']; ?></td>



                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                        <br>

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
                                        <input type="submit" class="btn btn-warning" value="بله" />

                                        <button type="button" class="btn btn-default btn-info" data-dismiss="modal">خیر</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <?php if(!empty($session['delete_independent_eghdam_per'])||!empty($session['delete_auto_kartable_per'])): ?>
            <div class="row">
                <div class="col-xs-2">
                    <a class="btn btn-block btn-danger"  data-toggle="modal" data-target="#delete_modal">حذف</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if(!empty($session['display_independent_eghdam_per'])||!empty($session['display_detail_auto_kartable_per'])):?>
    <div class="modal fade" id="detail_modal" role="dialog">
        <div class="modal-dialog modal-sm" style="width: 800px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">جزییات رویداد</h4>
                </div>
                <div class="modal-body">

                        <table class="table table-bordered">

                            <tbody>
                            <tr>
                                <th class="th-blue">شماره اندیکاتور</th>
                                <td id="indicator_num"></td>

                            </tr>
                            <tr>
                                <th class="th-blue">نام و نام خانوادگی متقاضی</th>
                                <td id="applicant_name"></td>

                            </tr>
                            <tr>
                                <th class="th-blue">نام و نام خانوادگی بیمه شده</th>
                                <td id="insured_name"></td>

                            </tr>
                            <tr>
                                <th class="th-blue">اقدام انجام شده</th>
                                <td id="action_description"></td>
                            </tr>
                            <tr>
                                <th class="th-blue">به وسیله</th>
                                <td id="by_user_name"></td>
                            </tr>
                            <tr>
                                <th class="th-blue">تاریخ اقدام</th>
                                <td id="action_date"></td>
                            </tr>
                            <tr>
                                <th class="th-blue">زمان اقدام</th>
                                <td id="action_time"></td>
                            </tr>
                            <tr class="erja">
                                <th class="th-blue">ارجاع برای کاربر</th>
                                <td id="for_user_full_name"></td>
                            </tr>
                            <tr class="mali">
                                <th class="th-blue">نحوه پرداخت</th>
                                <td id="nahve_pardakht"></td>
                            </tr>
                            <tr class="mali">
                                <th class="th-blue">مبلغ</th>
                                <td id="mablagh"></td>
                            </tr>
                            <tr class="mali">
                                <th class="th-blue">شماره مرجع</th>
                                <td id="shomare_marja"></td>
                            </tr>
                            <tr class="mali">
                                <th class = "th-blue">وضعیت</th>
                                <td id="vaziat"></td>
                            </tr>
                            <tr class="mali">
                                <th class="th-blue">تاریخ تسویه</th>
                                <td id="tarikh_tasvie"></td>
                            </tr>
                            <tr  class="mali">
                                <th class="th-blue">توضیحات</th>
                                <td id="tozihat"></td>
                            </tr>
                            <tr class="eghdam">
                                <th class="th-blue">شرح اقدام صورت گرفته</th>
                                <td id="eghdam_description"></td>
                            </tr>
                            <tr class="duty">
                                <th class="th-blue">شرح وظیفه تعیین شده</th>
                                <td id="duty_description"></td>
                            </tr>
                            <tr class="duty">
                                <th class="th-blue">برای</th>
                                <td id="duty_description_reciever_full_name"></td>
                            </tr>





                            </tbody>
                        </table>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-info" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<style>
    .modal-body {
        max-width: 800px;
    }
</style>

<script>
    <?php if(!empty($session['display_independent_eghdam_per'])||!empty($session['display_detail_auto_kartable_per'])):?>
    $(document).ready(function(){
        //data-toggle="modal" data-target="#detail_modal"

        $(".tr-click td").attr("data-toggle","modal");
        $(".tr-click td").attr("data-target","#detail_modal");
        $(".tr-click td").addClass("td-click");
        $('.td-click').on('click',function(){
            /// send data to serve with ajax
            var base = '<?php echo base_url(); ?>';
            var id = $(this).closest("tr").attr('data-id');
            $.ajax({
                url:base+'form_log/show_action_detail/',
                type:'post',
                dataType:'json',
                data:{'key':id},
                success:function(data){
                    $.each(data, function(i, item){
                        $(".erja").css("display","table-row");
                        $(".mali").css("display","table-row");
                        $(".eghdam").css("display","table-row");
                        $(".duty").css("display","table-row");
                        $("#indicator_num").html(item.indicator_num);
                        $("#applicant_name").html(item.f_name+" "+item.l_name);
                        $("#insured_name").html(item.f_name2+" "+item.l_name2);
                        $("#action_description").html(item.action_description);
                        $("#by_user_name").html(item.by_user_full_name);
                        $("#action_date").html(item.action_date);
                        $("#action_time").html(item.action_time);
                        (item.to_user_full_name!=null)?$("#for_user_full_name").html(item.to_user_full_name):$(".erja").css("display","none");
                        (item.nahve_pardakht!=null)?$("#nahve_pardakht").html(item.nahve_pardakht):$(".mali").css("display","none");
                        (item.mablagh!=null)?$("#mablagh").html(item.nahve_pardakht):$(".mali").css("display","none");
                        (item.shomare_marja!=null)?$("#shomare_marja").html(item.shomare_marja):$(".mali").css("display","none");
                        (item.vaziat!=null)?$("#vaziat").html(item.vaziat):$(".mali").css("display","none");
                        (item.tarikh_tasvie!=null)?$("#tarikh_tasvie").html(item.tarikh_tasvie):$(".mali").css("display","none");
                        (item.tozihat!=null)?$("#tozihat").html(item.tozihat):$(".mali").css("display","none");
                        (item.description!=null)?$("#eghdam_description").html(item.description):$(".eghdam").css("display","none");
                        (item.duty_description!=null)?$("#duty_description").html(item.duty_description):$(".duty").css("display","none");
                        (item.reciever_full_name!=null)?$("#duty_description_reciever_full_name").html(item.reciever_full_name):$(".duty").css("display","none");

                    });


                },
                error: function(){
                    alert('عدم امکان برقراری ارتباط با سرور');
                }
            });

        });
    });
    <?php endif; ?>

    function search_function() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("query");
        filter = input.value.toUpperCase();
        table = document.getElementById("data_table");
        field_num = $('#category').val();
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[field_num];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }



</script>
</body>
</html>