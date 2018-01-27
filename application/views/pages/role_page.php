<?php if(!empty($session['role_relation_manager_per'])): ?>
<div class="container-fluid">
    <h2 class="text-center">ارتباط نقشها</h2>
    <br>
    <br>

    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">

            <form method="post" action="<?php echo base_url(); ?>role_relations/insert_new_role" >
                <fieldset>
                    <legend>
                        <span>ایجاد ارتباط بین نقشها
                        </span>
                    </legend>
                    <?php if(!empty($session['add_role_relation_manager_per'])): ?>
                        <div class="col-xs-4">
                            <div class="form-group right_padding" >
                                <label for="user1">نقش 1</label>
                                <select name="user1" id="user1" class="form-control" onchange="remove_function1()">
                                    <?php foreach ($more_data['roles'] as $role): ?>
                                        <option <?php echo set_select('user1',$role['id']);  ?> value="<?php echo $role['id'] ?>"><?php echo $role['role_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('user1'); ?>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group right_padding" >
                                <label for="user2">نقش 2</label>
                                <select name="user2" id="user2" class="form-control" >

                                    <?php foreach ($more_data['roles'] as $role): ?>
                                        <option <?php echo set_select('user1',$role['role_name']);  ?> value="<?php echo $role['role_name'] ?>"><?php echo $role['role_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-default" style="margin-top: 25px;">ایجاد ارتباط</button>
                        </div>
                    <?php endif ?>

                </fieldset>

            </form>
            <br>
            <span>ارتباطات</span>
            <div style="height: 400px; overflow: auto;">
                <table class="table table-bordered table-hover">
                    <thead style="color:white; background-color: #2aabd2;" >
                    <tr>
                        <th >ردیف</th>
                        <th> نقش 1</th>
                        <th>  نقش 2</th>
                        <?php if(!empty($session['del_role_relation_manager_per'])): ?>
                            <th></th>
                        <?php endif; ?>
                    </tr>
                    </thead>

                    <tbody>

                    <?php foreach ($more_data['roles_duty'] as $index => $row): ?>

                        <tr>

                            <td><?php echo $index+1; ?></td>
                            <td><?php echo $row['role1']; ?></td>
                            <td><?php echo $row['role2']; ?></td>
                        <?php if(!empty($session['del_role_relation_manager_per'])): ?>
                            <td><a href="<?php echo base_url()?>role_relations/delete_roles_duty/<?php echo $row['id']; ?>" class="btn btn-default"><span class="glyphicon glyphicon-trash "></span></a></td>
                        <?php endif;?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
    window.onload = function() {


        var dropdown2 = document.getElementById("user2");
        document.getElementById('user2').innerHTML = "";

        <?php foreach ($more_data['roles'] as $role): ?>
            var option = document.createElement("option");
            option.value = "<?php echo $role['id']; ?>";
            option.text = "<?php echo $role['role_name']; ?>";
            dropdown2.add(option);
        <?php endforeach;?>

        var dropdown1_selected = document.getElementById("user1").value;
        var select = document.getElementById('user2');

        for (i = 0; i < select.length; i++) {
            if (select.options[i].value == dropdown1_selected) {
                select.remove(i);
            }
        }
    }

    function remove_function1() {


        var dropdown2 = document.getElementById("user2");
        document.getElementById('user2').innerHTML = "";

        <?php foreach ($more_data['roles'] as $role): ?>
        var option = document.createElement("option");
        option.value = "<?php echo $role['id']; ?>";
        option.text = "<?php echo $role['role_name']; ?>";
        dropdown2.add(option);
        <?php endforeach;?>

        var dropdown1_selected = document.getElementById("user1").value;
        var select = document.getElementById('user2');

        for (i = 0; i < select.length; i++) {
            if (select.options[i].value == dropdown1_selected) {
                select.remove(i);
            }
        }
    }


</script>
<?php endif?>
</body>
</html>