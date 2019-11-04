<style>
	.chakan{
		width: 100%;
		height: auto;
		float: left;
	}
	.chakan ul li{
		list-style: none;
		text-align: center;
		margin-top: 40px;

	}
</style>
<?php
header("Content-type:text/html;Charset=utf8");//设定字符集
$conn=mysqli_connect("localhost","root","","xingdefu");
mysqli_set_charset($conn,'utf8');//设定字符集
$id=$_GET['id'];
$sql="select * from news where id='$id'";
$que=mysqli_query($conn,$sql);
?>
	<div class="chakan">
	<?php while ($row=mysqli_fetch_array($que)) {
		 ?>
		<ul>
			<li><?php echo $row['title']?></li>
			<li><?php echo $row['cre_time']?></li>
			<li><?php echo "<p><img src='$row[url]' width='100%' height='380px'></p>"?></li>
			<li><?php echo $row['content']?></li>
	<?php } ?>
	</ul>
	</div>
