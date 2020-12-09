<?php 
require_once "../php/function.class.php";
?>
<?php  $row = $fn->first_question(); ?>
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