$(function() {
    $(".panel-heading").on("click",function (evt) {
        var a = $(this).children();
        if($(this).attr("aria-expanded")!="true")
        {
            a.removeClass( "glyphicon-plus");
            a.addClass( "glyphicon-minus");
        }
        else
        {
            a.removeClass( "glyphicon-minus");
            a.addClass( "glyphicon-plus");
        }

    });

//            selectable
    $("#selectable1").selectable();
    $("#selectable2").selectable();
    $("#btn-left").click(function () {
        var a=$("#selectable1 .ui-selected");
        $("#selectable2").append(a.clone());
        a.hide();
    });
    $("#btn-right").click(function () {
        var all=$("#selectable2 .ui-selected");
        $.each(all,function (key, value) {
            var one = $(value).attr("value");
            $("#selectable1 [value="+one+"]").show();
        })
        all.remove();

    });
    $("#btn-double-left").click(function () {
        var a=$("#selectable1 li");
        $("#selectable2").append(a.clone());
        a.hide();
    });
    $("#btn-double-right").click(function () {
        var a=$("#selectable2 li");
        a.remove();
        $("#selectable1 li").show();
    });
})
