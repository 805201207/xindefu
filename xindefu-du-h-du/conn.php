<?php
header("Content-type:text/html;Charset=utf8");//设定字符集
$conn=mysqli_connect("localhost","root","","xingdefu");
mysqli_set_charset($conn,'utf8');//设定字符集
//选择所要操作的数据库
mysql_select_db($db);
//设置数据库编码格式
mysql_query('SET NAMES UTF8');
?>
