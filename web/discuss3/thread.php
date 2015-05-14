<?php
	require_once("oj-header.php");
	echo "<title>HUST Online Judge WebBoard</title>";
	$sql="SELECT `title`, `cid`, `pid`, `status`, `top_level` FROM `topic` WHERE `tid` = '".mysql_escape_string($_REQUEST['tid'])."' AND `status` <= 1";
	$result=mysql_query($sql) or die("Error! ".mysql_error());
	$rows_cnt = mysql_num_rows($result) or die("Error! ".mysql_error());
	$row= mysql_fetch_object($result);
	$isadmin = isset($_SESSION['administrator']);
?>

<center>
<div style="width:90%; margin:0 auto; text-align:left;"> 
<div style="text-align:left;font-size:80%;float:left;">[ <a href="newpost.php">发新帖</a> ]</div>
<?php if ($isadmin){
	?><div style="font-size:80%; float:right"> 修改状态为
    <?php
    $adminurl = "threadadmin.php?target=thread&tid={$_REQUEST['tid']}&action=";
	if ($row->top_level == 0)
        echo "[ <a href=\"{$adminurl}sticky&level=3\">最高等级</a> ] [ <a href=\"{$adminurl}sticky&level=2\">中间等级</a> ] [ <a href=\"{$adminurl}sticky&level=1\">最低等级</a> ]";
    else
        echo "[ <a href=\"{$adminurl}sticky&level=0\">标准</a> ]";
	?> |
    <?php
        if ($row->status != 1)
            echo (" [ <a  href=\"{$adminurl}lock\">锁帖</a> ]");
        else
            echo(" [ <a href=\"{$adminurl}resume\">解锁</a> ]");
	?>
    |
    <?php echo (" [ <a href=\"{$adminurl}删除\">删除</a> ]");
	?></div><?php }
?>
<table style="width:100%; clear:both">
<tr align=center class='toprow'>
	<td style="text-align:left">
	<a href="discuss.php<?php if ($row->pid!=0 && $row->cid!=null) echo "?pid=".$row->pid."&cid=".$row->cid;
	else if ($row->pid!=0) echo"?pid=".$row->pid; else if ($row->cid!=null) echo"?cid=".$row->cid;?>">
	<?php if ($row->pid!=0) echo "问题 ".$row->pid; else echo "MainBoard";?></a> >> <?php echo nl2br(htmlspecialchars($row->title));?></td>
</tr>

<?php
	$sql="SELECT `rid`, `author_id`, `time`, `content`, `status` FROM `reply` WHERE `topic_id` = '".mysql_escape_string($_REQUEST['tid'])."' AND `status` <=1 ORDER BY `rid` LIMIT 30";
	$result=mysql_query($sql) or die("Error! ".mysql_error());
	$rows_cnt = mysql_num_rows($result);
	$cnt=0;

	for ($i=0;$i<$rows_cnt;$i++){
		mysql_data_seek($result,$i);
		$row=mysql_fetch_object($result);
		$url = "threadadmin.php?target=reply&rid={$row->rid}&tid={$_REQUEST['tid']}&action=";
		if(isset($_SESSION['user_id'])) $isuser = strtolower($row->author_id)==strtolower($_SESSION['user_id']);
		else $isuser=false;
?>
<tr align=center class='<?php echo ($cnt=!$cnt)?'even':'odd';?>row'>
	<td>
		
		<a name=post<?php echo $row->rid;?>></a>
     <div style="display:inline;text-align:left; float:left; margin:0 10px"><a href="../userinfo.php?user=<?php echo $row->author_id?>"><?php echo $row->author_id; ?> </a> @ <?php echo $row->time; ?></div>
		<div class="mon" style="display:inline;text-align:right; float:right">
			<?php if (isset($_SESSION['administrator'])) {?>  
			<span>[ <a href="
				<?php if ($row->status==0) echo $url."disable\">不可用";
				else echo $url."resume\">Resume";
				?> </a> ]</span>
			<span>[ <a href="#">回复</a> ]</span>
			<?php } ?>
			<span>[ <a href="#">引用</a> ]</span>
			<span>[ <a href="#">编辑</a> ]</span>
			<span>[ <a 
			<?php if ($isuser || $isadmin) echo "href=".$url."delete";
			?>
			>Delete</a> ]</span>
			<span style="width:5em;text-align:right;display:inline-block;font-weight:bold;margin:0 10px">
			<?php echo $i+1;?>#</span>
		</div>
		<div class=content style="text-align:left; clear:both; margin:10px 30px">
			<?php	if ($row->status == 0) echo nl2br(htmlspecialchars($row->content));
					else {
						if (!$isuser || $isadmin)echo "<div style=\"border-left:10px solid gray\"><font color=red><i>提示 : <br>该条回复已被管理员屏蔽。</i></font></div>";
						if ($isuser || $isadmin) echo nl2br(htmlspecialchars($row->content));
					}
			?>
		</div>
		<div style="text-align:left; clear:both; margin:10px 30px; font-weight:bold; color:red"></div>
	</td>
</tr>
<?php
	}
?>
</table>
<div style="font-size:90%; width:100%; text-align:center">[<a href="#">顶部</a>]  [<a href="#">前一页</a>]  [<a href="#">下一页</a>] </div>
<?php if (isset($_SESSION['user_id'])){?>
<div style="font-size:80%;"><div style="margin:0 10px">新回复:</div></div>
<form action="post.php?action=reply" method=post>
<input type=hidden name=tid value=<?php echo $_REQUEST['tid'];?>>
<div><textarea name=content style="border:1px dashed #8080FF; width:700px; height:200px; font-size:75%;margin:0 10px; padding:10px"></textarea></div>
<div><input type="submit" style="margin:5px 10px" value="回复"></input></div>
</form>
<?php }
?>

</center>
</div>

<?php require_once("../template/$OJ_TEMPLATE/discuss.php")?>
