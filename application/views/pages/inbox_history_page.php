<!-- inbox_page -->
<div class="container-fluid">
    <h3 class="text-center">فرمهای پیشنهادی دریافت شده</h3>
    <br>
    <br>

    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <h5> تعداد فرم ها
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

                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($more_data[0] as $row): ?>
                        <tr class="<?php echo (!empty($session['open_kartable_per']))?'clickable-row':'' ;?>  <?php echo ($row['color']==0)? 'bg-danger':(($row['color']==1)?'bg-warning':'') ?>" <?php echo (!empty($session['open_kartable_per']))?'data-href='.base_url().'history_kartable/just_show_form_page/'.$row['indicator_num']:''; ?>>
                            <th><input type="checkbox" value="<?php echo $row['indicator_num']; ?>" name="forms_value[]"></th>
                            <td><?php echo $row['register_date']; ?></td>
                            <td><?php echo $row['indicator_num']; ?></td>
                            <td><?php echo $row['f_name'].' '.$row['l_name']; ?></td>
                            <td><?php echo $row['f_name2'].' '.$row['l_name2']; ?></td>
                            <td><?php echo $row['payment_serial']; ?></td>

                            <td><?php echo'تاریخ: '. $row['dead_line'] .' زمان: '.$row['dead_time']; ?></td>

                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <br>


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