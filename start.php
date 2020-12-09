<?php 
require_once "php/ini.php";
require_once "incl/sec.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Project</title>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<!--Navigation Menu-->
<nav class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm" role="navigation">
 <div class="brand"> <i class="fa fa-windows fa-fw fa-3x"></i></div>
 <br/>
 <table style=" margin-left:60px;">
<tr>
<td><i class="fa fa-home fa-4x"></i><span class="text"></td>
<td align="left" valign="middle"><span style="font-size:22px"></span></td>
</tr>
<tr>
<td><i class="fa fa-user fa-4x"></i><span class="text"></td>
<td align="left" valign="middle"><span style="font-size:22px"><?php echo $fn->candidate_name(); ?></span></td>
</tr>
<tr>
<td>
<?php 
$comfirm = $fn->check_test();
if($comfirm === false){
?> <i class="fa fa-play-circle-o fa-4x"></i><span class="text"></td>
<?php }  ?>

<td align="left" valign="middle">
<?php 
$comfirm = $fn->check_test();
if($comfirm === false){
?> <span style="font-size:22px"><a href="exam.php">Start Test</a></span>
<?php }  ?>
</td>
</tr>
<tr>
<td></td>
<td  style="height:50px;" align="left" valign="middle"></td>
</tr>
<tr>
<td style="height:50px;"></td>
<td align="left" valign="middle"></td>
</tr>
<tr>
<td style="height:50px;"><i class="fa fa-power-off fa-4x"></i></td>
<td align="left" valign="middle"><a href="php/function.php?mode=logout"><span style="font-size:22px"><span id="counter"></span> Logout</span></a><em></em></td>
</tr>

</table>
</nav>
<!--Content Of The Page-->
<div class="container">
<?php 
$comfirm = $fn->check_test();
if($comfirm === true ){
$username = $_SESSION['username'];
$sql = "SELECT * FROM tbl_score WHERE username ='$username' LIMIT 1";
$result = $db->query($sql);
$row = $db->fetch_array($result);
?>
<br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/>
<h2>Pass : <?php echo $row['pass']; ?> Questions</h2>
<h2>Fail : <?php echo $row['fail']; ?> Questions</h2>
<h2>Un-answser : <?php echo $fn->question_limit()-($row['pass']+$row['fail']); ?> Questions</h2>
<h2>Total  : <?php echo $fn->question_limit(); ?> Questions</h2>
<?php } ?>
</div>
</body>
</html>