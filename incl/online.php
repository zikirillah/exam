<?php
require_once"../php/function.class.php";
$sql="SELECT * FROM tbl_online";
$result = $db->query($sql);
$count = 0;
while($row = $db->fetch_array($result)){
	$time = time();
	$created = $row['created'];
	$current = $time-$created;
	if($current<5){
	$count++;
echo '<h2>'.$count.'. '.$fn->candidate_names($row['username']).'<span style="color:#009500; margin-left:25px; font-size:22px; font-wieght:bold;">Score : '.$fn->u_score($row['username']).'</span></h2>';
	}
}
?>