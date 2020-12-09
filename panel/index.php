<?php 
require_once "../php/function.class.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Project</title>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<!--Navigation Menu-->
<nav class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm" role="navigation">
 <div class="brand"> <i class="fa fa-windows fa-fw fa-3x"></i></div>
 <br/>
 <h2 style="padding:5px; margin-left:30px; margin-bottom:30px; margin-top:70px;">Admin Login</h2>
  <form action="../php/function.php?mode=alogin" method="post" class=" form-horizontal">
<div class=" form-group">
    <label class="control-label col-sm-4" for="inputUsername">Username :</label>
    <div class="controls col-md-7">
      <input name="username" type="text" class="form-control" id="inputUsername " placeholder="Username">
    </div>
  </div>
  <div class=" form-group">
    <label class="control-label col-sm-4" for="inputUsername">Password :</label>
    <div class="controls col-md-7">
      <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
    </div>
  </div>
  <div class=" form-group">
    <label class="control-label col-sm-4" for="inputUsername"></label>
    <div class="controls col-md-7">
      <input type="Submit" value="Login" class="btn btn-success btn-lg">
    </div>
  </div>
</form>
</nav>
<!--Content Of The Page-->
<div class="container">
<?php //echo $fn->comfirm('erro');?>
<img src="../picx/bonner.png" width="500" height="400" style="margin-left:150px; margin-top:90px;" />
</div>
</body>
</html>