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
<link rel="stylesheet"  href="../css/pagination.css">
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
<form class=" form-horizontal" method="post" action="../php/function.php?mode=<?php if(isset($_GET['id'])){ echo 'edit_question&id='.$_GET['id'];}else{ echo 'question'; } ?>">
<fieldset>
<legend><h2>Question.</h2></legend>
  <div class=" form-group">
    <label class="control-label col-sm-3" for="inputName">Question :</label>
    <div class="controls col-md-7">
      <textarea name="question" rows="5" class="form-control" placeholder="Question here"><?php if(isset($_GET['id'])){ echo $fn->update($_GET['id'],'tbl_question','question');}?></textarea>
    </div>
  </div>
  <div class=" form-group">
    <label class="control-label col-sm-3" for="inputGender">Answer :</label>
    <div class="controls col-md-3">
     <select name="answer" class="form-control" id="inputGender">
     <option>Select</option>
     <option>a</option>
     <option>b</option>
     <option>c</option>
     <option>d</option>
     </select>
    </div>
  </div>
   <div class=" form-group">
    <label class="control-label col-sm-3" for="inputUsername">A :</label>
    <div class="controls col-md-7">
      <input name="a" type="text" class="form-control" id="inputUsername "  value="<?php if(isset($_GET['id'])){ echo $fn->update($_GET['id'],'tbl_question','a');}?>" placeholder="A :">
    </div>
  </div>
  <div class=" form-group">
    <label class="control-label col-sm-3" for="inputUsername">B :</label>
    <div class="controls col-md-7">
      <input name="b" type="text" class="form-control" id="inputUsername "  value="<?php if(isset($_GET['id'])){ echo $fn->update($_GET['id'],'tbl_question','b');}?>" placeholder="B :">
    </div>
  </div>
 <div class=" form-group">
    <label class="control-label col-sm-3" for="inputUsername">C :</label>
    <div class="controls col-md-7">
      <input name="c" type="text" class="form-control" id="inputUsername "  value="<?php if(isset($_GET['id'])){ echo $fn->update($_GET['id'],'tbl_question','c');}?>" placeholder="C :">
    </div>
  </div>
  <div class=" form-group">
    <label class="control-label col-sm-3" for="inputUsername">D :</label>
    <div class="controls col-md-7">
      <input name="d" type="text" class="form-control" id="inputUsername "  value="<?php if(isset($_GET['id'])){ echo $fn->update($_GET['id'],'tbl_question','d');}?>" placeholder="D :">
    </div>
  </div>
  <div class=" form-group">
    <label class="control-label col-sm-3" for="inputUsername"></label>
    <div class="controls col-md-7">
      <input type="Submit" value="<?php if(isset($_GET['id'])){ echo 'Update';}else{ echo 'Submit'; } ?>" class="btn btn-success btn-lg" >
    </div>
  </div>
  </fieldset>
</form>
<br/>
 <?php
	/*
		Place code to connect to your DB here.
	*/
	$tablename="tbl_question";	
	//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
		if(isset($_GET['page']))
{
    $page = $_GET['page'];
        }else{
           $page = 1;
        }
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tablename ";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "question.php"; 	//your file name  (the name of this file)
	$limit = 10; 
// $page = $_GET['page'];						//how many items to show per page
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM $tablename   ORDER BY id DESC LIMIT $start, $limit";
	$result = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">« previous</a>";
		else
			$pagination.= "<span class=\"disabled\">« previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next »</a>";
		else
			$pagination.= "<span class=\"disabled\">next »</span>";
		$pagination.= "</div>\n";		
	}
?>
       <ul class="list-group">
        <?php
		while($row = mysql_fetch_array($result))
		{
		?>
         <li class="list-group-item">
         <h3><?php echo $row['question']; ?></h3>
         <strong style="color:#51A257;">A:</strong> <?php echo $row['a']; ?> <strong style="color:#51A257; margin-left:20px;"> B:</strong> <?php echo $row['b']; ?>  <strong style="color:#51A257; margin-left:20px;">C:</strong> <?php echo $row['c']; ?>  <strong style="color:#51A257; margin-left:20px;">D:</strong> <?php echo $row['d']; ?> <strong style="color: #BC4512; margin-left:20px;"> [<?php echo $row['answer']; ?>]</strong> <a  style="margin-left:20px;"href="question.php?id=<?php echo $row['id']; ?>">Edit</a>
         </li>
       <?php // Your while loop here

		}
      ?>
       </ul>
       <br/>
       <div class="text-center"><?php echo $pagination; ?></div>
       <br/>
       
</div>
</div>
<!--QUESTION-->
</div>
</body>
</html>