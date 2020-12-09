<?php 
require_once "php/ini.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Project</title>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<!--Navigation Menu-->
<nav class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm" role="navigation">
 <div class="brand"> <i class="fa fa-windows fa-fw fa-3x"></i></div>
 <br/>
 
</nav>
<!--Content Of The Page-->
<div class="container">
<!--QUESTION-->
<div class="row">
<div style="margin-top:140px;"></div>
<br/>
<div class="col-sm-10">
<form class=" form-horizontal" method="get" action="quiz.php">
<fieldset>
<legend><h2>Choose Question</h2></legend>
  <div class=" form-group">
    <label class="control-label col-sm-3" for="inputGender">Quiz paper :</label>
    <div class="controls col-md-3">
     <select name="t" class="form-control" id="inputGender">
     <option>Select</option>
     <option value="0">Sira</option>
    <option value="10">Hadith</option>
    <option value="20">Fiqh</option>
     <option value="30">Tawhid</option>
     </select>
    </div>
  </div>
   <div class=" form-group">
    <label class="control-label col-sm-3" for="inputGender">Question NO :</label>
    <div class="controls col-md-3">
     <select name="q" class="form-control" id="inputGender">
     <option>Select</option>
     <option value="1">1</option>
     <option value="2">2</option>
     <option value="3">3</option>
     <option value="4">4</option>
     <option value="5">5</option>
     <option value="6">6</option>
     <option value="7">7</option>
     <option value="8">8</option>
     <option value="9">9</option>
     <option value="10">10</option>
 
     </select>
    </div>
  
 </div>
  <div class=" form-group">
    <label class="control-label col-sm-3" for="inputUsername"></label>
    <div class="controls col-md-7">
      <input type="Submit" value="Submit" class="btn btn-success btn-lg" >
    </div>
  </div>
  </fieldset>
</form>

</div>
</div>
<!--QUESTION-->
</div>
</body>
</html>