<?php require_once("admin-header.php");
if (!(isset($_SESSION['administrator']))){
	echo "<a href='../loginpage.php'>请先登录！</a>";
	exit(1);
}
?>

<form action='problem_export_xml.php' method=post>
	<b>导出问题:</b><br />
	1、源问题编号:<input type=text size=10 name="start" value=1000>
	目标问题编号:<input type=text size=10 name="end" value=1000><br />
	或者<br>
    2、在问题<input type=text size=40 name="in" value="">中<br />
	<input type='hidden' name='do' value='do'>
	<input type=submit name=submit value='Export'>
   <input type=submit value='Download'>
   <?php require_once("../include/set_post_key.php");?>
</form>
* 1会清除2的数据 <br>
* 如果使用2,1不会工作<br>
* 2可以像这个输入多组数据 [1000,1020]
