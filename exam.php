<?php 
require_once "php/ini.php";
require_once "incl/sec.php";
if(isset($_GET['id'])){	
$id =  $_GET['id']; 
$limit = $fn->question_limit();
if($id > $limit){
	header("location:start.php");
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Project</title>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
function counter(time , url){
	setInterval(function(){
		$("#counter").text(time);
		time = time - 1;
		if(time == 0){
	    //var correct = $(".correct").attr("id");
		 //$(".container").load("incl/index.php");
		window.location = url;
		 //time = 5;
		 //alert(correct);
		}
		}, 1000);
}
$(document).ready(function(e) {
	setInterval(function(){
 $.get('php/function.php', { mode: 'online'}, function(data){
		//$('.content').html(data);																		
       });
 },1000);
	var url = "exam.php?id="+'<?php if(isset($_GET['id'])){	echo $_GET['id']+1; }else{ 	echo 2; }?>';
	counter(35 , url);
    $(".option").click(function(){
		$("#loader").show();
		var id = $(".question_id").attr("id");
		var answer = $(this).attr("id");
		//alert(answer);
		$.post('php/function.php?mode=mark', { answer: answer, id:id}, function(data){
			var check = data;
			//if(check === "updated" || check === "Not updated"  || check === "*updated" || check === "*Not updated" ){
				//alert(url);
			  window.location = url;
			//}
			});
		});
});

</script>
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
<td><i class="fa fa-play-circle fa-4x"></i><span class="text"></td>
<td align="left" valign="middle"><span style="font-size:22px"> Question : <?php if(isset($_GET['id'])){	echo $_GET['id']; }else{ 	echo 1; }?></span></td>
</tr>
<tr>
<td><i class="fa fa-clock-o fa-4x"></i><span class="text"></td>
<td align="left" valign="middle"><span style="font-size:22px">0:<span id="counter"></span> sec</span></td>
</tr>
<tr>
<td style="height:50px;"></td>
<td align="left" valign="middle"></td>
</tr>
<tr>
<td style="height:50px;"><i class="fa fa-power-off fa-4x"></i></td>
<td align="left" valign="middle"><a href="php/function.php?mode=logout"><span style="font-size:22px"><span id="counter"></span> Logout</span></a></td>
</tr>

</table>
<br/>
<div style=" padding-left:150px; padding-top:15px; border-top:1px solid #9FCC91; display:none;" id="loader"> <i class="fa  fa-refresh fa-spin fa-fw fa-4x"></i></div>
</nav>
<!--Content Of The Page-->
<div class="container">
<?php
if(isset($_GET['id'])){	
 $row = $fn->next_question($_GET['id']);
 }else{ 
	 $row = $fn->first_question();
	 }
 
   ?>
<!--QUESTION-->
<div class="row">
<div class="col-sm-10">
<div class="question"><?php echo $row['question'];?></div>
</div>
</div>
<!--QUESTION-->
<div class="row">
<div class="col-sm-5">
<div class="option" id ="<?php echo 'a';?>"><?php echo $row['a'];?></div>
</div>
<div class="col-sm-5">
<div class="option" id ="<?php echo 'b';?>"><?php echo $row['b'];?></div>
</div>
</div>
<!-- OPTION C AND D -->
<div class="row">
<div class="col-sm-5">
<div class="option" id ="<?php echo 'c';?>"><?php echo $row['c'];?></div>
</div>
<div class="col-sm-5">
<div class="option" id ="<?php echo 'd';?>"><?php echo $row['d'];?></div>
</div>
</div>
<div class="question_id" id="<?php echo $row['id'];?>"></div>
<!-- END -->
</div>
</body>
</html>