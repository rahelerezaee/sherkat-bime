<!-- eghdamat page -->
<div class="container-fluid">
    <h2 class="text-center">ثبت وظیفه</h2>
    <br>
    <br>

    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">


            <form method="post" action="<?php echo base_url(); ?>retrieve_page/insert_new_duty/<?php echo $more_data['indicator_num']; ?>">
                <fieldset>
                    <legend>
                        <span>ثبت وظیفه برای فرم با شماره اندیکاتور:
                          <span name="serial_number" class="badge text-success"><?php echo $more_data['indicator_num']; ?></span>
                        </span>
                    </legend>
                    <?php if(!empty($session['add_duty_kartable_per'])): ?>
                        <div class="row">
                            <div class="col-xs-11">
                                <div class="form-group right_padding">
                                    <label for="eghdam">شرح وظیفه</label>
                                    <textarea name="eghdam" id="eghdam" class="form-control" rows="4"><?php echo set_value('eghdam'); ?></textarea>
                                    <?php echo form_error('eghdam'); ?>
                                    <br>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-3">
                                <label for="erja">برای نقش</label>
                                <select name="erja" id="erja" class="form-control" >
                                    <option disabled="disabled" selected>انتخاب نقش</option>
                                    <?php foreach ($more_data['roles'] as $role): ?>
                                        <option value="<?php echo $role['role2']?>"><?php echo $role['role_name']?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('erja'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label for="user_erja">کاربر</label>
                                <select name="user_erja" id="user_erja" class="form-control">
                                    <option disabled selected>انتخاب کاربر</option>

                                </select>
                            </div>

                        </div>
                        <br />
                        <div class="row">
                            <div class="col-xs-3">
                                <button type="submit" class="btn btn-default ">افزودن به لیست وظایف
                                    <span class="fa fa-plus-circle">
                                    </span>
                                </button>
                            </div>
                        </div>


                    <?php endif; ?>

                </fieldset>

            </form>
            <br>
            <span>وظایف ثبت شده</span>
            <div style="height: 400px; overflow: auto;">
                <table class="table table-bordered table-hover">
                    <thead style="color:white; background-color: #2aabd2;">
                    <tr>
                        <th>ردیف</th>
                        <th> وظیفه تعین شده</th>
                        <th style="padding-right:30px;padding-left: 30px; "> توسط</th>
                        <th style="padding-right:30px;padding-left: 30px; "> برای</th>
                        <?php if(!empty($session['del_duty_kartable_per'])): ?>
                            <th></th>
                        <?php endif; ?>
                    </tr>
                    </thead>

                    <tbody>

                    <!--?php print_r($more_data['loggedin_user']); ?-->
                    <?php foreach ($more_data['duty_data'] as $index => $row): ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td><?php echo $row['duty_description'] ?></td>
                            <td><?php echo $row['sender_full_name'] ?></td>
                            <td><?php echo $row['reciever_full_name'] ?></td>

                            <?php if(!empty($session['del_duty_kartable_per'])): ?>
                                <td>
                                    <?php if ($row['sender_id'] == $more_data['loggedin_user']['user_id']): ?>
                                        <a class="btn btn-default show_delete_modal" data-id ="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#delete_modal">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
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

</div>
<!-- delete Modal start here ---->
<!-- Modal -->
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

<!-- delete modal end here -->

<script>

    $(document).ready(function(){

        var base = '<?php echo base_url(); ?>';
        $('.show_delete_modal').click(function(){
            var key_value = $(this).attr('data-id');
            var form_serial = <?php echo $more_data['indicator_num']; ?>;
            $("#delete_button").attr("href",base+"retrieve_page/delete_duty/"+form_serial+"/"+key_value);
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
                            /*alert(item.f_name);*/
                            $("select#user_erja").html(result);

                        });

                    }
                },
                error: function(){alert('اشکال در ارتباط با سرور');}
            });
        });

    });
</script>

</body>
</html>