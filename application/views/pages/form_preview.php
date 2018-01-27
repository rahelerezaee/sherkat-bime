<div class="container" style="margin-top: 75px">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 toppad" >

                <div class="alert alert-warning">
                    تعداد وظایف تعریف شده در این فرم برابر است با
                    <a class="badge" data-toggle="modal" data-target="#duty_modal"><?php echo count($more_data['duty_data']); ?></a>

                </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 toppad" >
            <div class="col-xs-5">


                <span>شماره بیمه نامه:
                <span class="<?php echo ($more_data[0]['shomare_bime_name']==null)?'text-danger':'' ;?>" name="shomare_bime_name"><?php echo ($more_data[0]['shomare_bime_name']==null)?'هنوز شماره بیمه نامه ای ثبت نشده است':$more_data[0]['shomare_bime_name']; ?></span>
                </span>

            </div>
            <span>شماره پیشنهاد:
            <span class="<?php echo ($more_data[0]['shomare_pishnahad']==null)?'text-danger':'' ;?>" name="shomare_pishnahad"><?php echo ($more_data[0]['shomare_pishnahad']==null)?'هنوز شماره پیشنهادی ثبت نشده است':$more_data[0]['shomare_pishnahad']; ?></span>
            </span>


            <br>
            <br>


            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">مشخصات فرم پیشنهاد</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div style="padding: 20px;">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>مشاور:
                                        <span><?php echo $more_data[0]['user_full_name']; ?></span>
                                    </td>

                                    <td>موقعیت:
                                        <span><?php echo $more_data[0]['location_id']; ?></span>
                                    </td>
                                    <td>شماره اندیکاتور:
                                        <span><?php echo $more_data[0]['indicator_num']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>تاریخ امضای پیشنهاد:
                                        <span><?php echo $more_data[0]['sign_date']; ?></span>
                                    </td>

                                    <td>سریال فرم پیشنهاد:
                                        <span><?php echo $more_data[0]['form_serial']; ?></span>
                                    </td>
                                    <td>سریال رسید وجه:
                                        <span><?php echo $more_data[0]['payment_serial']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>تاریخ ثبت:
                                        <span><?php echo $more_data[0]['register_date']; ?></span>
                                    </td>
                                    <td>زمان ثبت:
                                        <span><?php echo $more_data[0]['register_time']; ?></span>
                                    </td>
                                    <td>
                                        <span>کاربر جاری:
                                            <span class="text-danger"><?php echo $more_data[3]['f_name'] .' '.  $more_data[3]['l_name'] ;?></span>
                                        </span>
                                    </td>
                                </tr>

                                </tbody>
                            </table>


                        </div>

                    </div>
                </div>
                <div class="panel-footer">

                </div>

            </div>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">مشخصات متقاضی</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div style="padding: 20px;">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>نام:
                                        <span><?php echo $more_data[0]['f_name']; ?></span>
                                    </td>

                                    <td>نام خانوادگی:
                                        <span><?php echo $more_data[0]['l_name']; ?></span>
                                    </td>
                                    <td>کد ملی:
                                        <span><?php echo $more_data[0]['codemelli']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>تاریخ تولد:
                                        <span><?php echo $more_data[0]['birth_date']; ?></span>
                                    </td>

                                    <td>محل صدور:
                                        <span><?php echo $more_data[0]['sodoor_location']; ?></span>
                                    </td>
                                    <td>جنسیت:
                                        <span><?php echo $more_data[0]['gender']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>وضعیت تاهل:
                                        <span><?php echo $more_data[0]['married_status']; ?></span>
                                    </td>

                                    <td>سطح تحصیلات:
                                        <span class="<?php echo ($more_data[0]['tahsilat']==null)?'text-danger':'' ;?>"><?php echo ($more_data[0]['tahsilat']==null)?'وارد نشده است':$more_data[0]['tahsilat']; ?></span>
                                    </td>
                                    <td>نظام وظیفه:
                                        <span><?php echo $more_data[0]['nezam_vazife_status']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>وزن:
                                        <span class="<?php echo ($more_data[0]['vazn']==0)?'text-danger':'' ;?>"><?php echo ($more_data[0]['vazn']==0)?'وارد نشده است':$more_data[0]['vazn']; ?></span>
                                    </td>
                                    <td>قد:
                                        <span class="<?php echo ($more_data[0]['ghad']==0)?'text-danger':'' ;?>"><?php echo ($more_data[0]['ghad']==0)?'وارد نشده است':$more_data[0]['ghad']; ?></span>
                                    </td>
                                    <td>شغل اصلی:
                                        <span><?php echo $more_data[0]['job']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>نشانی:
                                        <span><?php echo $more_data[0]['address']; ?></span>
                                    </td>
                                    <td>کد پستی:
                                        <span><?php echo $more_data[0]['postcode']; ?></span>
                                    </td>
                                    <td>تلفن ثابت:
                                        <span class="<?php echo ($more_data[0]['tel']==null)?'text-danger':'' ;?>"><?php echo ($more_data[0]['tel']==null)?'وارد نشده است':base64_decode($more_data[0]['tel']); ?></span>
                                    </td>
                                </tr>
                                <tr>

                                    <td>تلفن همراه1:
                                        <span><?php echo base64_decode($more_data[0]['mobile']); ?></span>
                                    </td>
                                    <td>تلفن همراه2:
                                        <span class="<?php echo ($more_data[0]['mobile2']==null)?'text-danger':'' ;?>"><?php echo ($more_data[0]['mobile2']==null)?'وارد نشده است':base64_decode($more_data[0]['mobile2']); ?></span>
                                    </td>
                                    <td>پست الکترونیک:
                                        <span class="<?php echo ($more_data[0]['email']==null)?'text-danger':'' ;?>"><?php echo ($more_data[0]['email']==null)?'وارد نشده است':$more_data[0]['email']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">توضیحات:
                                        <span class="<?php echo ($more_data[0]['tozihat']==null)?'text-danger':'' ;?>"><?php echo ($more_data[0]['tozihat']==null)?'وارد نشده است':$more_data[0]['tozihat']; ?></span>
                                    </td>

                                </tr>

                                </tbody>
                            </table>


                        </div>

                    </div>
                </div>
                <div class="panel-footer">

                </div>
            </div>


            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">مشخصات بیمه شونده</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div style="padding: 20px;">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td colspan="3">نسبت:
                                        <span><?php echo $more_data[0]['nesbat']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>نام:
                                        <span><?php echo $more_data[0]['f_name2']; ?></span>
                                    </td>

                                    <td>نام خانوادگی:
                                        <span><?php echo $more_data[0]['l_name2']; ?></span>
                                    </td>
                                    <td>کد ملی:
                                        <span><?php echo $more_data[0]['codemelli2']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>تاریخ تولد:
                                        <span><?php echo $more_data[0]['birth_date2']; ?></span>
                                    </td>

                                    <td>محل صدور:
                                        <span><?php echo $more_data[0]['sodoor_location2']; ?></span>
                                    </td>
                                    <td>جنسیت:
                                        <span><?php echo $more_data[0]['gender']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>وضعیت تاهل:
                                        <span><?php echo $more_data[0]['married_status']; ?></span>
                                    </td>

                                    <td>سطح تحصیلات:
                                        <span class="<?php echo ($more_data[0]['tahsilat2']==null)?'text-danger':'' ;?>"><?php echo ($more_data[0]['tahsilat2']==null)?'وارد نشده است':$more_data[0]['tahsilat2']; ?></span>
                                    </td>
                                    <td>نظام وظیفه:
                                        <span><?php echo $more_data[0]['nezam_vazife_status2']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>وزن:
                                        <span class="<?php echo ($more_data[0]['vazn2']==0)?'text-danger':'' ;?>"><?php echo ($more_data[0]['vazn2']==0)?'وارد نشده است':$more_data[0]['vazn2']; ?></span>
                                    </td>
                                    <td>قد:
                                        <span class="<?php echo ($more_data[0]['ghad2']==0)?'text-danger':'' ;?>"><?php echo ($more_data[0]['ghad2']==0)?'وارد نشده است':$more_data[0]['ghad2']; ?></span>
                                    </td>
                                    <td>شغل اصلی:
                                        <span><?php echo $more_data[0]['job2']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>نشانی:
                                        <span><?php echo $more_data[0]['address2']; ?></span>
                                    </td>
                                    <td>کد پستی:
                                        <span><?php echo $more_data[0]['postcode2']; ?></span>
                                    </td>
                                    <td>تلفن ثابت:
                                        <span class="<?php echo ($more_data[0]['tel']==null)?'text-danger':'' ;?>"><?php echo ($more_data[0]['tel']==null)?'وارد نشده است':base64_decode($more_data[0]['tel']); ?></span>
                                    </td>
                                </tr>
                                <tr>

                                    <td>تلفن همراه1:
                                        <span><?php echo base64_decode($more_data[0]['mobile1_2']); ?></span>
                                    </td>
                                    <td>تلفن همراه2:
                                        <span class="<?php echo ($more_data[0]['mobile2_2']==null)?'text-danger':'' ;?>"><?php echo ($more_data[0]['mobile2_2']==null)?'وارد نشده است':base64_decode($more_data[0]['mobile2_2']); ?></span>
                                    </td>
                                    <td>پست الکترونیک:
                                        <span class="<?php echo ($more_data[0]['email2']==null)?'text-danger':'' ;?>"><?php echo ($more_data[0]['email2']==null)?'وارد نشده است':$more_data[0]['email2']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">توضیحات:
                                        <span class="<?php echo ($more_data[0]['tozihat2']==null)?'text-danger':'' ;?>"><?php echo ($more_data[0]['tozihat2']==null)?'وارد نشده است':$more_data[0]['tozihat2']; ?></span>
                                    </td>

                                </tr>

                                </tbody>
                            </table>


                        </div>

                    </div>
                </div>
                <div class="panel-footer">

                </div>

            </div>


            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">مشخصات بیمه نامه مورد درخواست</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div style="padding: 20px;">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>مدت بیمه (سال):
                                        <span><?php echo $more_data[0]['modat_bime']; ?></span>
                                    </td>

                                    <td>سپرده اولیه (ریال):
                                        <span><?php echo number_format($more_data[0]['seporde']); ?></span>
                                    </td>
                                    <td>حق بیمه سال اول (ریال):
                                        <span><?php echo number_format($more_data[0]['hagh_bime']); ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ضریب افزایش سالیانه حق بیمه (درصد):
                                        <span><?php echo $more_data[0]['zarib_hagh_bime']; ?></span>
                                    </td>

                                    <td>روش پرداخت:
                                        <span><?php echo $more_data[0]['ravesh_pardakht']; ?></span>
                                    </td>
                                    <td>سرمایه ی فوت سال اول (ریال):
                                        <span><?php echo number_format($more_data[0]['sarmaie_fot']); ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ضریب افزایش سالیانه سرمایه فوت (درصد):
                                        <span><?php echo $more_data[0]['zarib_sarmaie_fot']; ?></span>
                                    </td>
                                    <td>وضعیت سلامت خانواده:
                                        <span><?php echo $more_data[0]['vaziat_salamat_khanevade']; ?></span>
                                    </td>
                                    <td>وضعیت سلامت بیمه شده:
                                        <span><?php echo $more_data[0]['vaziat_salamat_bime_shode']; ?></span>
                                    </td>
                                </tr>
                                <tr>


                                    <td colspan="3">توضیحات مربوط به وضعیت سلامت خانواده:
                                        <span class="<?php echo ($more_data[0]['tozihat_vaziat_salamat_khanevade']==null)?'text-danger':'' ;?>"><?php echo ($more_data[0]['tozihat_vaziat_salamat_khanevade']==null)?'وارد نشده است':$more_data[0]['tozihat_vaziat_salamat_khanevade']; ?></span>
                                    </td>
                                </tr>
                                <tr>

                                    <td colspan="3">توضیحات مربوط به وضعیت سلامت بیمه شده:
                                        <span class="<?php echo ($more_data[0]['tozihat_vaziat_salamat_bime_shode']==null)?'text-danger':'' ;?>"><?php echo ($more_data[0]['tozihat_vaziat_salamat_bime_shode']==null)?'وارد نشده است':$more_data[0]['tozihat_vaziat_salamat_bime_shode']; ?></span>
                                    </td>
                                </tr>

                                </tbody>
                            </table>


                        </div>

                    </div>
                </div>
                <div class="panel-footer">

                </div>
            </div>
            <!-- mali -->

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">مشخصات مالی</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div style="padding: 20px;">
                                <div style="height: 400px; overflow: auto;">
                                    <table class="table table-bordered table-hover">
                                        <thead style="color:white; background-color: #2aabd2;" >
                                        <tr>
                                            <th>ردیف</th>
                                            <th>نحوه پرداخت</th>
                                            <th>مبلغ</th>
                                            <th>شماره مرجع</th>
                                            <th>توضیحات</th>
                                            <th>وضعیت</th>

                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($more_data[2] as $index => $row): ?>
                                            <tr class="<?php echo ($row['accepted'] == 1)? 'bg-danger' : (($row['accepted'] == null)?'':'bg-success'); ?>">
                                                <td><?php echo $index+1; ?></td>
                                                <td><?php echo $row['nahve_pardakht']; ?></td>
                                                <td class="number"><?php echo number_format($row['mablagh']); ?></td>
                                                <td><?php echo $row['shomare_marja']; ?></td>
                                                <td><?php echo $row['tozihat']; ?></td>
                                                <td><?php echo $row['vaziat']; ?></td>

                                            </tr>
                                        <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="panel-footer">

                    </div>
                </div>

            <!-- mali end here -->
        </div>
    </div>

    <!--- duty Modal start Here --->
    <div class="modal fade" id="duty_modal" role="dialog">
        <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">وظایف تعیین شده</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered table-hover">
                            <thead style="color:white; background-color: #2aabd2;">
                            <tr>
                                <th>ردیف</th>
                                <th> وظیفه تعین شده</th>
                                <th> توسط</th>
                                <th>برای</th>

                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach ($more_data['duty_data'] as $index => $row): ?>
                                <tr>
                                    <td><?php echo $index + 1; ?></td>
                                    <td><?php echo $row['duty_description'] ?></td>
                                    <td><?php echo $row['sender_full_name'] ?></td>
                                    <td><?php echo $row['reciever_full_name'] ?></td>

                                </tr>
                            <?php endforeach; ?>


                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-warning" data-dismiss="modal">بستن</button>
                    </div>
                </div>



        </div>
    </div>

    <!-- duty modal end here -->
</div>