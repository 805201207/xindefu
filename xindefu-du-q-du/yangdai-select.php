<html>
<head>
    <meta http-equiv="CONTENT-TYPE" content="text/html;">
</head>
<title>分页</title>
<style>

    div.page{
        text-align: center;
        margin-top: 400px;
    }
    div.page a{
        border: #aa0027 solid 1px;
        text-decoration: none;
        padding: 2px 5px 2px 5px;
        margin: 2px;
    }
    div.page span.current{
        background-color: #992b6c;
		padding: 4px 6px 4px 6px;
		margin: 2px;
		color: #fff;
        font-weight: bold;
    }
    div.page form{
        display: inline;
    }
    div.content{
        height: 200px;
    }
</style>
<body>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
?>
<?php
/** 1.传入页面 **/
$page= isset($_GET['p']) ? trim($_GET['p']) : 1;
/** 2.根据页面取出数据：php->mysql **/
$host = "localhost";
$username = 'root';
$password = '';
$db = 'xingdefu';
$PageSize=2;
$ShowPage=3;
//连接数据库
$conn = mysql_connect($host, $username, $password);
if(!$conn){
    echo "数据库连接失败";
    exit;
}

//选择所要操作的数据库
mysql_select_db($db);
//设置数据库编码格式
mysql_query('SET NAMES UTF8');
//编写sql获取分页数据：SELECT * FROM 表名 LIMIT 起始位置 , 显示条数
$sql = "SELECT * FROM yangdai LIMIT ".($page-1)*$PageSize .",$PageSize";
if(!$sql){
    echo "取出不成功";
};
//把sql语句传送到数据库
$result = mysql_query($sql);
//处理我们的数据
echo "<div class='content'>";
echo "<table border=0 cellspacing=0 width=80% align='center'>";
while($row = mysql_fetch_assoc($result)){
	$url1="../xindefu-du-h-du/".$row['URL1'];
    $url2="../xindefu-du-h-du/".$row['URL2'];
    $url3="../xindefu-du-h-du/".$row['URL3'];
	echo "<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
    echo "<tr>";
    echo "<td>";
    echo "<img src='$url1' width='100%'>";
    echo "</td>";
    echo "<td>&nbsp;&nbsp;</td>";
    echo "<td>";
    echo "<img src='$url2' width='100%'>";
    echo "</td>";
    echo "<td>&nbsp;&nbsp;</td>";
    echo "<td>";
    echo "<img src='$url3'width='100%'>";
    echo "</td>";
    echo "</tr>";
    echo "<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
}
echo "</table>";
echo "</div>";
//释放结果
mysql_free_result($result);

//获取数据总数
$to_sql="SELECT COUNT(*)FROM yangdai";
$to_result=mysql_fetch_array(mysql_query($to_sql));
$to=$to_result[0];
//计算页数
$to_pages=ceil($to/$PageSize);
mysql_close($conn);
/** 3.显示数据+分页条 **/
$page_banner="<div class='page'>";
//计算偏移量
$pageffset=($ShowPage-1)/2;
if($page>1){
    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=1'>首页</a>";
    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."'><上一页</a>";
}
//初始化数据
$start=1;
$end=$to_pages;
if ($to_pages>$ShowPage){
    if($page>$pageffset+1){
        $page_banner.="...";
    }
    if ($page>$pageffset){
        $start=$page-$pageffset;
        $end=$to_pages>$page+$pageffset?$page+$pageffset:$to_pages;
    }else{
        $start=1;
        $end=$to_pages>$ShowPage?$ShowPage:$to_pages;
    }
    if ($page+$pageffset>$to_pages){
        $start=$start-($page+$pageffset-$end);
    }
}
for($i=$start;$i<=$end;$i++) {
    if ($page == $i) {
        $page_banner .= "<span class='current'>{$i}</span>";
    } else {
        $page_banner .= "<a href='" . $_SERVER['PHP_SELF'] . "?p=" . ($i) . "'>{$i}</a>";
    }
}
//尾部省略
if ($to_pages>$ShowPage&&$to_pages>$page+$pageffset){
    $page_banner.="...";
}
if ($page<$to_pages){
    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页></a>";
    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($to_pages)."'>尾页</a>";
}

$page_banner.="共{$to_pages}页";
	echo $page_banner;
?>
</body>
</html>