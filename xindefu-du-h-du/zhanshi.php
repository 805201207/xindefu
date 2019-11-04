<style>
 ul li{
 	list-style:none;
 }
	  .wrap{
  	width: 100%;
	height: auto;
	float: left;
	border-bottom: darkgrey solid 1px;
  }
    .wrap .img{
  	width: 20%;
	height: 120px;
	margin-top:20px;
	float: left;
  }
 .wrap .wenzi{
 	width: 60%;
	height: 120px;
	margin-top: 50px;
	float: left;
 }
  .wrap .chakan{
  	width: 5%;
	height: 120px;
	margin-top: 100px;
	float: left;
  }
  .wrap .chakan ul li{
  	color: blue;
  }
</style>
<?php
header("Content-type:text/html;Charset=utf8");//设定字符集
$conn=mysqli_connect("localhost","root","","xingdefu");
mysqli_set_charset($conn,'utf8');//设定字符集
$sql="select id from news order by id desc";
$que=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($que);
$id=$row["id"];//最大的id值
 for($i=1;$i<=$id;$i++){

 	$sql="select id,title,cre_time,content,url from news where id=$i";
	$que=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($que);
	$ids=$row["id"];
	$photo=$row["url"];
	$title=$row["title"];
	$time=$row["cre_time"];
	$content=$row["content"];
	//查图片
if($ids){
		echo "<div class='wrap'>";
		echo "<ul class='img'>";
			echo "<li>";
				echo "<p><img src='$photo' width='150'></p>";
			echo "</li>";
		echo "</ul>";
		echo "<ul class='wenzi'>";
			echo "<li>";
				echo "<p>$title</p>";
			echo "</li>";
			echo "<li>";
				echo "<p>$time</p>";
			echo "</li>";
			echo "<li>";
				echo "<p>".substr($content,0,300)."</p>";
			echo "</li>";
		echo "</ul>";
		echo "<ul class='chakan'><li><a href='newxianqin.php?id=$row[id]'>查看</a></li></ul>";

	echo "</div>";

}

 }
?>
