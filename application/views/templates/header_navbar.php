
<body dir="rtl" style="padding-bottom: 100px;">
<nav class="navbar navbar-default ">
    <div>
        <ul class="nav navbar-nav navbar-left">
            <li>
                <a href="" data-toggle="dropdown" class="dropdown-toggle">سلام <?php echo $session['user_full_name']; ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>retrieve_page/show_home_page">مشاهده وضعیت</a></li>

                    <li><a href="<?php echo base_url(); ?>retrieve_page/logout">خروج</a></li>
                </ul>
            </li>
            <?php if(!empty($session['bime_per'])): ?>
                <li class="<?php echo ($page_name == 'form_page' || $page_name == 'mali_page' || $page_name == 'mali_detail_page')?'active' : '' ?>">
                    <a href="" data-toggle="dropdown" class="dropdown-toggle">پیشنهاد بیمه <span class="caret"></span> </a>
                    <ul class="dropdown-menu">
                        <?php if(!empty($session['new_form_per'])): ?>
                            <li><a href="<?php echo base_url(); ?>form_page">ثبت فرم پیشنهاد جدید</a> </li>
                        <?php endif; ?>
                        <?php if(!empty($session['mali_per'])): ?>
                            <li><a href="<?php echo base_url(); ?>financial_page">ثبت امور مالی</a> </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif;?>
            <?php if(!empty($session['kartable_per0'])): ?>
                <li class="<?php echo ($page_name=='inbox_page'|| $page_name == 'form_representation_page' ||$page_name == 'form_preview' || $page_name=='duty_page'||$page_name=='inbox_history_page' ||$page_name == 'eghdamat_page')?'active':''; ?>">
                    <a href="" data-toggle="dropdown" class="dropdown-toggle">کارتابل<span class="caret"></span> </a>
                    <ul class="dropdown-menu">
                        <?php if(!empty($session['kartable_per'])): ?>
                            <li><a href="<?php echo base_url()?>retrieve_page/show_inbox_page">کارتابل جاری</a></li>
                        <?php endif; ?>
                        <?php if(!empty($session['history_kartable_per'])): ?>
                            <li><a href="<?php echo base_url(); ?>history_kartable/"> کارتابل سابق</a></li>
                        <?php endif; ?>
                    </ul>
                </li>

            <?php endif;?>
            <?php if(!empty($session['position_per'])): ?>
                <li class="<?php echo ($page_name=='locations_page')?'active':''; ?>"><a href="<?php echo base_url()?>location_page">افزودن موقعیت</a> </li>
            <?php endif;?>




            <?php if(!empty($session['reporting_per'])): ?>
                <li class="<?php echo ($page_name=='report_page')?'active':''; ?>"><a href="<?php echo base_url(); ?>report_page"> گزارش گیری</a></li>
            <?php endif;?>
            <?php if(!empty($session['manager_per'])): ?>
                <li class="<?php echo ($page_name=='register_page' ||$page_name=='role_definition_page'||$page_name=='registered_role_display'||$page_name=='update_role_permissions'||$page_name=='registerd_user_page'||$page_name=='update_registered_user' ||$page_name=='role_page')?'active':''; ?>">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">مدیریت <span class="caret"></span> </a>

                    <ul class="dropdown-menu">
                        <?php if(!empty($session['role_manager_per'])): ?>
                            <li><a href="<?php echo base_url(); ?>role_page">ایجاد نقش</a></li>
                        <?php endif;?>
                        <?php if(!empty($session['user_manager_per'])): ?>
                            <li><a href="<?php echo base_url(); ?>register_page">ثبت کاربر جدید</a> </li>
                        <?php endif;?>
                        <?php if(!empty($session['role_relation_manager_per'])): ?>
                            <li ><a href="<?php echo base_url()?>role_relations">ارتباط نقش ها</a> </li>
                        <?php endif;?>




                    </ul>
                </li>
            <?php endif; ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="javascript: history.go(-1)"><span class="fa fa-arrow-left"></span></a>
            </li>
        </ul>

    </div>
</nav>

