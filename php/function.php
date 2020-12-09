
<?php 
require_once "function.class.php";
require_once "escape_value.php";
require_once "time_stamp.php";
if(isset($_GET['mode'])){
$mode = $_GET['mode'];
if($mode =="mark"){
$id = $_POST['id'];
$answer = $_POST['answer'];
$check_answer = $fn->check_answer($answer , $id);
if($check_answer === true ){
	$status = "pass";
	$mark = $fn->mark($status);
	if($mark == true){
		echo "updated";
	}else{
		echo "Not updated";
	}
}else{
	$status = "fail";
	$mark = $fn->mark($status);
	if($mark == true){
		echo "*updated";
	}else{
		echo "*Not updated";
	}
}
}else if($mode =="question"){
	$question = escape($_POST['question']);
	$answer = escape($_POST['answer']);
	$a = escape($_POST['a']);
	$b = escape($_POST['b']);
	$c = escape($_POST['c']);
	$d = escape($_POST['d']);
	if(!empty($question) && !empty($a) && !empty($b) && !empty($c) && !empty($c) && !empty($d)){
	$comfirm = $fn->question($question , $a , $b , $c , $d ,$answer);
	if($comfirm === true ){
		$db->redirect("../panel/question.php?suc");
	}else{
		$db->redirect("../panel/question.php?erro");
	}
	}else{
		$db->redirect("../panel/question.php?erro");
	}
}else if($mode =="edit_question"){
	$id = escape($_GET['id']);
	$question = escape($_POST['question']);
	$answer = escape($_POST['answer']);
	$a = escape($_POST['a']);
	$b = escape($_POST['b']);
	$c = escape($_POST['c']);
	$d = escape($_POST['d']);
	if(!empty($question) && !empty($a) && !empty($b) && !empty($c) && !empty($c) && !empty($d) && !empty($id) ){
	$comfirm = $fn->edit_question($question , $a , $b , $c , $d ,$answer , $id);
	if($comfirm === true ){
		$db->redirect("../panel/question.php?upd");
	}else{
		$db->redirect("../panel/question.php?erro");
	}
	}else{
		$db->redirect("../panel/question.php?erro");
	}
}else if($mode =="register"){
	$name = escape($_POST['name']);
	$phone = escape($_POST['phone']);
	$gender = escape($_POST['gender']);
	$username = escape($_POST['username']);
	$password = escape($_POST['password']);
	if(!empty($name) && !empty($phone) && !empty($gender) && !empty($username) && !empty($password)){
	$comfirm = $fn->candidate($name , $phone , $gender , $username , $password);
	$check = $fn->score($username);
	if($comfirm === true && $check === true){
		$_SESSION['username'] = $username;
		$db->redirect("../start.php");
	}else{
		$db->redirect("../register.php?erro");
	}
	}else{
		$db->redirect("../register.php?erro");
	}
}else if($mode =="edit_register"){
	$id = escape($_GET['id']);
	$name = escape($_POST['name']);
	$phone = escape($_POST['phone']);
	$gender = escape($_POST['gender']);
	$username = escape($_POST['username']);
	$password = escape($_POST['password']);
	if(!empty($name) && !empty($phone) && !empty($gender) && !empty($username) && !empty($password)){
	$comfirm = $fn->candidate($name , $phone , $gender , $username , $password , $id);
	if($comfirm === true ){
		$db->redirect("../register.php?upd");
	}else{
		$db->redirect("../register.php?erro");
	}
	}else{
		$db->redirect("../register.php?erro");
	}
}else if($mode =="login"){
	$username = escape($_POST['username']);
	$password = escape($_POST['password']);
	if(!empty($username) && !empty($password)){
	$comfirm = $fn->login($username , $password , 'tbl_candidate');
	if($comfirm === true ){
		$_SESSION['username'] = $username;
		$db->redirect("../start.php");
	}else{
		$db->redirect("../index.php?erro");
	}
	}else{
		$db->redirect("../index.php?erro");
	}
}else if($mode =="logout"){
if(isset($_SESSION['username'])){
	unset($_SESSION['username']);
	$db->redirect("../index.php?suc");
}
}else if($mode =="user"){
	$name = escape($_POST['name']);
	$username = escape($_POST['username']);
	$password = escape($_POST['password']);
	if(!empty($name) && !empty($username) &&!empty($password)){
	$comfirm = $fn->register($name , $username , $password );
	if($comfirm === true){
		$db->redirect("../panel/register.php?suc");
	}else{
		$db->redirect("../panel/register.php?erro");
	}
	}else{
		$db->redirect("../panel/register.php?erro");
	}
}else if($mode =="edit_user"){
    $name = escape($_POST['name']);
	$username = escape($_POST['username']);
	$password = escape($_POST['password']);
	if(!empty($name) && !empty($username) && !empty($password)){
	$comfirm = $fn->edit_register($name , $username , $password );
	if($comfirm === true){
		$db->redirect("../panel/register.php?upd");
	}else{
		$db->redirect("../panel/register.php?erro");
	}
	}else{
		$db->redirect("../panel/register.php?erro");
	}
}else if($mode =="del_user"){
	$username = $_GET['user'];	
	$comfirm = $fn->del_register($username );
	if($comfirm === true){
		$db->redirect("../panel/register.php?del");
	}else{
		$db->redirect("../panel/register.php?erro");
	}	
}else if($mode =="alogin"){
	$username = escape($_POST['username']);
	$password = escape($_POST['password']);
	$comfirm = $fn->login($username , $password , 'tbl_user');
	if($comfirm === true ){
		$_SESSION['admin'] = $username;
		$db->redirect("../panel/home.php");
	}else{
		$db->redirect("../panel/index.php?erro");
	}
}else if($mode =="report"){
$sql ="SELECT C.name, S.pass , S.fail  FROM tbl_score S, tbl_candidate C WHERE C.username = S.username";
echo excel_csv($sql);
}else if($mode =="alogout"){
	if(isset($_SESSION['admin'])){
	unset($_SESSION['admin']);
	$db->redirect("../panel/index.php?suc");
}
}else if($mode =="online"){
$comfirm = $fn->online();
}
}
?>