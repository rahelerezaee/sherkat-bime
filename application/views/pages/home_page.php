<!--- Home Page-->
<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3 toppad" >

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">مشخصات کاربری</h3>
                </div>
                <div class="panel-body">
                    <div class="row">

                        <div style="padding: 20px;">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>نام و نام خانوادگی:</td>
                                    <td><?php echo $session['user_full_name']; ?></td>
                                </tr>
                                <tr>
                                    <td>سمت:</td>
                                    <td><?php echo $session['role']; ?></td>
                                </tr>
                                <tr>
                                    <td>تاریخ شروع قرارداد:</td>
                                    <td><?php echo $session['contract_start']; ?></td>
                                </tr>
                                <tr>
                                    <td>تاریخ پایان قرارداد:</td>
                                    <td><?php echo $session['contract_end']; ?></td>
                                </tr>

                                <tr>


                                </tbody>
                            </table>


                        </div>

                    </div>
                </div>
                <div class="panel-footer">

                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>