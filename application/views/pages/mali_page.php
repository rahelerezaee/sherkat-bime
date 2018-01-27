
<div class="container-fluid">
    <h3 class="text-center">فرمهای پیشنهادی ثبت شده</h3>
    <br>
    <br>
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <?php if($more_data[1]==1): ?>
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            تغییرات با موفقیت انجام شد
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <h5> تعداد فرمهای پیشنهادی ثبت شده <span class="badge"><?php echo count($more_data[0]); ?></span></h5>
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
                <div class="form-group input-group">
                    <input type="search" name="query" id="query" class="form-control" placeholder="عبارت جستجو" onkeyup="search_function()">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <br>
            <div style="height: 400px; overflow: auto;">
                <table id="data_table" class="table table-bordered table-hover">
                    <thead style="color:white; background-color: #2aabd2;" >
                    <tr>

                        <th>تاریخ ثبت</th>
                        <th>شماره اندیکاتور</th>
                        <th>نام و نام خانوادگی متقاضی</th>
                        <th>نام و نام خانوادگی بیمه شونده</th>
                        <th>شماره رسید وجه</th>
                        <?php if(!empty($session['del_mali_per'])&&!empty($session['edit_mali_per'])): ?>
                            <th></th>
                        <?php endif; ?>

                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($more_data[0] as $row): ?>

                        <tr class="<?php echo (!empty($session['open_mali_per'])?'clickable-row':'')?>"  <?php echo (!empty($session['open_mali_per'])?'data-href='.base_url().'financial_page/show_mali_detail_page/'.$row['indicator_num']:'')?>>

                            <td><?php echo $row['register_date']; ?></td>
                            <td><?php echo $row['indicator_num']; ?></td>
                            <td><?php echo $row['f_name'] . ' ' . $row['l_name']; ?></td>
                            <td><?php echo $row['f_name2'] . ' ' . $row['l_name2']; ?></td>
                            <td><?php echo $row['payment_serial']; ?></td>
                            <?php if(!empty($session['del_mali_per'])&&!empty($session['edit_mali_per'])): ?>
                                <th>
                                    <?php if(!empty($session['del_mali_per'])): ?>
                                        <a data-toggle="modal" data-target="#delete_modal" data-id="<?php echo $row['indicator_num']?>" class="btn btn-default show_delete_modal">
                                            <span class="glyphicon glyphicon-trash">
                                            </span>
                                        </a>
                                    <?php endif; ?>
                                    <?php if(!empty($session['edit_mali_per'])): ?>
                                        <a href="<?php echo base_url(); ?>form_page/show_update_form_page/<?php echo $row['indicator_num']?>/1" class="btn btn-default">
                                            <span class="fa fa-pencil-square-o">
                                            </span>
                                        </a>
                                    <?php endif; ?>
                                </th>
                            <?php endif; ?>


                        </tr>

                    <?php endforeach; ?>


                    </tbody>
                </table>
            </div>
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
</div>

<script>

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


    var base = '<?php echo base_url(); ?>';
    $('.show_delete_modal').click(function(){
        var key_value = $(this).attr('data-id');

        $('#delete_button').attr('href',base+ 'form_page/delete_form/'+key_value);

    });


    jQuery(document).ready(function($) {
        $(".clickable-row td").click(function() {
            var p=$(this).parent();
            window.location = $(p).data("href");
        });
    });
</script>
</body>
</html>