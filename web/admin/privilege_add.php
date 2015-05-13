<?php require_once("admin-header.php");?>
<?php if (!(isset($_SESSION['administrator']))){
	echo "<a href='../loginpage.php'>请先登录！</a>";
	exit(1);
}
if(isset($_POST['do'])){
	require_once("../include/check_post_key.php");
	$user_id=mysql_real_escape_string($_POST['user_id']);
	$rightstr =$_POST['rightstr'];
	$sql="insert into `privilege` values('$user_id','$rightstr','N')";
	mysql_query($sql);
	if (mysql_affected_rows()==1) echo "$user_id $rightstr added!";
	else echo "No such user!";
}
?>
<form method=post>
<?php require("../include/set_post_key.php");?>
	<b>设置用户权限:</b><br />
	用户名:<input type=text size=10 name="user_id"><br />
	权限:
	<select name="rightstr">
<?php
$rightarray=array("administrator","problem_editor","source_browser","contest_creator","http_judge","password_setter" );
while(list($key, $val)=each($rightarray)) {
	if (isset($rightstr) && ($rightstr == $val)) {
		echo '<option value="'.$val.'" selected>'.$val.'</option>';
	} else {
		echo '<option value="'.$val.'">'.$val.'</option>';
	}
}
?></select><br />
	<input type='hidden' name='do' value='do'>
	<input type=submit value='设置'>
</form>
<form method=post>
	<b>增加用户到竞赛&作业:</b><br />
	用户名:<input type=text size=10 name="user_id"><br />
    竞赛&作业编号:<input type=text size=10 name="rightstr">c1000 表示竞赛&作业1000<br />
	<input type='hidden' name='do' value='do'>
	<input type=submit value='Add'>
	<input type=hidden name="postkey" value="<?php echo $_SESSION['postkey']?>">
</form>
