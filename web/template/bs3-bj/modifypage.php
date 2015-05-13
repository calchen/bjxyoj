<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $OJ_NAME ?></title>
    <?php include("template/$OJ_TEMPLATE/css.php"); ?>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    <?php include("template/$OJ_TEMPLATE/nav.php"); ?>
    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
        <form action="modify.php" method="post">
            <br><br>
            <center>
                <table style="border-collapse: separate;border-spacing: 10px;">
                    <tr>
                        <td colspan=2 height=40 width=500 style="font-size: 150%;font-weight: bold;">修改信息
                    </tr>
                    <tr>
                        <td width=25%>用户名:
                        <td width=75%><?php echo $_SESSION['user_id'] ?>
                            <?php require_once('./include/set_post_key.php'); ?>
                    </tr>
                    <tr>
                        <td>昵称:
                        <td><input name="nick" size=50 type=text value="<?php echo htmlspecialchars($row->nick) ?>">
                    </tr>
                    <tr>
                        <td>旧密码:
                        <td><input name="opassword" size=20 type=password>
                    </tr>
                    <tr>
                        <td>新密码:
                        <td><input name="npassword" size=20 type=password>
                    </tr>
                    <tr>
                        <td>重复新密码:
                        <td><input name="rptpassword" size=20 type=password>
                    </tr>
                    <tr>
                        <td>学校:
                        <td><input name="school" size=30 type=text value="<?php echo htmlspecialchars($row->school) ?>">
                    </tr>
                    <tr>
                        <td>Email:
                        <td><input name="email" size=30 type=text value="<?php echo htmlspecialchars($row->email) ?>">
                    </tr>
                    <tr>
                        <td>
                        <td>
                            <button name="submit" type="submit" class="btn btn-default btn-block"
                                    style="margin-bottom: 10px;">修改
                            </button>
                            <button name="reset" type="reset" class="btn btn-default btn-block">重置</button>
                    </tr>
                </table>
            </center>
            <br>
            <!--            <a href=export_ac_code.php>Download All AC Source</a>-->
            <br>
    </div>

</div>
<!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?php include("template/$OJ_TEMPLATE/js.php"); ?>
<script>
    $("input").attr("class", "form-control");
</script>
</body>
</html>
