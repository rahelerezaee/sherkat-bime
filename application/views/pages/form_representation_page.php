
<div class="container" style="margin-top: 75px">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 toppad" >
            <?php if($more_data['count']>0): ?>
                <div class="alert alert-warning">
                    تعداد وظایف انجام نشده ی شما در این فرم برابر است با
                    <a class="badge" data-toggle="modal" data-target="#duty_modal"><?php echo $more_data['count']; ?></a>

                </div>
            <?php else: ?>
                <?php if(count($more_data['duty_data'])!=0): ?>
                    <div class="alert alert-success">
                        شما تمام وظایف خود را انجام داده اید
                        <a class="badge" data-toggle="modal" data-target="#duty_modal"><?php echo count($more_data['duty_data']); ?></a>

                    </div>
                <?php endif; ?>
            <?php endif; ?>
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
                                    <td></td>
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
            <?php if(!empty($session['mali_kartable_per'])): ?>
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
                                            <?php if(!empty($session['conf_mali_kartable_per'])&&!empty($session['nconf_mali_kartable_per'])): ?>
                                                <th></th>
                                            <?php endif; ?>
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
                                                <?php if(!empty($session['conf_mali_kartable_per'])&&!empty($session['nconf_mali_kartable_per'])): ?>
                                                    <td>
                                                        <?php if(!empty($session['conf_mali_kartable_per'])): ?>
                                                            <?php if($row['accepted'] == 1 || $row['accepted'] == null): ?>
                                                                <a class="btn  btn-default " href="<?php echo base_url(); ?>financial_page/confirm_mali_detail/<?php echo $more_data[0]['indicator_num'].'/'.$row['id']?>/0">تایید
                                                                    <span class="glyphicon glyphicon-ok text-success">
                                                    </span>
                                                                </a>
                                                            <?php endif; ?>

                                                        <?php endif; ?>

                                                        <?php if(!empty($session['nconf_mali_kartable_per'])): ?>
                                                            <?php if($row['accepted'] == 0 || $row['accepted'] == null): ?>
                                                                <a class="btn  btn-default" href="<?php echo base_url(); ?>financial_page/confirm_mali_detail/<?php echo $more_data[0]['indicator_num'].'/'.$row['id']?>/1">عدم تایید
                                                                    <span class="glyphicon glyphicon-remove text-danger">
                                                                </span>
                                                                </a>
                                                            <?php endif; ?>
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
                        <?php if(!empty($session['open_mali_kartable_per'])): ?>
                            <a href="<?php echo base_url(); ?>financial_page/show_mali_detail_page/<?php echo $more_data[0]['indicator_num']; ?>" class="btn btn-info">افزودن</a>
                        <?php endif;?>
                    </div>
                    <div class="panel-footer">

                    </div>
                </div>
            <?php endif; ?>
            <!-- mali end here -->




            <!-- sodoor user part sarts here -->

            <?php if(!empty($session['pishnahd_kartable_per'])): ?>
                <form method="post" action="<?php echo base_url(); ?>retrieve_page/insert_shomare_bime/<?php echo $more_data[0]['indicator_num']; ?>">
                    <fieldset>
                        <legend><span class="<?php echo $more_data[0]['ready_to_register']!=0?'glyphicon glyphicon-ok':''?> pull-right"></span> ثبت شماره بیمه نامه و شماره پیشنهاد</legend>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form-group right_padding" >

                                            <label for="eghdamat_done">اقدامات انجام شده</label>
                                            <select name="eghdamat_done" id="eghdamat_done" class="form-control">
                                                <option <?php echo set_select('eghdamat_done','1'); ?> value="1">امکان ثبت نمی باشد</option>
                                                <option <?php echo ($more_data[0]['shomare_pishnahad']!='')? 'selected' : set_select('eghdamat_done','2'); ?> value="2">پیشنهاد ثبت شد</option>
                                            </select>
                                            <?php echo form_error('eghdamat_done'); ?>
                                        </div>
                                    </div>

                                    <div class="show_on_condition1 col-xs-4" style="display: none">
                                        <div class="form-group right_padding">
                                            <label for="shomare_pishnahad2">شماره پیشنهاد</label>
                                            <input type="number" name="shomare_pishnahad2" id="shomare_pishnahad2" class="form-control"  value="<?php echo ($more_data[0]['shomare_pishnahad']!='')?$more_data[0]['shomare_pishnahad']:set_value('shomare_pishnahad2'); ?>">
                                            <?php echo form_error('shomare_pishnahad2'); ?>
                                        </div>
                                    </div>
                                    <div class="show_on_condition1 col-xs-4" style="display: none">
                                        <div class="form-group right_padding">
                                            <label for="tarikh_pishnahad2">تاریخ پیشنهاد</label>
                                            <input name="tarikh_pishnahad2" id="tarikh_pishnahad2" class="form-control"  value="<?php echo ($more_data[0]['tarikh_pishnahad']!='')?$more_data[0]['tarikh_pishnahad']:set_value('tarikh_pishnahad2'); ?>">
                                            <?php echo form_error('tarikh_pishnahad2'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="show_on_condition1 col-xs-4"style="display: none">
                                        <div class="form-group right_padding" >
                                            <label for="bime_status">اقدامات انجام شده</label>
                                            <select name="bime_status" id="bime_status" class="form-control">
                                                <option <?php echo set_select('bime_status','1'); ?> value="1">چکاپ صادر شد</option>
                                                <option <?php echo ($more_data[0]['shomare_bime_name']!='')?'selected':set_select('bime_status','2'); ?> value="2">بیمه نامه صادر شد</option>
                                            </select>
                                            <?php echo form_error('bime_status'); ?>
                                        </div>
                                    </div>
                                    <div class="show_on_condition2 col-xs-4" style="display: none">
                                        <div class="form-group right_padding">
                                            <label for="shomare_bime_name2">شماره بیمه نامه</label>
                                            <input type="number" name="shomare_bime_name2" id="shomare_bime_name2" class="form-control" value="<?php echo ($more_data[0]['shomare_bime_name']!='')?$more_data[0]['shomare_bime_name']: set_value('shomare_bime_name2'); ?>">
                                            <?php echo form_error('shomare_bime_name2'); ?>
                                        </div>
                                    </div>

                                    <div class="show_on_condition2 col-xs-4" style="display: none">
                                        <div class="form-group right_padding">
                                            <label for="tarikh_bime_name2">تاریخ بیمه نامه</label>
                                            <input name="tarikh_bime_name2" id="tarikh_bime_name2" class="form-control" value="<?php echo ($more_data[0]['tarikh_bime_name']!='')?$more_data[0]['tarikh_bime_name']: set_value('tarikh_bime_name2'); ?>">
                                            <?php echo form_error('tarikh_bime_name2'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group right_padding" >
                                    <input  type="submit" name="save" id="save" class="btn btn-info" value="ثبت">
                                </div>
                            </div>
                        </div>

                    </fieldset>

                </form>
            <?php endif; ?>


            <!-- sodoor user part end here -->
            <br>

            <?php if(!empty($session['open_erja_kartable_per'])): ?>
                <div class="row">
                    <div class="col-xs-12">

                        <form class="form-inline" method="post" action="<?php echo base_url() ?>retrieve_page/send_forms/<?php echo $more_data[0]['indicator_num']; ?>">
                            <div style="margin: 0px 0px 50px 0px">
                                <h4 class="page-header">ارجاع</h4>
                                <div style="margin: 0px 0px 50px 0px" class="form-group"  >
                                    <label for="erja">ارجاع به</label>
                                    <select name="erja" id="erja" class="form-control" >
                                        <option disabled="disabled" selected>انتخاب نقش</option>
                                        <?php foreach ($more_data[3] as $role): ?>
                                            <option value="<?php echo $role['role2']?>"><?php echo $role['role_name']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    &nbsp;<?php echo form_error('erja'); ?>
                                    &nbsp;<label for="user_erja">کاربر</label>
                                    <select name="user_erja" id="user_erja" class="form-control">
                                        <option disabled selected>انتخاب کاربر</option>

                                    </select>

                                    <label for="mohlat_erja">مهلت ارجاع</label>
                                    <input name="mohlat_erja" id="mohlat_erja" class="form-control" value="<?php echo set_value('mohlat_erja'); ?>">
                                    &nbsp;<?php echo form_error('mohlat_erja'); ?>

                                    <label for="time_erja">زمان ارجاع</label>
                                    <input type="time" name="time_erja" id="time_erja" class="form-control" value="<?php echo set_value('time_erja'); ?>">
                                    <?php echo form_error('time_erja'); ?>

                                    <div class="form-group input-group " style="margin-right:20px; ">
                                        <button type="submit" name="send" id="send" class="btn btn-info" >ارسال
                                            &nbsp;<span class="glyphicon glyphicon-send"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            <?php endif; ?>


            <?php if(!empty($session['edit_duty_eghdamat_open_kartable_per'])): ?>
                <div class="row">
                    <div class="col-xs-12">
                        <h4 class="page-header">تغییر اطلاعات و ثبت وظیفه و اقدامات</h4>
                        <?php if(!empty($session['eghdam_kartable_per'])): ?>
                            <a href="<?php echo base_url(); ?>retrieve_page/show_eghdamat_page/<?php echo $more_data[1]['user_id'].'/'.$more_data[0]['indicator_num']; ?>" class="text-center btn btn-info">رفتن به صفحه ثبت اقدامات</a>
                        <?php endif; ?>
                        <?php if(!empty($session['duty_kartable_per'])): ?>
                            <a href="<?php echo base_url(); ?>retrieve_page/show_duty_page/<?php echo $more_data[0]['indicator_num']; ?>" class="text-center btn btn-warning">رفتن به صفحه ثبت وظیفه</a>
                        <?php endif; ?>

                        <?php if(!empty($session['edit_open_kartable_per'])): ?>
                            <a href="<?php echo base_url(); ?>form_page/show_update_form_page/<?php echo $more_data[0]['indicator_num']; ?>/2" class="text-center btn btn-primary">رفتن به صفحه تغییر اطلاعات</a>
                        <?php endif; ?>


                    </div>

                </div>
            <?php endif; ?>

            <div class="row">
                <div class = "col-xs-2">

                </div>
            </div>
            <br>
            <br>
            <br>

        </div> <!--end col-xs-->
        <div class="col-xs-1">
            <div class="col-xs-4 col-xs-offset-4">
                <button onclick="topFunction()" id="myBtn" title="Go to top" ><span class="glyphicon glyphicon-chevron-up"></span></button>
            </div>

        </div>



    </div>

    <!-- duty modal start here -->
    <div class="modal fade" id="duty_modal" role="dialog">
        <div class="modal-dialog">
            <form method="post" action="<?php echo base_url(); ?>retrieve_page/confirm_duty/<?php echo $more_data[0]['indicator_num']; ?>">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">وظایف شما</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered table-hover">
                            <thead style="color:white; background-color: #2aabd2;">
                            <tr>
                                <th>ردیف</th>
                                <th> وظیفه تعین شده</th>
                                <th> توسط</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach ($more_data['duty_data'] as $index => $row): ?>
                                <tr>
                                    <td><?php echo $index + 1; ?></td>
                                    <td><?php echo $row['duty_description'] ?></td>
                                    <td><?php echo $row['sender_full_name'] ?></td>
                                    <td>
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="active_button" <?php echo ($row['done']==1)?'checked':''; ?> value="<?php echo $row['id']; ?>" name="checked_items[]"></label>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>


                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-info" value="ثبت">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">بستن</button>
                    </div>
                </div>
            </form>


        </div>
    </div>

    <!-- duty modal end here -->


</div>
<script>

    $(document).ready(function(){

        var base = '<?php echo base_url(); ?>';
        if($('#eghdamat_done').val() == 2)
            $('.show_on_condition1').fadeIn();
        if($('#bime_status').val() == 2)
            $('.show_on_condition2').fadeIn();

        $('#eghdamat_done').change(function(){

            if($('#eghdamat_done').val() == 2)
                $('.show_on_condition1').fadeIn();
            else{
                $('.show_on_condition1').fadeOut();
                $('.show_on_condition2').fadeOut();
            }
        });

        $('#bime_status').change(function(){

            if($('#bime_status').val() == 2)
                $('.show_on_condition2').fadeIn();
            else
                $('.show_on_condition2').fadeOut();
        });


        $("select#erja").change(function() {
            var key_word = $("select#erja").val();

            $.ajax({
                url: base + 'retrieve_page/show_user_role',
                type: 'post',
                dataType: 'json',
                data:{'key' : key_word},
                success: function(data){
                    if(data.length>0)
                    {
                        var result = "";
                        $.each(data, function(i, item){
                            result = result + "<option value="+item.user_id+">"+item.f_name+" "+item.l_name +"</option>"
                            $("select#user_erja").html(result);

                        });

                    }
                },
                error: function(){alert('ارتباط با سرور دچار مشکل شده است');}
            });
        });

    });
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
<script src="<?php echo base_url(); ?>js/persianDatepicker.js"></script>
<script>
    jQuery(document).ready(function($) {
        $("#mohlat_erja").persianDatepicker();
        $("#tarikh_pishnahad2").persianDatepicker();
        $("#tarikh_bime_name2").persianDatepicker();

    });

</script>

</body>
</html>