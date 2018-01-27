<!-- inbox_page -->
<div class="container-fluid">
    <h3 class="text-center">فرمهای پیشنهادی دریافت شده</h3>
    <br>
    <br>
    <?php if($more_data['num_of_un_sent_form']!=0): ?>

        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    فرم های غیرقابل ارسال به دلیل عدم انجام وظایف خود بر روی آنها برابر است با
                    <span class="badge"><?php echo $more_data['num_of_un_sent_form']; ?></span>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <h5> تعداد فرمهای پیشنهادی دریافت شده
                <span class="badge"><?php echo count($more_data[0])?></span></h5>
            <form class="form-inline">
                <div class="form-group" >
                    <label for="category">جستجو براساس</label>
                    <select name="category" id="category" class="form-control" >
                        <option value="0">تاریخ ثبت</option>
                        <option value="1">شماره اندیکاتور</option>
                        <option value="2">نام و نام خانوادگی متقاضی</option>
                        <option value="3">نام و نام خانوادگی بیمه شونده</option>
                        <option value="4">شماره رسید وجه</option>
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
            <br>
            <form class="form-inline" method="post" action="<?php echo base_url() ?>retrieve_page/send_forms">
                <div style="height: 400px; overflow: auto;">
                    <table id="data_table" class="table table-bordered table-hover">
                        <thead style="color:white; background-color: #2aabd2;" >
                        <tr>
                            <th></th>
                            <th>تاریخ ثبت</th>
                            <th>شماره اندیکاتور</th>
                            <th>نام و نام خانوادگی متقاضی</th>
                            <th>نام و نام خانوادگی بیمه شونده</th>
                            <th>شماره رسید وجه</th>
                            <th>مهلت فرم</th>
                            <?php if(!empty($session['del_kartable_per'])): ?>
                                <th></th>
                            <?php endif;?>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($more_data[0] as $row): ?>
                            <tr class="<?php echo (!empty($session['open_kartable_per']))?'clickable-row':'' ;?>  <?php echo ($row['color']==0)? 'bg-danger':(($row['color']==1)?'bg-warning':'') ?>" <?php echo (!empty($session['open_kartable_per']))?'data-href='.base_url().'retrieve_page/show_form_representation_page/'.$row['indicator_num']:''; ?>>
                                <th><input type="checkbox" value="<?php echo $row['indicator_num']; ?>" name="forms_value[]"></th>
                                <td><?php echo ($row['seen']==1)?'<strong>':''; ?><?php echo $row['register_date']; ?><?php echo ($row['seen']==1)?'</strong>':''; ?></td>
                                <td><?php echo ($row['seen']==1)?'<strong>':''; ?><?php echo $row['indicator_num']; ?><?php echo ($row['seen']==1)?'</strong>':''; ?></td>
                                <td><?php echo ($row['seen']==1)?'<strong>':''; ?><?php echo $row['f_name'].' '.$row['l_name']; ?><?php echo ($row['seen']==1)?'</strong>':''; ?></td>
                                <td><?php echo ($row['seen']==1)?'<strong>':''; ?><?php echo $row['f_name2'].' '.$row['l_name2']; ?><?php echo ($row['seen']==1)?'</strong>':''; ?></td>
                                <td><?php echo ($row['seen']==1)?'<strong>':''; ?><?php echo $row['payment_serial']; ?><?php echo ($row['seen']==1)?'</strong>':''; ?></td>

                                <td><?php echo ($row['seen']==1)?'<strong>':''; ?><?php echo'تاریخ: '. $row['dead_line'] .' زمان: '.$row['dead_time']; ?><?php echo ($row['seen']==1)?'</strong>':''; ?></td>
                                <?php if(!empty($session['del_kartable_per'])): ?>
                                    <th><a data-toggle="modal" data-target="#delete_modal" data-id="<?php echo $row['indicator_num']?>" class="btn btn-default show_delete_modal"><span class="glyphicon glyphicon-trash"></span></a> </th>
                                <?php endif; ?>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
                <br>
                <?php if(!empty($session['erja_kartable_per'])): ?>
                    <?php echo form_error('forms_value[]'); ?>
                    <div style="margin: 0px 0px 50px 0px" class="form-group"  >
                        <label for="erja">ارجاع به</label>
                        <select name="erja" id="erja" class="form-control" >
                            <option disabled="disabled" selected>انتخاب نقش</option>
                            <?php foreach ($more_data[1] as $role): ?>
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
                            <button type="submit" name="send" id="send" class="form-control btn btn-default " >ارسال
                                &nbsp;<span class="glyphicon glyphicon-send"></span>
                            </button>
                        </div>
                    </div>

                <?php endif; ?>
                </form>
        </div>
    </div>

</div>

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

<script>

    $(document).ready(function(){

        var base = '<?php echo base_url(); ?>';
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
                            /*alert(item.f_name);*/
                            $("select#user_erja").html(result);

                        });

                    }
                },
                error: function(){alert('اشکال در ارتباط با سرور');}
            });
        });

    });

    var base = '<?php echo base_url(); ?>';
    $('.show_delete_modal').click(function(){
        var key_value = $(this).attr('data-id');

        $('#delete_button').attr('href',base+ 'form_page/delete_form/'+key_value+'/1');

    });


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
<script src="<?php echo base_url(); ?>js/persianDatepicker.js"></script>
<script>
    jQuery(document).ready(function($) {
        $("#mohlat_erja").persianDatepicker();

        $(".clickable-row td").click(function() {
            var p=$(this).parent();
            window.location = $(p).data("href");
        });
    });
</script>
</body>
</html>