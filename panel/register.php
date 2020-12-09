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
<form 
action="../php/function.php?mode=<?php if(isset($_GET['user'])){ echo 'edit_user&id='.$_GET['user'];}else{ echo 'user'; } ?>" method="post" name="form" class=" form-horizontal">
<fieldset>
<legend><h2>User Registration </h2></legend>

  <div class=" form-group">
    <label class="control-label col-sm-3" for="inputA">Name :</label>
    <div class="controls col-md-7">
      <input name="name" type="text" class="form-control" id="inputPassword"  value="<?php if(isset($_GET['user'])){ echo $fn->updater($_GET['user'],'tbl_user','name');}?>" placeholder="Fullname">
    </div>
  </div>
   <div class=" form-group">
    <label class="control-label col-sm-3" for="inputA">Username :</label>
    <div class="controls col-md-7">
      <input name="username" type="text" class="form-control" id="inputPassword"  value="<?php if(isset($_GET['user'])){ echo $fn->updater($_GET['user'],'tbl_user','username');}?>"
      placeholder="Username">
    </div>
  </div>
   <div class=" form-group">
    <label class="control-label col-sm-3" for="inputA">Password :</label>
    <div class="controls col-md-7">
      <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
    </div>
  </div>
  <div class=" form-group">
    <label class="control-label col-sm-3" for="inputUsername"></label>
    <div class="controls col-md-7">
      <input type="submit"
      value="<?php if(isset($_GET['user'])){ echo 'Update';}else{ echo 'Submit'; } ?>" 
      class="btn btn-success btn-lg" >
    </div>
  </div>
  </fieldset>

</form>
<br/>
<?php 
$sql ="SELECT * FROM tbl_user";
$result = $db->query($sql);
$count = 0;
while($row = $db->fetch_array($result)){
	$count++;
	echo '<h2>'.$count.': '.$row['name'].'<span style="color:#009500; margin-left:25px; font-size:22px; font-wieght:bold;"><a href="register.php?user='.$row['username'].'">Edit</a> | <a href="../php/function.php?mode=del_user&user='.$row['username'].'">Delete</a></span></h2>';
}
?>
</div>
</div>
<!--QUESTION-->
</div>
</body>
</html>