<?php require_once("admin-header.php");

	if(isset($OJ_LANG)){
		require_once("../lang/$OJ_LANG.php");
	}
	

?>
<html>
<head>
<title><?php echo $MSG_ADMIN?></title>
</head>

<body>
<style>
    li {
        margin-bottom: 3px;
    }
</style>
<hr>
<h4>
<ol>
	<li>
		<a class='btn btn-default' href="watch.php" target="main"><b><?php echo $MSG_SEEOJ?></b></a>
<?php if (isset($_SESSION['administrator'])){
	?>
	<li>
		<a class='btn btn-default' href="news_add_page.php" target="main"><b><?php echo $MSG_ADD.$MSG_NEWS?></b></a>
	<li>
		<a class='btn btn-default' href="news_list.php" target="main"><b><?php echo $MSG_NEWS.$MSG_LIST?></b></a>
		
<?php }
if (isset($_SESSION['administrator'])||isset($_SESSION['problem_editor'])){
?>
	<li>
		<a class='btn btn-default' href="problem_add_page.php" target="main"><b><?php echo $MSG_ADD.$MSG_PROBLEM?></b></a>
<?php }
if (isset($_SESSION['administrator'])||isset($_SESSION['contest_creator'])||isset($_SESSION['problem_editor'])){
?>
	<li>
		<a class='btn btn-default' href="problem_list.php" target="main"><b><?php echo $MSG_PROBLEM.$MSG_LIST?></b></a>
<?php }
if (isset($_SESSION['administrator'])||isset($_SESSION['contest_creator'])){
?>		
<li>
	<a class='btn btn-default' href="contest_add.php" target="main"><b><?php echo $MSG_ADD.$MSG_CONTEST?></b></a>
<?php }
if (isset($_SESSION['administrator'])||isset($_SESSION['contest_creator'])){
?>
<li>
	<a class='btn btn-default' href="contest_list.php" target="main"><b><?php echo $MSG_CONTEST.$MSG_LIST?></b></a>
<?php }
if (isset($_SESSION['administrator'])){
?>
<li>
	<a class='btn btn-default' href="team_generate.php" target="main"><b><?php echo $MSG_TEAMGENERATOR?></b></a>
<li>
	<a class='btn btn-default' href="setmsg.php" target="main"><b><?php echo $MSG_SETMESSAGE?></b></a>
<?php }
if (isset($_SESSION['administrator'])||isset( $_SESSION['password_setter'] )){
?><li>
	<a class='btn btn-default' href="changepass.php" target="main"><b><?php echo $MSG_SETPASSWORD?></b></a>
<?php }
if (isset($_SESSION['administrator'])){
?><li>
	<a class='btn btn-default' href="rejudge.php" target="main"><b><?php echo $MSG_REJUDGE?></b></a>
<?php }
if (isset($_SESSION['administrator'])){
?><li>
	<a class='btn btn-default' href="privilege_add.php" target="main"><b><?php echo $MSG_ADD.$MSG_PRIVILEGE?></b></a>
<?php }
if (isset($_SESSION['administrator'])){
?><li>
	<a class='btn btn-default' href="privilege_list.php" target="main"><b><?php echo $MSG_PRIVILEGE.$MSG_LIST?></b></a>
<?php }
if (isset($_SESSION['administrator'])){
?><li>
	<a class='btn btn-default' href="source_give.php" target="main"><b><?php echo $MSG_GIVESOURCE?></b></a>
<?php }
if (isset($_SESSION['administrator'])){
?><li>
	<a class='btn btn-default' href="problem_export.php" target="main"><b><?php echo $MSG_EXPORT.$MSG_PROBLEM?></b></a>
<?php }
if (isset($_SESSION['administrator'])){
?><li>
	<a class='btn btn-default' href="problem_import.php" target="main"><b><?php echo $MSG_IMPORT.$MSG_PROBLEM?></b></a>
<?php }
if (isset($_SESSION['administrator'])){
?><li>
	<a class='btn btn-default' href="update_db.php" target="main"><b><?php echo $MSG_UPDATE_DATABASE?></b></a>
<?php }
if (isset($OJ_ONLINE)&&$OJ_ONLINE){
?><li>
	<a class='btn btn-default' href="../online.php" target="main"><b><?php echo $MSG_ONLINE?></b></a>
<?php }
?>

<li>
	<a class='btn btn-default' href="http://code.google.com/p/hustoj/" target="_blank"><b>HUSTOJ</b></a>
<li>
	<a class='btn btn-default' href="http://code.google.com/p/freeproblemset/" target="_blank"><b>FreeProblemSet</b></a>
<li>
	<a class='btn btn-default' href="http://acmclub.com" target="_blank"><b>ACM俱乐部免费开通校级OJ服务器</b></a>
    <?php if (isset($_SESSION['administrator'])&&!$OJ_SAE){
        ?>
        <a class='btn btn-default' href="problem_copy.php" target="main" title="Create your own data"><font color="eeeeee">复制问题</font></a> <br>
        <a class='btn btn-default' href="problem_changeid.php" target="main" title="Danger,Use it on your own risk"><font color="eeeeee">修改问题ID</font></a>

    <?php }
    ?>
</ol>

<h4>
</body>
</html>
