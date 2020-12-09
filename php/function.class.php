<?php
session_start();
require_once "mysql.php";
class Fn{
	public function user(){
		global $db;
		return $_SESSION['admin'];
	}
	public function candidate_username(){
		global $db;
		return $_SESSION['username'];
	}
	public function online(){
		global $db;
		$user = self::candidate_username();
		$created = time();
		$sql="SELECT * FROM tbl_online WHERE username = '$user'";
		$result = $db->query($sql);
		$count = $db->num_row($result);
		if($count>0){
			$query = "UPDATE tbl_online SET created='$created' WHERE username ='$user'";
		}else{
			$query = "INSERT INTO tbl_online(username , created) VALUES('$user','$created')";
		}
		$vresult =  $db->query($query);
	}
	public function candidate_name(){
	global $db;
	$username = self::candidate_username();
	$sql ="SELECT name FROM tbl_candidate WHERE username ='$username' ";
	$result = $db->query($sql);
	$row = $db->fetch_array($result);
	return $row['name'];
	}
	public function candidate_names($username =' '){
	global $db;
	$sql ="SELECT name FROM tbl_candidate WHERE username ='$username' ";
	$result = $db->query($sql);
	$row = $db->fetch_array($result);
	return $row['name'];
	}
	public function check_test(){
	global $db;
	$username = self::candidate_username();
	$sql ="SELECT pass, fail FROM tbl_score WHERE username ='$username' ";
	$result = $db->query($sql);
	$row = $db->fetch_array($result);
    $pass =  $row['pass'];
	$fail =  $row['fail'];
	if($pass>0 || $fail>0){
		return true;
	}else{
		return false;
	}
	}
	public function login($username =' ' , $pass =' ' , $table = ' '){
    global $db;
	$password = md5($pass);
	$sql ="SELECT * FROM $table WHERE username ='$username' AND password = '$password' LIMIT 1";
	$result = $db->query($sql);
	$count = $db->num_row($result);
	if($count == 1){
		return true;
	}else{
		return false;
	}
	}
	public function question($question =' ' , $a =' ' , $b = ' ', $c = ' ', $d =' ', $answer =' '){
    global $db;
	$user = self::user();
	$created = time();
	$sql ="INSERT INTO tbl_question( question , a , b , c , d , answer,user,created ) VALUES ";
	$sql.="( '$question', '$a' , '$b' , '$c' , '$d' , '$answer', '$user', '$created')";
	$result = $db->query($sql);
	if($result){
		return true;
	}else{
		return false;
	}
	}
	public function register($name =' ' , $username =' ' , $pass = ' '){
    global $db;
	$user = self::user();
	$created = time();
	$password = md5($pass);
	$sql ="INSERT INTO tbl_user( name , username , password , user, created ) VALUES ";
	$sql.="( '$name', '$username' , '$password' , '$user', '$created')";
	$result = $db->query($sql);
	if($result){
		return true;
	}else{
		return false;
	}
	}
	
	public function edit_register($name =' ' , $username =' ' , $pass = ' ' ){
    global $db;
	$user = self::user();
	$created = time();
	$password = md5($pass);
	$sql ="UPDATE tbl_user SET  name ='$name' ,  password ='$password' , user='$user'";
	$sql.=" WHERE username = '$username'";
	$result = $db->query($sql);
	if($result){
		return true;
	}else{
		return false;
	}
	}
	public function del_register($username = ' '){
    global $db;
	$sql.="DELETE FROM tbl_user WHERE username = '$username'";
	$result = $db->query($sql);
	if($result){
		return true;
	}else{
		return false;
	}
	}
	public function edit_question($question =' ' , $a =' ' , $b = ' ', $c = ' ', $d =' ', $answer =' ', $id = 0){
    global $db;
	$user = self::user();
	$created = time();
	$sql ="UPDATE  tbl_question SET  question = '$question', a = '$a' , b = '$b' , c = '$c' ,";
	$sql.=" d = '$d' , answer =  '$answer', user = '$user',created ='$created' WHERE id ='$id'";
	$result = $db->query($sql);
	if($result){
		return true;
	}else{
		return false;
	}
	}
	public function del_question( $id = 0){
    global $db;
	$user = self::user();
	$created = time();
	$sql ="DELETE FROM  tbl_question  WHERE id ='$id'";
	$result = $db->query($sql);
	if($result){
		return true;
	}else{
		return false;
	}
	}
	public function candidate( $name =' ' , $phone = ' ', $sex = ' ' , $username =  ' ' , $pass =' '){
    global $db;
	$user = self::user();
	$created = time();
	$password = md5($pass);
	$sql ="INSERT INTO tbl_candidate( name , phone , sex ,username , password , created ) VALUES ";
	$sql.="('$name' , '$phone' , '$sex' , '$username' , '$password', '$created')";
	$result = $db->query($sql);
	if($result){
		return true;
	}else{
		return false;
	}
	}
	public function score($username =  ' '){
    global $db;
	$user = self::user();
	$created = time();
	$password = md5($pass);
	$sql ="INSERT INTO tbl_score( username , created ) VALUES ";
	$sql.="( '$username' , '$created')";
	$result = $db->query($sql);
	if($result){
		return true;
	}else{
		return false;
	}
	}
	public function edit_candidate($name =' ' , $phone = ' ', $sex = ' ' , $username =  ' ' , $password =' ' , $id= ' '){
    global $db;
	$user = self::user();
	$created = time();
	$sql ="INSERT INTO tbl_candidate name = '$name' , phone = '$phone' ,";
	$sql.=" sex = '$sex' , username = '$username' , password = '$password', created = $created' WHERE id ='$id";
	$result = $db->query($sql);
	if($result){
		return true;
	}else{
		return false;
	}
	}
	public function del_candidate( $id = 0){
    global $db;
	$user = self::user();
	$created = time();
	$sql ="DELETE FROM  tbl_candidate  WHERE id ='$id'";
	$result = $db->query($sql);
	if($result){
		return true;
	}else{
		return false;
	}
	}
	public function check_answer( $answer = ' ' , $id = 0){
    global $db;
	$created = time();
	$sql ="SELECT answer FROM tbl_question   WHERE id ='$id'";
	$result = $db->query($sql);
	$row  = $db->fetch_array($result);
	if($row['answer'] === $answer ){
		return true;
	}else{
		return false;
	}
	}
	public function mark( $status =''){
    global $db;
	if($status == 'pass'){
    $get_mark = self::get_mark($status);
	$new_mark = $get_mark+1;
	$comfirm = self::update_mark($status , $new_mark);
	if($comfirm){
		return true;
	}else{
		return false;
	}
	}else if ($status == 'fail'){
	$get_mark = self::get_mark($status);
	$new_mark = $get_mark+1;
	$comfirm = self::update_mark($status , $new_mark);
	if($comfirm){
		return true;
	}else{
		return false;
	}
	}
	}
	public function get_mark($status = ' '){
    global $db;
	$username = self::candidate_username();
	$sql ="SELECT $status  FROM tbl_score   WHERE username  ='$username'";
	$result = $db->query($sql);
	$row  = $db->fetch_array($result);
	return $row[$status];
	}
	public function update_mark($status = ' ', $score = 0){
    global $db;
	$username = self::candidate_username();
	$sql ="UPDATE tbl_score SET $status = '$score' WHERE username = '$username'";
	$result = $db->query($sql);
    if($result){
		return true;
	}else{
		return false;
	}
	}
	public function next_question($id = 0){
    global $db;
	$username = self::candidate_username();
	$sql ="SELECT * FROM tbl_question WHERE id ='$id'  ORDER BY id ASC LIMIT 1 ";
	$result = $db->query($sql);
    $row = $db->fetch_array($result);
	return $row;
	}
	public function first_question(){
    global $db;
	$username = self::candidate_username();
	$sql ="SELECT * FROM tbl_question  ORDER BY id ASC LIMIT 1 ";
	$result = $db->query($sql);
    $row = $db->fetch_array($result);
	return $row;
	}
	public function question_limit(){
    global $db;
	return 30;
	}
	public function  update($id = 0 , $table = ' ' , $column = ' ' ){
		global $db;
		$sql = "SELECT $column FROM $table WHERE id ='$id'";
		$result = $db->query($sql);
		$row = $db->fetch_array($result);
	    return $row[$column];
		}
		public function  updater($username = ' ' , $table = ' ' , $column = ' ' ){
		global $db;
		$sql = "SELECT $column FROM $table WHERE username ='$username'";
		$result = $db->query($sql);
		$row = $db->fetch_array($result);
	    return $row[$column];
		}
	public function  u_score($username = ' ' ){
		global $db;
		$sql = "SELECT pass FROM tbl_score WHERE username ='$username'";
		$result = $db->query($sql);
		$row = $db->fetch_array($result);
	    return $row['pass'];
		}
		public function  comfirm($status = ' ' ){
		global $db;
		if($status =='success'){
			return '<div class="suc"><i class="fa fa-smile-o fa-lg"></i> You successfully inserted data to the database.</div>';
		}elseif($status =='erro'){
			return '<div class="erro"><i class="fa fa-warning fa-lg"></i> Invalid content, please resend a valid data.</div>';
			}elseif($status =='update'){
	     return '<div class="update"><i class="fa fa-smile-o fa-lg"></i> You successfully updated data in the databasa.</div>';
		}elseif($status =='del'){
			return '<div class="suc"><i class="fa fa-smile-o fa-lg"></i> You successfully removed data from database.</div>';
		}
		}
}
function excel_csv($sql =' ')
{
    $rec = mysql_query($sql) or die (mysql_error());
	 $header='';
	  $data='';
   
    $num_fields = mysql_num_fields($rec);
   
    for($i = 0; $i < $num_fields; $i++ )
    {
        $header .= mysql_field_name($rec,$i)."\t";
    }
   
    while($row = mysql_fetch_row($rec))
    {
        $line = '';
        foreach($row as $value)
        {                                           
            if((!isset($value)) || ($value == ""))
            {
                $value = "\t";
            }
            else
            {
                $value = str_replace( '"' , '""' , $value );
                $value = '"' . $value . '"' . "\t";
            }
            $line .= $value;
        }
        $data .= trim( $line ) . "\n";
    }
   
    $data = str_replace("\r" , "" , $data);
   
    if ($data == "")
    {
        $data = "\n No Record Found!\n";                       
    }
   
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=reports.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    echo "$header\n$data";
}

$fn = new Fn();
//echo $fn->question_limit();
?>