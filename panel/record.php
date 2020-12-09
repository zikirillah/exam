<?php 
require_once "../php/function.class.php";
require_once "../incl/adsec.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Project</title>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="../css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<!--Navigation Menu-->
<?php require_once "../incl/adnav.php"; ?>
<!--Content Of The Page-->
<div class="container">
<!--QUESTION-->
<div class="row">
<br/>
<div class="col-sm-10">
<div style="float:right; margin-top:20px; margin-bottom:20px; padding:2px;"><a href="../php/function.php?mode=report" class="btn btn-success">Export</a></div>
 <table border="1"  bordercolor="#99DBB0" width="100%" cellpadding="5" cellspacing="2">
 <tr bgcolor="#8BC179" style="color:#fff; font-size:16px;">
 <td width="65%">Name</td>
 <td> Pass </td>
 <td>Fail</td>
 <td>Un-answer</td>
 </tr>
  <?php
$sql="SELECT C.name, S.pass , S.fail  FROM tbl_score S, tbl_candidate C WHERE C.username = S.username";
$result = $db->query($sql);
while($row = $db->fetch_array($result)){
//	echo $row['name'];
?>
  <tr style="color:#000; font-size:16px;">
 <td width="65%"><?php echo $row['name']; ?></td>
 <td><?php echo $row['pass']; ?></td>
 <td><?php echo $row['fail']; ?></td>
 <td><?php echo ($fn->question_limit()-($row['fail']+$row['pass'])); ?></td>
 </tr>
 <?php
}
?>
 </table>
</div>
</div>
<!--QUESTION-->
</div>
</body>
</html>