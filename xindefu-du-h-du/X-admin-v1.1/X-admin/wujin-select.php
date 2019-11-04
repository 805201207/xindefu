<style>
 ul li{
 	list-style:none;
 }
	  .wrap{
  	width: 100%;
	height: 45px;
	margin-top: 0px;
  }
 .wrap .xinxi{
	 float: left;
	 width: 80%;
	 height: 40px;
	 border-bottom: #8D8D8D solid 1px;
	 border-top: #8D8D8D solid 1px;
	 border-left: #8D8D8D solid 1px;
	 margin-top: 0px;
 }
 .wrap .xinxi li{
	 float: left;
	 width: 20%;
	 height: 40px;
	 margin-top: -5px;

 }
  .wrap .chakan{
	  float: left;
	  width: 10%;
	  height: 40px;
	   border-bottom: #8D8D8D solid 1px;
	  border-top: #8D8D8D solid 1px;
	  border-right:#8D8D8D solid 1px ;
	   margin-top: 0px;
  }
    .wrap .chakan li{
  	  float: left;
  	  width: 50%;
  	  height:30px;
	  text-align: center;
	  margin-top: 5px;
	  background-color: #AAAAAA;
	  border-radius: 2em;
  }
</style>
<?php
header("Content-type:text/html;Charset=utf8");//设定字符集
$conn=mysqli_connect("localhost","root","","xingdefu");
mysqli_set_charset($conn,'utf8');//设定字符集
$sql="select id from wujinbiao order by id desc";
$que=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($que);
$id=$row["id"];//最大的id值
 for($i=1;$i<=$id;$i++){

 	$sql="select id,cre_time,TotalMOdel,Subtype,Details from wujinbiao where id=$i";
	$que=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($que);
	 $ids=$row["id"];
	 $time=$row["cre_time"];
	 $TotalMOdel=$row["TotalMOdel"];
	 $Subtype=$row["Subtype"];
	 $Details=$row["Details"];
	//查图片
if($ids){
		echo "<div class='wrap'>";
		echo "<ul class='xinxi'>";
			echo "<li>";
				echo "<p>$ids</p>";
			echo "</li>";
			echo "<li>";
				echo "<p>$time</p>";
			echo "</li>";
			echo "<li>";
				echo "<p>$TotalMOdel</p>";
			echo "</li>";
			echo "<li>";
				echo "<p>$Subtype</p>";
			echo "</li>";
			echo "<li>";
				echo "<p>".substr($Details,0,30)."</p>";
			echo "</li>";
		echo "</ul>";
		echo "<ul class='chakan'>";
		echo "<li><a href='wujin-delete.php?id=$row[id]'>删除</a></li>";
		echo "</ul>";

	echo "</div>";

}

 }
?>
