$(document).ready(function ($) {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();

    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);

        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
    $(".number").number( true);

    $("[name=gender]").on("change",function () {
        if($(this).val()=="زن")
            $("#nezam_vazife_status").prop('selectedIndex', 7);

        else
            $("#nezam_vazife_status").prop('selectedIndex', 0);
    });

    $("[name=b_gender]").on("change",function () {
        if($(this).val()=="زن")
            $("#b_nezam_vazife_status").prop('selectedIndex', 7);

        else
            $("#b_nezam_vazife_status").prop('selectedIndex', 0);
    });
    $("#hagh_bime").blur(function () {
        var b=0;
        if($("#ravesh_pardakht").val()=="ماهیانه")
            b=12;
        else if($("#ravesh_pardakht").val()=="سه ماهه")
            b=4;
        else if($("#ravesh_pardakht").val()=="شش ماهه")
            b=2;
        else
            b=1;
        var hagh = $("#hagh_bime").val();
        hagh = hagh.replace(',','');
        $("#kol").val(b*hagh);
    });
    $("#ravesh_pardakht").on("change",function () {
        var b=0;
        if($("#ravesh_pardakht").val()=="ماهیانه")
            b=12;
        else if($("#ravesh_pardakht").val()=="سه ماهه")
            b=4;
        else if($("#ravesh_pardakht").val()=="شش ماهه")
            b=2;
        else
            b=1;
        var hagh = $("#hagh_bime").val();
        hagh = hagh.replace(',','');
        $("#kol").val(b*hagh);
    });
    //nesbat
    $("[name=nesbat]").on("change",function () {
        if($(this).val()=="خودم")
        {
            $("#nesbat_select_div").fadeOut(function () {
                $("#nesbat_select>option").attr("value","خودم");
            });

            $("#b_fname").val($("#fname").val());
            $("#b_lname").val($("#lname").val());
            $("#b_codemelli").val($("#codemelli").val());
            $("#b_birth_date").val($("#birth_date").val());
            $("#b_sodoor_location").val($("#sodoor_location").val());
            $("#b_tahsilat").val($("#tahsilat").val());
            $("#b_vazn").val($("#vazn").val());
            $("#b_ghad").val($("#ghad").val());
            $("#b_job").val($("#job").val());
            $("#b_address").val($("#address").val());
            $("#b_postcode").val($("#postcode").val());
            $("#b_tel").val($("#tel").val());
            $("#b_mobile").val($("#mobile").val());
            $("#b_mobile2").val($("#mobile2").val());
            $("#b_email").val($("#email").val());
            $("#b_nezam_vazife_status").val($("#nezam_vazife_status").val());
            $('#b_tozihat').val($("#tozihat").val());
            if(  $('#gender_male').is(':checked'))
            {
                $('#b_gender_female').prop("checked",false);
                $('#b_gender_male').prop("checked",true);
            }
            else {
                $('#b_gender_male').prop("checked",false);
                $('#b_gender_female').prop("checked",true);
            }
            if(  $("#married_status_single").is(':checked'))
            {
                $('#b_married_status_married').prop("checked",false);
                $('#b_married_status_single').prop("checked",true);
            }
            else {
                $('#b_married_status_single').prop("checked",false);
                $('#b_married_status_married').prop("checked",true);

            }
        }
        else {
            $("#nesbat_select_div").fadeIn(function () {
                $("#nesbat_select>option").attr("value","1").removeAttr("value")}).css("display","block");
            $("#b_fname").val("");
            $("#b_lname").val("");
            $("#b_codemelli").val("");
            $("#b_birth_date").val("");
            $("#b_sodoor_location").val("");
            $("#b_tahsilat").val("");
            $("#b_vazn").val("");
            $("#b_ghad").val("");
            $("#b_job").val("");
            $("#b_address").val("");
            $("#b_postcode").val("");
            $("#b_tel").val("");
            $("#b_mobile").val("");
            $("#b_mobile2").val("");
            $("#b_email").val("");

        }

    })
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}

