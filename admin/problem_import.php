<?php function writable($path){
	$ret=false;
	$fp=fopen($path."/testifwritable.tst","w");
	$ret=!($fp===false);
	fclose($fp);
	unlink($path."/testifwritable.tst");
	return $ret;
}
require_once("admin-header.php");
if (!(isset($_SESSION['administrator']))){
	echo "<a href='../loginpage.php'>Please Login First!</a>";
	exit(1);
}
   $maxfile=min(ini_get("upload_max_filesize"),ini_get("post_max_size"));

?>
导入FPS数据 ,请保证文件小于[<?php echo $maxfile?>] <br/>
或者在PHP.ini设置upload_max_filesize和post_max_size<br/>
如果你导入10M以上文件失败,请尝试在PHP.ini设置更大的memory_limit<br>
<?php 
    $show_form=true;
   if(!isset($OJ_SAE)||!$OJ_SAE){
	   if(!writable($OJ_DATA)){
		   echo " You need to add  $OJ_DATA into your open_basedir setting of php.ini,<br>
					or you need to execute:<br>
					   <b>chmod 775 -R $OJ_DATA && chgrp -R www-data $OJ_DATA</b><br>
					you can't use import function at this time.<br>"; 
			$show_form=false;
	   }
	   mkdir("../upload");
	   if(!writable("../upload")){
	   	 
		   echo "../upload is not writable, <b>chmod 770</b> to it.<br>";
		   $show_form=false;
	   }
	}	
	if($show_form){
?>
<br>
<form action='problem_import_xml.php' method=post enctype="multipart/form-data">
	<b>导入问题:</b><br />
	
	<input type=file name=fps >
	<?php require_once("../include/set_post_key.php");?>
    <input type=submit value='导入'>
</form>
<?php 
  
   	}
   
?>
<br>

免费的FPS xml格式的问题集下载地址：<a href=http://code.google.com/p/freeproblemset/downloads/list>FPS-Googlecode</a>
