<?php if(!empty($session['reporting_per'])): ?>

<style>
    #feedback { font-size: 1.4em; }
    .selectable .ui-selecting { background: #FECA40;  !important}
    .selectable .ui-selected { background: #F39814; color: white;  !important}
</style>

<div class="container">
    <div class="text-center">
        <h3>گزارش گیری براساس
        </h3>
    </div>
    <form>
        <div class="panel-group">
            <div class="panel panel-info">
                <div class="panel-heading" href="#cla1" data-toggle="collapse" >مشخصات فرم پیشنهاد
                    <span class="glyphicon glyphicon-plus pull-right collapse-nav"></span>
                </div>


                <div class="collapse panel-collapse" id="cla1">
                    <div class="row all-padding">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="indicator_num" class="control-label" >شماره اندیکاتور</label>
                                <input type="number" name="indicator_num" id="indicator_num" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="location_id" class="control-label" >موقعیت</label>
                                <select class="form-control" id="location_id" name="location_id">
                                    <option>sample</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="form_serial" class="control-label" >سریال فرم پیشنهاد</label>
                                <input type="number" name="form_serial" id="form_serial" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="payment_serial" class="control-label" >سریال رسید وجه</label>
                                <input type="number" name="payment_serial" id="payment_serial" class="form-control">
                            </div>
                        </div>
                    </div><!--end -row-->
                    <div class="row all-padding">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label  class="control-label" >تاریخ امضا پیشنهاد</label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input  name="from_emza" id="from_emza" class="form-control" placeholder="از ">
                                    </div>
                                    <div class="col-xs-6">
                                        <input  name="to_emza" id="to_emza" class="form-control" placeholder="تا ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end cla1-->
            </div><!--end panel-info-->

            <div class="panel panel-warning">
                <div class="panel-heading" href="#cla2" data-toggle="collapse">مشخصات متقاضی
                    <span class="glyphicon glyphicon-plus pull-right collapse-nav"></span>
                </div>
                <div class="collapse panel-collapse" id="cla2">
                    <div class="row all-padding">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="fname" class="control-label" >نام</label>
                                <input name="fname" id="fname" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="lname" class="control-label" >نام خانوادگی</label>
                                <input name="lname" id="lname" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="codemelli" class="control-label" >کدملی</label>
                                <input  name="codemelli" id="codemelli" class="form-control" maxlength="10">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label class="control-label" >تاریخ تولد</label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input name="birth_date" id="from_birth_date" class="form-control" placeholder="از">
                                    </div>
                                    <div class="col-xs-6">
                                        <input name="birth_date" id="to_birth_date" class="form-control" placeholder="تا">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end -row-->
                    <div class="row all-padding">
                        <div class="col-xs-3">
                            <div class="form-group ">
                                <label for="sodoor_location" class="control-label" >محل صدور</label>
                                <input  name="sodoor_location" id="sodoor_location" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="gender" class="control-label" >جنسیت</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option>انتخاب کنید</option>
                                    <option>مرد</option>
                                    <option>زن</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="married_status" class="control-label" >  وضعیت تاهل</label>
                                <select class="form-control" id="married_status" name="married_status">
                                    <option>انتخاب کنید</option>
                                    <option>مجرد</option>
                                    <option>متاهل</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="tahsilat" class="control-label" >  سطح تحصیلات</label>
                                <select class="form-control" id="tahsilat" name="tahsilat">
                                    <option>انتخاب کنید</option>
                                    <option>زیر دیپلم</option>
                                    <option>دیپلم</option>
                                </select>
                            </div>
                        </div>
                    </div><!--end -row-->
                    <div class="row all-padding">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="nezam_vazife_status" class="control-label" >نظام وظیفه</label>
                                <select name="nezam_vazife_status" id="nezam_vazife_status" class="form-control">
                                    <option>انتخاب کنید</option>
                                    <option value="1">معاف</option>
                                    <option value="2">در حال خدمت</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label  class="control-label" >وزن </label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input type="number" name="from-vazn" id="from-vazn" class="form-control" placeholder="از">
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="number" name="to-vazn"  id="to-vazn" class="form-control" placeholder="تا">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label  class="control-label" >قد (سانتی متر) </label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input type="number" name="from-ghad" id="from-ghad" class="form-control" placeholder="از">
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="number" name="to-ghad"  id="to-ghad" class="form-control" placeholder="تا">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="job" class="control-label" >شغل اصلی</label>
                                <input  name="job" id="job" class="form-control">
                            </div>
                        </div>
                    </div><!--end row-->
                    <div class="row all-padding">
                        <div class="col-xs-3">
                            <div class="form-group ">
                                <label for="address" class="control-label" >نشانی</label>
                                <input name="address" id="address" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="postcode" class="control-label" >کدپستی</label>
                                <input maxlength="10" name="postcode" id="postcode" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="tel" class="control-label" > تلفن ثابت (با ذکر کد شهرستان)</label>
                                <input maxlength="11" name="tel" id="tel" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="mobile" class="control-label" >تلفن همراه 1</label>
                                <input maxlength="11" name="mobile" id="mobile" class="form-control">
                            </div>
                        </div>
                    </div><!--end row-->
                    <div class="row all-padding ">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="mobile2" class="control-label" >تلفن همراه 2 </label>
                                <input maxlength="11" name="mobile2" id="mobile2" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group" >
                                <label for="email" class="control-label" >پست الکترونیکی </label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group" >
                                <label for="tozihat" class="control-label" >توضیحات </label>
                                <input  name="tozihat" id="tozihat" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-3"></div>
                    </div><!--end row-->
                </div><!--end cla2-->
            </div><!--end panel-warning-->


            <div class="panel panel-success">
                <div class="panel-heading" href="#cla3" data-toggle="collapse">مشخصات بیمه شونده
                    <span class="glyphicon glyphicon-plus pull-right collapse-nav"></span>
                </div>
                <div class="collapse panel-collapse" id="cla3">
                    <div class="row all-padding">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="b_fname" class="control-label" >نام</label>
                                <input name="b_fname" id="b_fname" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="b_lname" class="control-label" >نام خانوادگی</label>
                                <input name="b_lname" id="b_lname" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="b_codemelli" class="control-label" >کدملی</label>
                                <input  name="b_codemelli" id="b_codemelli" class="form-control" maxlength="10">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label class="control-label" >تاریخ تولد</label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input name="b_from_birth_date" id="b_from_birth_date" class="form-control" placeholder="از">
                                    </div>
                                    <div class="col-xs-6">
                                        <input name="b_to_birth_date" id="b_to_birth_date" class="form-control" placeholder="تا">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end -row-->
                    <div class="row all-padding">
                        <div class="col-xs-3">
                            <div class="form-group ">
                                <label for="b_sodoor_location" class="control-label" >محل صدور</label>
                                <input  name="b_sodoor_location" id="b_sodoor_location" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="b_gender" class="control-label" >جنسیت</label>
                                <select class="form-control" id="b_gender" name="b_gender">
                                    <option>انتخاب کنید</option>
                                    <option>مرد</option>
                                    <option>زن</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="b_married_status" class="control-label" >  وضعیت تاهل</label>
                                <select class="form-control" id="b_married_status" name="b_married_status">
                                    <option>انتخاب کنید</option>
                                    <option>مجرد</option>
                                    <option>متاهل</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="b_tahsilat" class="control-label" >  سطح تحصیلات</label>
                                <select class="form-control" id="b_tahsilat" name="b_tahsilat">
                                    <option>انتخاب کنید</option>
                                    <option>زیر دیپلم</option>
                                    <option>دیپلم</option>
                                </select>
                            </div>
                        </div>
                    </div><!--end -row-->
                    <div class="row all-padding">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="b_nezam_vazife_status" class="control-label" >نظام وظیفه</label>
                                <select name="b_nezam_vazife_status" id="b_nezam_vazife_status" class="form-control">
                                    <option>انتخاب کنید</option>
                                    <option value="1">معاف</option>
                                    <option value="2">در حال خدمت</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label  class="control-label" >وزن </label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input type="number" name="b_from_vazn" id="b_from_vazn" class="form-control" placeholder="از">
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="number" name="b_to_vazn"  id="b_to_vazn" class="form-control" placeholder="تا">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label  class="control-label" >قد (سانتی متر) </label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input type="number" name="b_from_ghad" id="b_from_ghad" class="form-control" placeholder="از">
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="number" name="b_to_ghad"  id="b_to_ghad" class="form-control" placeholder="تا">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="b_job" class="control-label" >شغل اصلی</label>
                                <input  name="b_job" id="b_job" class="form-control">
                            </div>
                        </div>
                    </div><!--end row-->
                    <div class="row all-padding">
                        <div class="col-xs-3">
                            <div class="form-group ">
                                <label for="b_address" class="control-label" >نشانی</label>
                                <input name="b_address" id="b_address" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="b_postcode" class="control-label" >کدپستی</label>
                                <input maxlength="10" name="b_postcode" id="b_postcode" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="b_tel" class="control-label" > تلفن ثابت (با ذکر کد شهرستان)</label>
                                <input maxlength="11" name="b_tel" id="b_tel" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="b_mobile" class="control-label" >تلفن همراه 1</label>
                                <input maxlength="11" name="b_mobile" id="b_mobile" class="form-control">
                            </div>
                        </div>
                    </div><!--end row-->
                    <div class="row all-padding ">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="b_mobile2" class="control-label" >تلفن همراه 2 </label>
                                <input maxlength="11" name="b_mobile2" id="b_mobile2" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group" >
                                <label for="b_email" class="control-label" >پست الکترونیکی </label>
                                <input type="email" name="b_email" id="b_email" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group" >
                                <label for="b_tozihat" class="control-label" >توضیحات </label>
                                <input  name="b_tozihat" id="b_tozihat" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="b_nesbat" class="control-label" >نسبت بیمه شونده با متقاضی</label>
                                <select name="b_nesbat" id="b_nesbat" class="form-control">
                                    <option>انتخاب کنید</option>
                                    <option>پدر</option>
                                    <option>مادر</option>
                                </select>
                            </div>
                        </div>
                    </div><!--end row-->
                </div><!--end cla3-->
            </div><!--end panel-success-->
            <div class="panel panel-danger" >
                <div class="panel-heading" href="#cla4" data-toggle="collapse">مشخصات بیمه نامه مورد درخواست
                    <span class="glyphicon glyphicon-plus pull-right collapse-nav"></span>
                </div>
                <div class="collapse panel-collapse" id="cla4">
                    <div class="row all-padding">
                        <div class="col-xs-4">
                            <div class="form-group" >
                                <label  class="control-label" >مدت بیمه (سال)</label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input type="number" name="from_modat_bime" id="from_modat_bime" class="form-control" placeholder="از">
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="number" name="to_modat_bime" id="to_modat_bime" class="form-control" placeholder="تا">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group" >
                                <label  class="control-label" >سپرده اولیه (ریال)</label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input name="from_seporde" id="from_seporde" class="form-control number" placeholder="از">
                                    </div>
                                    <div class="col-xs-6">
                                        <input name="to_seporde" id="to_seporde" class="form-control number" placeholder="تا">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group" >
                                <label class="control-label" >حق بیمه سال اول (ریال)</label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input  name="from_hagh_bime" id="from_hagh_bime" class="form-control number" placeholder="از">
                                    </div>
                                    <div class="col-xs-6">
                                        <input  name="to_hagh_bime" id="to_hagh_bime" class="form-control number" placeholder="تا">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                    <div class="row all-padding">
                        <div class="col-xs-4">
                            <div class="form-group" >
                                <label class="control-label" >ضریب افزایش سالیانه حق بیمه (درصد)</label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input type="number" name="from_zarib_hagh_bime" id="from_zarib_hagh_bime" class="form-control" placeholder="از">
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="number" name="to_zarib_hagh_bime" id="to_zarib_hagh_bime" class="form-control" placeholder="تا">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group" >
                                <label for="ravesh_pardakht" class="control-label" >روش پرداخت</label>
                                <select name="ravesh_pardakht" id="ravesh_pardakht" class="form-control">
                                    <option>انتخاب کنید</option>
                                    <option>ماهیانه</option>
                                    <option>سه ماهه</option>
                                    <option>شش ماهه</option>
                                    <option>سالیانه</option>
                                    <option>یکجا</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group" >
                                <label class="control-label" >سرمایه ی فوت سال اول (ریال)</label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input name="from_sarmaie_fot" id="from_sarmaie_fot" class="form-control number" placeholder="از">
                                    </div>
                                    <div class="col-xs-6">
                                        <input name="to_sarmaie_fot" id="to_sarmaie_fot" class="form-control number" placeholder="تا">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                    <div class="row all-padding">
                        <div class="col-xs-4">
                            <div class="form-group" >
                                <label class="control-label" >ضریب افزایش سالیانه سرمایه فوت (درصد)</label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input name="from_zarib_sarmaie_fot" id="from_zarib_sarmaie_fot" class="form-control" placeholder="از">
                                    </div>
                                    <div class="col-xs-6">
                                        <input  name="to_zarib_sarmaie_fot" id="to_zarib_sarmaie_fot" class="form-control" placeholder="تا">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group" >
                                <label class="control-label" >کل حق بیمه دریافتی</label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input name="from_kol_hagh_bime" id="from_kol_hagh_bime" class="form-control" placeholder="از">
                                    </div>
                                    <div class="col-xs-6">
                                        <input  name="to_kol_hagh_bime" id="to_kol_hagh_bime" class="form-control" placeholder="تا">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group" >
                                <label for="vaziat_salamat_khanevade" class="control-label" >وضعیت سلامت خانواده</label>
                                <select name="vaziat_salamat_khanevade" id="vaziat_salamat_khanevade" class="form-control">
                                    <option>انتخاب کنید</option>
                                    <option>سالم</option>
                                    <option>نیاز به نظر کارشناس</option>
                                    <option>نیاز به نظر کارشناس و پزشک</option>
                                    <option>چک آپ لازم است</option>
                                    <option>نامشخص</option>
                                </select>
                            </div>
                        </div>
                    </div><!--end row-->
                    <div class="row all-padding">
                        <div class="col-xs-4">
                            <div class="form-group" >
                                <label for="tozihat_vaziat_salamat_khanevade" class="control-label" >توضیحات وضعیت سلامت خانواده</label>
                                <input  name="tozihat_vaziat_salamat_khanevade" id="tozihat_vaziat_salamat_khanevade" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group" >
                                <label for="vaziat_salamat_bimeshode" class="control-label" >وضعیت سلامت بیمه شده</label>
                                <select name="vaziat_salamat_bimeshode" id="vaziat_salamat_bimeshode" class="form-control">
                                    <option>سالم</option>
                                    <option>نیاز به نظر کارشناس</option>
                                    <option>نیاز به نظر کارشناس و پزشک</option>
                                    <option>اطلاعات ناقص است</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group" >
                                <label for="tozihat_vaziat_salamat_bimeshode" class="control-label" >توضیحات وضعیت سلامت بیمه شده</label>
                                <input  name="tozihat_vaziat_salamat_bimeshode" id="tozihat_vaziat_salamat_bimeshode" class="form-control">
                            </div>
                        </div>
                    </div><!--end row-->
                </div><!--end cla4-->
            </div><!--end panel-danger-->
            <div class="panel panel-default">
                <div class="panel-heading" href="#cla5" data-toggle="collapse">انتخاب ستون ها
                    <span class="glyphicon glyphicon-plus pull-right collapse-nav"></span>
                </div>
                <div class="collapse panel-collapse" id="cla5">
                    <div class="row all-padding">
                        <div style="height: 400px; overflow: auto;">
                            <div class="col-xs-3">
                                <div style="height: 400px; overflow: auto;">
                                    <ol id="selectable1" class="selectable list-group">
                                        <li class="ui-widget-content list-group-item" value="indicator_num">شماره اندیکاتور</li>
                                        <li class="ui-widget-content list-group-item" value="location_id">موقعیت</li>
                                        <li class="ui-widget-content list-group-item" value="form_serial" >سریال فرم پیشنهاد</li>
                                        <li class="ui-widget-content list-group-item" value="payment_serial">سریال رسید وجه</li>
                                        <li class="ui-widget-content list-group-item" value="emza">تاریخ امضا پیشنهاد</li>
                                        <li class="ui-widget-content list-group-item" value="fname">نام متقاضی</li>
                                        <li class="ui-widget-content list-group-item" value="lname">نام خانوادگی متقاضی</li>
                                        <li class="ui-widget-content list-group-item" value="codemelli">کدملی متقاضی</li>
                                        <li class="ui-widget-content list-group-item" value="birth_date">تاریخ تولد متقاضی</li>
                                        <li class="ui-widget-content list-group-item" value="sodoor_location">محل صدور متقاضی</li>
                                        <li class="ui-widget-content list-group-item" value="gender">جنسیت متقاضی</li>
                                        <li class="ui-widget-content list-group-item" value="married_status">وضعیت تاهل متقاضی</li>
                                        <li class="ui-widget-content list-group-item" value="tahsilat">سطح تحصیلات متقاضی</li>
                                        <li class="ui-widget-content list-group-item" value="nezam_vazife_status">نظام وظیفه متقاضی</li>
                                        <li class="ui-widget-content list-group-item" value="vazn">وزن متقاضی</li>
                                        <li class="ui-widget-content list-group-item" value="ghad">قد متقاضی</li>
                                        <li class="ui-widget-content list-group-item" value="job">شغل اصلی متقاضی</li>
                                        <li class="ui-widget-content list-group-item" value="address">نشانی متقاضی</li>
                                        <li class="ui-widget-content list-group-item"  value="postcode">کدپستی متقاضی</li>
                                        <li class="ui-widget-content list-group-item" value="tel">تلفن ثابت متقاضی</li>
                                        <li class="ui-widget-content list-group-item" value="mobile">تلفن همراه 1 متقاضی</li>
                                        <li class="ui-widget-content list-group-item" value="mobile2">تلفن همراه  2 متقاضی</li>
                                        <li class="ui-widget-content list-group-item" value="email">پست الکترونیک متقاضی</li>
                                        <li class="ui-widget-content list-group-item"  value="tozihat">توضیحات متقاضی</li>
                                        <li class="ui-widget-content list-group-item" value="b_nesbat">نسبت بیمه شونده با متقاضی</li>
                                        <li class="ui-widget-content list-group-item" value="b_fname">نام بیمه شونده</li>
                                        <li class="ui-widget-content list-group-item" value="b_lname">نام خانوادگی بیمه شونده</li>
                                        <li class="ui-widget-content list-group-item" value="b_codemelli">کدملی بیمه شونده</li>
                                        <li class="ui-widget-content list-group-item" value="b_birth_date">تاریخ تولد بیمه شونده</li>
                                        <li class="ui-widget-content list-group-item" value="b_sodoor_location">محل صدور بیمه شونده</li>
                                        <li class="ui-widget-content list-group-item" value="b_gender">جنسیت بیمه شونده</li>
                                        <li class="ui-widget-content list-group-item" value="b_married_status">وضعیت تاهل بیمه شونده</li>
                                        <li class="ui-widget-content list-group-item" value="b_tahsilat">سطح تحصیلات بیمه شونده</li>
                                        <li class="ui-widget-content list-group-item" value="b_nezam_vazife_status">نظام وظیفه بیمه شونده</li>
                                        <li class="ui-widget-content list-group-item" value="b_vazn">وزن بیمه شونده</li>
                                        <li class="ui-widget-content list-group-item" value="b_ghad">قد بیمه شونده</li>
                                        <li class="ui-widget-content list-group-item" value="b_job">شغل اصلی بیمه شونده</li>
                                        <li class="ui-widget-content list-group-item" value="b_address">نشانی بیمه شونده</li>
                                        <li class="ui-widget-content list-group-item" value="b_postcode">کدپستی بیمه شونده</li>
                                        <li class="ui-widget-content list-group-item" value="b_tel">تلفن ثابت بیمه شونده</li>
                                        <li class="ui-widget-content list-group-item" value="b_mobile">تلفن همراه 1 بیمه شونده</li>
                                        <li class="ui-widget-content list-group-item" value="b_mobile2">تلفن همراه  2 بیمه شونده</li>
                                        <li class="ui-widget-content list-group-item" value="b_email">پست الکترونیک بیمه شونده</li>
                                        <li class="ui-widget-content list-group-item" value="b_tozihat">توضیحات بیمه شونده</li>
                                        <li class="ui-widget-content list-group-item" value="modat_bime">مدت بیمه</li>
                                        <li class="ui-widget-content list-group-item" value="seporde">سپرده اولیه</li>
                                        <li class="ui-widget-content list-group-item" value="hagh_bime" >حق بیمه سال اول</li>
                                        <li class="ui-widget-content list-group-item" value="zarib_hagh_bime">ضریب افزایش سالیانه حق بیمه</li>
                                        <li class="ui-widget-content list-group-item" value="ravesh_pardakht">روش پرداخت</li>
                                        <li class="ui-widget-content list-group-item" value="sarmaie_fot">سرمایه ی فوت سال اول</li>
                                        <li class="ui-widget-content list-group-item" value="zarib_sarmaie_fot">ضریب افزایش سالیانه سرمایه ی فوت</li>
                                        <li class="ui-widget-content list-group-item" value="kol_hagh_bime">کل حق بیمه دریافتی</li>
                                        <li class="ui-widget-content list-group-item" value="vaziat_salamat_khanevade">وضعیت سلامت خانواده</li>
                                        <li class="ui-widget-content list-group-item" value="tozihat_vaziat_salamat_khanevade">توضیحات وضعیت سلامت خانواده</li>
                                        <li class="ui-widget-content list-group-item" value="vaziat_salamat_bimeshode">وضعیت سلامت بیمه شده</li>
                                        <li class="ui-widget-content list-group-item" value="tozihat_vaziat_salamat_bimeshode">توضیحات وضعیت سلامت بیمه شده</li>
                                    </ol>
                                </div>

                            </div>
                            <div class="col-xs-1 text-center" >
                                <a id="btn-left" class="btn btn-default btn-lg" style="margin: 5px;">
                                    <span class="fa fa-angle-left"></span>
                                </a>
                                <br>
                                <a id="btn-right" class="btn btn-default btn-lg" style="margin: 5px;">
                                    <span class="fa  fa-angle-right"></span>
                                </a>
                                <br>
                                <a id="btn-double-left" class="btn btn-default btn-lg" style="margin: 5px;">
                                    <span class="fa  fa-angle-double-left"></span>
                                </a>
                                <br>
                                <a id="btn-double-right" class="btn btn-default btn-lg" style="margin: 5px;">
                                    <span class="fa  fa-angle-double-right"></span>
                                </a>
                            </div>
                            <div class="col-xs-3">
                                <div style="height: 400px; overflow: auto;">
                                    <ol id="selectable2" class="selectable list-group ">
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end row -->
                </div><!--end cla5-->
            </div><!--end panel-default-->
        </div>   <!--end panel-group-->
        <div class="pull-right" style="margin-bottom:50px; ">
            <a href="#"><img src="<?php echo base_url(); ?>images/pdf.png" alt="pdf" ></a>
            <a href="#"><img src="<?php echo base_url(); ?>images/Printer.png" alt="print"></a>
            <a href="#"><img src="<?php echo base_url(); ?>images/excel.png" alt="excel"></a>
        </div>
    </form>
</div>

<script src="<?php echo base_url(); ?>js/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>js/reporting.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui.css">
<script src="<?php echo base_url(); ?>js/persianDatepicker.js"></script>
<script>
    $(function() {
        $("#from_emza").persianDatepicker();
        $("#to_emza").persianDatepicker();
        $("#from_birth_date").persianDatepicker();
        $("#to_birth_date").persianDatepicker();
        $("#b_from_birth_date").persianDatepicker();
        $("#b_to_birth_date").persianDatepicker();
        $(".number").number( true);
    });
</script>
<?php endif; ?>
</body>
</html>