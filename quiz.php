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
	var url = 'squiz.php';
	counter(35 , url);
  /*  $(".option").click(function(){
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
		});*/
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

 <br/>
  <table style=" margin-left:60px;">
  <tr>
<td style="height:50px;"></td>
<td align="left" valign="middle"></td>
</tr>
 <tr>
<td style="height:50px;"></td>
<td align="left" valign="middle"></td>
</tr>
 <tr>
<td style="height:50px;"></td>
<td align="left" valign="middle"></td>
</tr>
<tr>
<td style="height:50px;"></td>
<td align="left" valign="middle"></td>
</tr>
<tr>
<td style="height:50px;"></td>
<td align="left" valign="middle"></td>
</tr>

<tr>
<td><i class="fa fa-clock-o fa-5x"></i><span class="text"></td>
<td align="left" valign="middle"><span style="font-size:30px">0:<span id="counter"></span> sec</span></td>
</tr>
<tr>
<td style="height:50px;"></td>
<td align="left" valign="middle"></td>
</tr>
<tr>
<td style="height:50px;"></td>
<td align="left" valign="middle"></td>
</tr>

</table>
<br/>
<div style=" padding-left:150px; padding-top:15px; border-top:1px solid #9FCC91; display:none;" id="loader"> <i class="fa  fa-refresh fa-spin fa-fw fa-4x"></i></div>
</nav>
<!--Content Of The Page-->
<div class="container">
<?php
$t = $_GET['t'];
$q = $_GET['q'];
$id = $t+$q;
$sql ="SELECT * FROM tbl_question WHERE id ='$id' LIMIT 1";
$result = $db->query($sql);
$row = $db->fetch_array($result);
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
<div class="option" id ="<?php echo 'a';?>"><strong>A : </strong> <?php echo $row['a'];?></div>
</div>
<div class="col-sm-5">
<div class="option" id ="<?php echo 'b';?>"><strong>B :</strong> <?php echo $row['b'];?></div>
</div>
</div>
<!-- OPTION C AND D -->
<div class="row">
<div class="col-sm-5">
<div class="option" id ="<?php echo 'c';?>"><strong>C :</strong> <?php echo $row['c'];?></div>
</div>
<div class="col-sm-5">
<div class="option" id ="<?php echo 'd';?>"><strong>D : </strong><?php echo $row['d'];?></div>
</div>
</div>
<div class="question_id" id="<?php echo $row['id'];?>"></div>
<!-- END -->
</div>
</body>
</html>