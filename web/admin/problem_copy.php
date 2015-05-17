<?php require_once ("admin-header.php");
if (!(isset($_SESSION['administrator']))){
	echo "<a href='../loginpage.php'>请先登录！</a>";
	exit(1);
}
?>
<ol style="margin: 20px 0 0 50px;">
<li>
从 http://plg1.cs.uwaterloo.ca/~acm00/ 复制题目
<form method=POST action=problem_add_page_waterloo.php>
  <input name=url type=text size=100>
  <input type=submit>
</form>
</li>
<li>
从 acm.pku.edu.cn 复制题目
<form method=POST action=problem_add_page_pku.php>
  <input name=url type=text size=100>
  <input type=submit>
</form>
</li>

<li>
从 acm.hdu.edu.cn 复制题目
<form method=POST action=problem_add_page_hdu.php>
  <input name=url type=text size=100>
  <input type=submit>
</form>
</li>

<li>
从 acm.zju.edu.cn 复制题目
<form method=POST action=problem_add_page_zju.php>
  <input name=url type=text size=100>
  <input type=submit>
</form>
</li>

</ol>
