

<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col-xs-10">
            <?php if($more_data['suc'] != null): ?>
                <div class="alert alert-success alert-dismissable" style="margin-top: 10px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    ثبت با موفقیت انجام شد، شماره اندیکاتور اختصاص یافته شده به پرونده ی شما برابر است با
                    <strong><?php echo $more_data['suc']; ?></strong>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <div class="row">
        <div class="col-xs-5">
            <?php if($errors = validation_errors()): ?>
                <div class="alert alert-danger" style="margin-top: 10px;">
                    <?php echo $errors; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <div class="row">
        <section>
            <div class="wizard">
                <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" class="active">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="مشخصات فرم">
                            <span class="round-tab">
                                <i class="glyphicon  glyphicon-list-alt"></i>
                            </span>
                            </a>
                        </li>

                        <li role="presentation" class="disabled">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="مشخصات متقاضی">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="مشخصات بیمه شونده">
                            <span class="round-tab">
                                <i class="fa fa-users"></i>
                            </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="مشخصات بیمه نامه">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-copy"></i>
                            </span>
                            </a>
                        </li>

                    </ul>

                </div>

                <form action="<?php echo base_url()?>form_page/insert_new_form" method="post" role="form" class="form-horizontal">
                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="step1">

                            <div class="row">

                                <div class="col-xs-4 col-xs-offset-4" >
                                    <h3 class="text-center">مشخصات فرم</h3>


                                    <div class="form-group necessary">
                                        <span>*</span>
                                        <label for="location_id" class="control-label" >موقعیت</label>
                                        <select class="form-control" id="location_id" name="location_id">
                                            <?php foreach ($more_data['locations'] as $location): ?>
                                                <option value="<?php echo $location["location_name"]; ?>" <?php echo set_select('location_id',$location['location_name']); ?>>
                                                    <?php echo $location['location_name']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group necessary">
                                        <span>*</span>
                                        <label for="form_serial" class="control-label" >سریال فرم پیشنهاد</label>
                                        <input type="number" name="form_serial" id="form_serial" class="form-control" value="<?php echo set_value('form_serial'); ?>">
                                        <?php echo form_error('form_serial'); ?>
                                    </div>

                                    <div class="form-group necessary">
                                        <span>*</span>
                                        <label for="payment_serial" class="control-label" >سریال رسید وجه</label>
                                        <input type="number" name="payment_serial" id="payment_serial" class="form-control" value="<?php echo set_value('payment_serial'); ?>">
                                        <?php echo form_error('payment_serial'); ?>
                                    </div>

                                    <div class="form-group necessary">
                                        <span>*</span>
                                        <label for="sign_date" class="control-label" >تاریخ امضا پیشنهاد</label>
                                        <input type="text" name="sign_date" id="sign_date" class="form-control" value="<?php echo set_value('sign_date'); ?>">
                                        <?php echo form_error('sign_date'); ?>
                                    </div>

                                    <br>
                                    <ul class="list-inline pull-left">
                                        <li> <button type="button" class="btn btn-info next-step ">ادامه</button></li>
                                    </ul>


                                </div>


                            </div>
                        </div>

                        <div class="tab-pane" role="tabpanel" id="step2">
                            <div class="col-xs-4 col-xs-offset-4" >
                                <h3 class="text-center">مشخصات متقاضی</h3>
                                <div class="form-group necessary">
                                    <span>*</span>
                                    <label for="fname" class="control-label" >نام</label>
                                    <input type="text" name="fname" id="fname" class="form-control" value="<?php echo set_value('fname'); ?>">
                                    <?php echo form_error('fname'); ?>
                                </div>

                                <div class="form-group necessary">
                                    <span>*</span>
                                    <label for="lname" class="control-label" >نام خانوادگی</label>
                                    <input type="text" name="lname" id="lname" class="form-control" value="<?php echo set_value('lname'); ?>">
                                    <?php echo form_error('lname'); ?>
                                </div>

                                <div class="form-group necessary">
                                    <span>*</span>
                                    <label for="codemelli" class="control-label" >کدملی</label>
                                    <input type="text" maxlength="11" name="codemelli" id="codemelli" class="form-control" value="<?php echo set_value('codemelli'); ?>">
                                    <?php echo form_error('codemelli'); ?>
                                </div>

                                <div class="form-group necessary">
                                    <span>*</span>
                                    <label for="birth_date" class="control-label" >تاریخ تولد</label>
                                    <input type="text" name="birth_date" id="birth_date" class="form-control" value="<?php echo set_value('birth_date'); ?>">
                                    <?php echo form_error('birth_date'); ?>
                                </div>

                                <div class="form-group necessary">
                                    <span>*</span>
                                    <label for="sodoor_location" class="control-label" >محل صدور</label>
                                    <input type="text" name="sodoor_location" id="sodoor_location" class="form-control" value="<?php echo set_value('sodoor_location'); ?>">
                                    <?php echo form_error('sodoor_location'); ?>
                                </div>

                                <div class="form-group form-inline necessary">
                                    <span>*</span>
                                    <label class="control-label"  style="margin-left: 26px;">جنسیت</label>
                                    <div class="radio-inline">
                                        <label class="checkbox-inline"><input type="radio" name="gender" checked id="gender_male" value="مرد" "<?php echo set_radio('gender','مرد'); ?>">مرد</label>
                                    </div>
                                    <div class="radio-inline">
                                        <label class="checkbox-inline"><input type="radio" name="gender" id="gender_female" value="زن" "<?php echo set_radio('gender','زن'); ?>" >زن</label>
                                    </div>
                                </div>

                                <div class="form-group form-inline ">
                                    <label class="control-label" >  وضعیت تاهل</label>
                                    <div class="radio-inline">
                                        <label class="checkbox-inline"><input type="radio" name="married_status" checked id="married_status_single" value="مجرد" "<?php echo set_radio('married_status','مجرد'); ?>">مجرد</label>
                                    </div>
                                    <div class="radio-inline">
                                        <label class="checkbox-inline"><input type="radio" name="married_status" id="married_status_married" value="متاهل" "<?php echo set_radio('married_status','متاهل'); ?>">متاهل</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tahsilat" class="control-label" >سطح تحصیلات</label>
                                    <select name="tahsilat" id="tahsilat" class="form-control">
                                        <option value="زیر دیپلم" <?php echo set_select('tahsilat','زیر دیپلم'); ?>>زیر دیپلم</option>
                                        <option value="دیپلم" <?php echo set_select('tahsilat','دیپلم'); ?>>دیپلم</option>
                                        <option value="فوق دیپلم" <?php echo set_select('tahsilat','فوق دیپلم'); ?>>فوق دیپلم</option>
                                        <option value="لیسانس" <?php echo set_select('tahsilat','لیسانس'); ?>>لیسانس</option>
                                        <option value="فوق لیسانس" <?php echo set_select('tahsilat','فوق لیسانس'); ?>>فوق لیسانس</option>
                                        <option value="دکتری" <?php echo set_select('tahsilat','دکتری'); ?>>دکتری</option>
                                    </select>
                                    <!--input type="text" name="tahsilat" id="tahsilat" class="form-control" value="<?php echo set_value('tahsilat'); ?>"-->
                                </div>

                                <div class="form-group necessary">
                                    <span>*</span>
                                    <label for="nezam_vazife_status" class="control-label" >نظام وظیفه</label>
                                    <select name="nezam_vazife_status" id="nezam_vazife_status" class="form-control">
                                        <option value="پایان خدمت" "<?php echo set_select('nezam_vazife_status','پایان خدمت'); ?>">پایان خدمت</option>
                                        <option value="معاف کفالت" "<?php echo set_select('nezam_vazife_status','معاف کفالت'); ?>">معاف کفالت</option>
                                        <option value="معاف پزشکی" "<?php echo set_select('nezam_vazife_status','معاف پزشکی'); ?>">معاف پزشکی</option>
                                        <option value="معاف تحصیلی" "<?php echo set_select('nezam_vazife_status','معاف تحصیلی'); ?>">معاف تحصیلی</option>
                                        <option value="در حال خدمت" "<?php echo set_select('nezam_vazife_status','در حال خدمت'); ?>">در حال خدمت</option>
                                        <option value="مشمول مرور زمان" "<?php echo set_select('nezam_vazife_status','مشمول مرور زمان'); ?>">مشمول مرور زمان</option>
                                        <option value="نامشخص" "<?php echo set_select('nezam_vazife_status','نامشخص'); ?>">نامشخص</option>
                                        <option value="ندارد" "<?php echo set_select('nezam_vazife_status','ندارد'); ?>">ندارد</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label for="vazn" class="control-label" >وزن </label>
                                            <input type="text" maxlength="3" name="vazn" id="vazn" class="form-control" value="<?php echo set_value('vazn'); ?>">
                                        </div>
                                        <div class="col-xs-6">
                                            <label for="ghad" class="control-label" >قد (سانتی متر)</label>
                                            <input type="text" maxlength="3" name="ghad"  id="ghad" class="form-control" value="<?php echo set_value('ghad'); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group necessary">
                                    <span>*</span>
                                    <label for="job" class="control-label" >شغل اصلی</label>
                                    <input type="text" name="job" id="job" class="form-control" value="<?php echo set_value('job'); ?>">
                                    <?php echo form_error('job'); ?>
                                </div>

                                <div class="form-group necessary">
                                    <span>*</span>
                                    <label for="address" class="control-label" >نشانی</label>
                                    <textarea type="text" name="address" id="address" class="form-control" ><?php echo set_value('address'); ?></textarea>
                                    <?php echo form_error('address'); ?>
                                </div>

                                <div class="form-group necessary">
                                    <span>*</span>
                                    <label for="postcode" class="control-label" >کدپستی</label>
                                    <input type="text" maxlength="10" name="postcode" id="postcode" class="form-control" value="<?php echo set_value('postcode'); ?>">
                                    <?php echo form_error('postcode'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="tel" class="control-label" >تلفن ثابت (با ذکر کد شهرستان)</label>
                                    <input type="text" maxlength="11" name="tel" id="tel" class="form-control" value="<?php echo set_value('tel'); ?>">
                                    <?php echo form_error('tel'); ?>
                                </div>

                                <div class="form-group necessary">
                                    <span>*</span>
                                    <label for="mobile" class="control-label" >تلفن همراه 1</label>
                                    <input type="text" maxlength="11" name="mobile" id="mobile" class="form-control" value="<?php echo set_value('mobile'); ?>">
                                    <?php echo form_error('mobile'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="mobile2" class="control-label" >تلفن همراه 2 </label>
                                    <input type="text" maxlength="11" name="mobile2" id="mobile2" class="form-control" value="<?php echo set_value('mobile2'); ?>">
                                    <?php echo form_error('mobile2'); ?>
                                </div>

                                <div class="form-group" >
                                    <label for="email" class="control-label" >پست الکترونیکی </label>
                                    <input type="email" name="email" id="email" class="form-control" value="<?php echo set_value('email'); ?>">
                                    <?php echo form_error('email'); ?>
                                </div>


                                <div class="form-group">
                                    <label for="tozihat" class="control-label">توضیحات</label>
                                    <textarea name="tozihat" id="tozihat" class="form-control"><?php echo set_value('tozihat'); ?></textarea>
                                </div>

                                <ul class="list-inline pull-left">
                                    <li><button type="button" class="btn btn-default prev-step">قبلی</button></li>
                                    <li><a href="#" class="btn btn-info next-step">ادامه</a></li>
                                </ul>


                            </div>


                        </div>
                        <div class="tab-pane" role="tabpanel" id="step3">
                            <div class="col-xs-4 col-xs-offset-4" >
                                <h3 class="text-center">مشخصات بیمه شونده</h3>

                                <div class="form-group form-inline">
                                    <label  class="control-label">نسبت بیمه شونده با متقاضی</label>
                                    <div class="radio-inline">
                                        <label class="checkbox-inline"><input type="radio" name="nesbat" value="خودم">خودم</label>
                                    </div>
                                    <div class="radio-inline">
                                        <label class="checkbox-inline"><input type="radio" checked name="nesbat"  value="سایر">سایر</label>
                                    </div>
                                </div>
                                <div class="form-group necessary" id="nesbat_select_div">
                                    <span>*</span>
                                    <label for="nesbat_select" class="control-label" >نسبت با بیمه شونده</label>
                                    <select name="nesbat_select" id="nesbat_select" class="form-control">

                                        <option <?php echo set_select('nesbat_select','پدر'); ?>>پدر</option>
                                        <option <?php echo set_select('nesbat_select','مادر'); ?>>مادر</option>
                                        <option <?php echo set_select('nesbat_select','خواهر'); ?>>خواهر</option>
                                        <option <?php echo set_select('nesbat_select','برادر'); ?>>برادر</option>
                                        <option <?php echo set_select('nesbat_select','همسر'); ?>>همسر</option>
                                        <option <?php echo set_select('nesbat_select','فرزند'); ?>>فرزند</option>
                                        <option <?php echo set_select('nesbat_select','سایر'); ?>>سایر</option>
                                    </select>
                                </div>
                                <div class="form-group necessary">
                                    <span>*</span>
                                    <label for="b_fname" class="control-label" >نام</label>
                                    <input type="text" name="b_fname" id="b_fname" class="form-control" value="<?php echo set_value('b_fname'); ?>">
                                    <?php echo form_error('b_fname'); ?>
                                </div>

                                <div class="form-group necessary">
                                    <span>*</span>
                                    <label for="b_lname" class="control-label" >نام خانوادگی</label>
                                    <input type="text" name="b_lname" id="b_lname" class="form-control" value="<?php echo set_value('b_lname'); ?>">
                                    <?php echo form_error('b_lname'); ?>
                                </div>

                                <div class="form-group necessary">
                                    <span>*</span>
                                    <label for="b_codemelli" class="control-label" >کدملی</label>
                                    <input type="text" maxlength="11" name="b_codemelli" id="b_codemelli" class="form-control" value="<?php echo set_value('b_codemelli'); ?>">
                                    <?php echo form_error('b_codemelli'); ?>
                                </div>

                                <div class="form-group necessary">
                                    <span>*</span>
                                    <label for="b_birth_date" class="control-label" >تاریخ تولد</label>
                                    <input type="text" name="b_birth_date" id="b_birth_date" class="form-control"  value="<?php echo set_value('b_birth_date'); ?>">
                                    <?php echo form_error('b_birth_date'); ?>
                                </div>

                                <div class="form-group necessary">
                                    <span>*</span>
                                    <label for="b_sodoor_location" class="control-label" >محل صدور</label>
                                    <input type="text" name="b_sodoor_location" id="b_sodoor_location" class="form-control" value="<?php echo set_value('b_sodoor_location'); ?>">
                                    <?php echo form_error('b_sodoor_location'); ?>
                                </div>

                                <div class="form-group form-inline necessary">
                                    <span>*</span>
                                    <label class="control-label"  style="margin-left: 26px;" >جنسیت</label>
                                    <div class="radio-inline">
                                        <label class="checkbox-inline"><input type="radio" name="b_gender" checked id="b_gender_male" value="مرد" "<?php echo set_radio('b_gender','مرد'); ?>">مرد</label>
                                    </div>
                                    <div class="radio-inline">
                                        <label class="checkbox-inline"><input type="radio" name="b_gender"  id="b_gender_female" value="زن" "<?php echo set_radio('b_gender','زن'); ?>">زن</label>
                                    </div>
                                </div>

                                <div class="form-group form-inline">
                                    <label class="control-label" >  وضعیت تاهل</label>
                                    <div class="radio-inline">
                                        <label class="checkbox-inline"><input type="radio" name="b_married_status" checked id="b_married_status_single" value="مجرد" "<?php echo set_radio('b_married_status','مجرد'); ?>">مجرد</label>
                                    </div>
                                    <div class="radio-inline">
                                        <label class="checkbox-inline"><input type="radio" name="b_married_status" id="b_married_status_married" value="متاهل" "<?php echo set_radio('b_married_status','متاهل'); ?>">متاهل</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="b_tahsilat" class="control-label" >سطح تحصیلات</label>
                                    <select name="b_tahsilat" id="b_tahsilat" class="form-control">
                                        <option value="زیر دیپلم" <?php echo set_select('b_tahsilat','زیر دیپلم'); ?>>زیر دیپلم</option>
                                        <option value="دیپلم" <?php echo set_select('b_tahsilat','دیپلم'); ?>>دیپلم</option>
                                        <option value="فوق دیپلم" <?php echo set_select('b_tahsilat','فوق دیپلم'); ?>>فوق دیپلم</option>
                                        <option value="لیسانس" <?php echo set_select('b_tahsilat','لیسانس'); ?>>لیسانس</option>
                                        <option value="فوق لیسانس" <?php echo set_select('b_tahsilat','فوق لیسانس'); ?>>فوق لیسانس</option>
                                        <option value="دکتری" <?php echo set_select('b_tahsilat','دکتری'); ?>>دکتری</option>
                                    </select>
                                    <!--input type="text" name="b_tahsilat" id="b_tahsilat" class="form-control" value="<?php echo set_value('b_tahsilat'); ?>"-->
                                </div>

                                <div class="form-group necessary">
                                    <span>*</span>
                                    <label for="b_nezam_vazife_status" class="control-label" >نظام وظیفه</label>
                                    <select name="b_nezam_vazife_status" id="b_nezam_vazife_status" class="form-control">
                                        <option value="پایان خدمت" "<?php echo set_select('b_nezam_vazife_status','پایان خدمت'); ?>">پایان خدمت</option>
                                        <option value="معاف کفالت" "<?php echo set_select('b_nezam_vazife_status','معاف کفالت'); ?>">معاف کفالت</option>
                                        <option value="معاف پزشکی" "<?php echo set_select('b_nezam_vazife_status','معاف پزشکی'); ?>">معاف پزشکی</option>
                                        <option value="معاف تحصیلی" "<?php echo set_select('b_nezam_vazife_status','معاف تحصیلی'); ?>">معاف تحصیلی</option>
                                        <option value="در حال خدمت" "<?php echo set_select('b_nezam_vazife_status','در حال خدمت'); ?>">در حال خدمت</option>
                                        <option value="مشمول مرور زمان" "<?php echo set_select('b_nezam_vazife_status','مشمول مرور زمان'); ?>">مشمول مرور زمان</option>
                                        <option value="نامشخص" "<?php echo set_select('b_nezam_vazife_status','نامشخص'); ?>">نامشخص</option>
                                        <option value="ندارد" "<?php echo set_select('b_nezam_vazife_status','ندارد'); ?>">ندارد</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label for="b_vazn" class="control-label" >وزن </label>
                                            <input type="text" maxlength="3" name="b_vazn" id="b_vazn" class="form-control" value="<?php echo set_value('b_vazn'); ?>">
                                        </div>
                                        <div class="col-xs-6">
                                            <label for="b_ghad" class="control-label" >قد (سانتی متر)</label>
                                            <input type="text" maxlength="3" name="b_ghad"  id="b_ghad" class="form-control" value="<?php echo set_value('b_ghad'); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group necessary">
                                    <span>*</span>
                                    <label for="b_job" class="control-label" >شغل اصلی</label>
                                    <input type="text" name="b_job" id="b_job" class="form-control" value="<?php echo set_value('b_job'); ?>">
                                    <?php echo form_error('b_job'); ?>
                                </div>

                                <div class="form-group necessary">
                                    <span>*</span>
                                    <label for="b_address" class="control-label" >نشانی</label>
                                    <textarea type="text" name="b_address" id="b_address" class="form-control"><?php echo set_value('b_address'); ?></textarea>
                                    <?php echo form_error('b_address'); ?>
                                </div>

                                <div class="form-group necessary">
                                    <span>*</span>
                                    <label for="b_postcode" class="control-label" >کدپستی</label>
                                    <input type="text" maxlength="10" name="b_postcode" id="b_postcode" class="form-control" value="<?php echo set_value('b_postcode'); ?>">
                                    <?php echo form_error('b_postcode'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="b_tel" class="control-label" >تلفن ثابت (با ذکر کد شهرستان)</label>
                                    <input type="text" maxlength="11" name="b_tel" id="b_tel" class="form-control" value="<?php echo set_value('b_tel'); ?>">
                                    <?php echo form_error('b_tel'); ?>
                                </div>

                                <div class="form-group necessary">
                                    <span>*</span>
                                    <label for="b_mobile" class="control-label" >تلفن همراه 1</label>
                                    <input type="text" maxlength="11" name="b_mobile" id="b_mobile" class="form-control" value="<?php echo set_value('b_mobile'); ?>">
                                    <?php echo form_error('b_mobile'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="b_mobile2" class="control-label" >تلفن همراه 2 </label>
                                    <input type="text" maxlength="11" name="b_mobile2" id="b_mobile2" class="form-control" value="<?php echo set_value('b_mobile2'); ?>">
                                    <?php echo form_error('b_mobile2'); ?>
                                </div>

                                <div class="form-group" >
                                    <label for="b_email" class="control-label" >پست الکترونیکی </label>
                                    <input type="email" name="b_email" id="b_email" class="form-control" value="<?php echo set_value('b_email'); ?>">
                                    <?php echo form_error('b_email'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="b_tozihat" class="control-label">توضیحات</label>
                                    <textarea name="b_tozihat" id="b_tozihat" class="form-control"><?php echo set_value('b_tozihat'); ?></textarea>
                                </div>

                                <ul class="list-inline pull-left">
                                    <li><a class="btn btn-default prev-step" href="#">قبلی</a></li>
                                    <li><a  class="btn btn-info next-step" href="#">بعدی</a></li>
                                </ul>

                            </div>
                        </div>

                        <div class="tab-pane" role="tabpanel" id="step4">
                            <div class="col-xs-4 col-xs-offset-4" >
                                <h3 class="text-center">مشخصات بیمه نامه مورد درخواست</h3>
                                <div class="form-group necessary" >
                                    <span>*</span>
                                    <label for="modat_bime" class="control-label" >مدت بیمه (سال)</label>
                                    <input type="number" name="modat_bime" id="modat_bime" class="form-control" value="<?php echo set_value('modat_bime'); ?>">
                                    <?php echo form_error('modat_bime'); ?>
                                </div>

                                <div class="form-group necessary" >
                                    <span>*</span>
                                    <label for="seporde" class="control-label" >سپرده اولیه (ریال)</label>
                                    <input type="text" name="seporde" id="seporde" class="form-control number" value="<?php echo set_value('seporde'); ?>">
                                    <?php echo form_error('seporde'); ?>
                                </div>

                                <div class="form-group necessary" >
                                    <span>*</span>
                                    <label for="hagh_bime" class="control-label" >حق بیمه سال اول (ریال)</label>
                                    <input type="text" name="hagh_bime" id="hagh_bime" class="form-control number" value="<?php echo set_value('hagh_bime'); ?>">
                                    <?php echo form_error('hagh_bime'); ?>
                                </div>

                                <div class="form-group necessary" >
                                    <span>*</span>
                                    <label for="zarib_hagh_bime" class="control-label" >ضریب افزایش سالیانه حق بیمه (درصد)</label>
                                    <input type="number" name="zarib_hagh_bime" id="zarib_hagh_bime" class="form-control" value="<?php echo set_value('zarib_hagh_bime'); ?>">
                                    <?php echo form_error('zarib_hagh_bime'); ?>
                                </div>

                                <div class="form-group necessary" >
                                    <span>*</span>
                                    <label for="ravesh_pardakht" class="control-label" >روش پرداخت</label>
                                    <select name="ravesh_pardakht" id="ravesh_pardakht" class="form-control">
                                        <option "<?php echo set_select('ravesh_pardakht','ماهیانه'); ?>">ماهیانه</option>
                                        <option "<?php echo set_select('ravesh_pardakht','سه ماهه'); ?>">سه ماهه</option>
                                        <option "<?php echo set_select('ravesh_pardakht','شش ماهه'); ?>">شش ماهه</option>
                                        <option "<?php echo set_select('ravesh_pardakht','سالیانه'); ?>">سالیانه</option>
                                        <option "<?php echo set_select('ravesh_pardakht','یکجا'); ?>">یکجا</option>
                                    </select>
                                </div>

                                <div class="form-group necessary" >
                                    <span>*</span>
                                    <label for="sarmaie_fot" class="control-label" >سرمایه ی فوت سال اول (ریال)</label>
                                    <input type="text" name="sarmaie_fot" id="sarmaie_fot" class="form-control number" value="<?php echo set_value('sarmaie_fot'); ?>">
                                    <?php echo form_error('sarmaie_fot'); ?>
                                </div>

                                <div class="form-group necessary" >
                                    <span>*</span>
                                    <label for="zarib_sarmaie_fot" class="control-label" >ضریب افزایش سالیانه سرمایه فوت (درصد)</label>
                                    <input type="text" name="zarib_sarmaie_fot" id="zarib_sarmaie_fot" class="form-control" value="<?php echo set_value('zarib_sarmaie_fot'); ?>">
                                    <?php echo form_error('zarib_sarmaie_fot'); ?>
                                </div>

                                <div class="form-group">
                                    <label clas="control-label" for="kol">کل حق بیمه دریافتی</label>
                                    <input type="text" id="kol" class="form-control number" name="kol" disabled value="<?php echo set_value('kol'); ?>">

                                </div>

                                <div class="form-group necessary" >
                                    <span>*</span>
                                    <label for="vaziat_salamat_khanevade" class="control-label" >وضعیت سلامت خانواده</label>
                                    <select name="vaziat_salamat_khanevade" id="vaziat_salamat_khanevade" class="form-control">
                                        <option "<?php echo set_select('vaziat_salamat_khanevade','سالم'); ?>">سالم</option>
                                        <option "<?php echo set_select('vaziat_salamat_khanevade','نیاز به نظر کارشناس'); ?>">نیاز به نظر کارشناس</option>
                                        <option "<?php echo set_select('vaziat_salamat_khanevade','نامشخص'); ?>">نامشخص</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">توضیحات وضعیت سلامت خانواده</label>
                                    <textarea class="form-control" name="tozihat_vaziat_salamat_khanevade"><?php echo set_value('tozihat_vaziat_salamat_khanevade'); ?></textarea>
                                    <?php echo form_error('vaziat_salamat_khanevade'); ?>
                                </div>

                                <div class="form-group necessary" >
                                    <span>*</span>
                                    <label for="vaziat_salamat_bimeshode" class="control-label" >وضعیت سلامت بیمه شده</label>
                                    <select name="vaziat_salamat_bimeshode" id="vaziat_salamat_bimeshode" class="form-control">
                                        <option "<?php echo set_select('vaziat_salamat_bimeshode','سالم'); ?>">سالم</option>
                                        <option "<?php echo set_select('vaziat_salamat_bimeshode','نیاز به نظر کارشناس'); ?>">نیاز به نظر کارشناس</option>
                                        <option "<?php echo set_select('vaziat_salamat_bimeshode','نامشخص'); ?>">نامشخص</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">توضیحات وضعیت سلامت بیمه شده</label>
                                    <textarea class="form-control" name="tozihat_vaziat_salamat_bimeshode"><?php echo set_value('tozihat_vaziat_salamat_bimeshode'); ?></textarea>
                                    <?php echo form_error('vaziat_salamat_bimeshode'); ?>
                                </div>


                                <ul class="list-inline pull-left">
                                    <li><a class="btn btn-default prev-step" href="#">قبلی</a></li>
                                    <li><input type="submit"  class="btn btn-info next-step" value="ثبت"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>

<script src="<?php echo base_url(); ?>js/persianDatepicker.js"></script>
<script>
    $(function() {

        $("#birth_date").persianDatepicker();
        $("#b_birth_date").persianDatepicker();
        $("#sign_date").persianDatepicker();
    });
</script>
<script>

</script>
</body>
</html>