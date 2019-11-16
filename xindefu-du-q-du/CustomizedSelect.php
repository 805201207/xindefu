<?php

$host = '127.0.0.1';

$user = 'root';

$password = '';

$dbName = 'xingdefu';


$pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);

$pdo->query('set names utf8;');

$sql = "select * from feibiao";

$data = $pdo->query($sql)->fetchAll();


$num = 2;

$count = count($data);

$w = ceil($count / $num);

 

$page = isset($_GET['page']) ? $_GET['page'] : 1;

//var_dump($page);

$offset = ($page - 1) * $num;

//var_dump($offset);

$sql = "select * from feibiao limit $offset,{$num}";

 

$data = $pdo->query($sql)->fetchAll();

 

$p = ($page == 1) ? 0 : ($page - 1);

$n = ($page == $w) ? 0 : ($page + 1);

 

?>

<!doctype html>

<html lang="en">

<head>
    <meta http-equiv="CONTENT-TYPE" content="text/html;">
</head>
    <title>Document</title>


<body>

<form action="">

    <table border="0">
		<tr>&nbsp</tr>

        <?php foreach ($data as $v): ?>

 <tr>
				<td width='40px'>&nbsp</td>
                <td><?php $url1="../xindefu-du-h-du/".$v['URL1']; 
				echo "<img src='$url1' width='280px' height='280px'>";
				?></td>
				<td>&nbsp</td>
                 <td><?php $url1="../xindefu-du-h-du/".$v['URL2']; 
                echo "<img src='$url1' width='280px' height='280px'>";
                ?></td>
				<td>&nbsp</td>
                 <td><?php $url1="../xindefu-du-h-du/".$v['URL3']; 
                echo "<img src='$url1' width='280px' height='280px'>";
                ?></td>


            </tr>
				<td width='40px'>&nbsp</td>
			   <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<?php echo $v['type']; ?>
				</td>
			   <td>&nbsp</td>
			   <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				   <?php echo $v['type']; ?>
				</td>
			   <td>&nbsp</td>
			   <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<?php echo $v['type']; ?>
				</td>
			<tr>
				
			</tr>

        <?php endforeach; ?>

 </table>

    <?php
	echo "<table width='100%'>";
	 echo "<tr>";
	   echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>";
       echo "<td>";
    if ($page==1){

 echo "第".$page."页";

    }else{

 echo "<a href='?page=1'>"."第".$page."页"."</a>";

    }

 if ($p){

 echo "<a href='?page={$p}'>上一页</a>";

    }else{

 echo "上一页";

    }

 if ($n){

 echo "<a href='?page={$n}'>下一页</a>";

    }else{

 echo "下一页";

    }

 if($page== $w){

 echo "共".$w."页";

    }else{

 echo "<a href='?page={$w}'>"."共".$w."页"."</a>";

    }
	    echo "</td>";
	  echo "</tr>";
	echo "</table>";

 ?>

</form>

</body>

</html>