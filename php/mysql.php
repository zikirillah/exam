<?php
class Mysql{
private $connection;

function __construct(){
$this->open_connection();
   }

public function open_connection(){
$this->connection=mysql_connect("localhost","root","");
if(!$this->connection){
die("could not connect to the server  :".mysql_error());
      }else{
$db_select=mysql_select_db("mypro",$this->connection);
if(!$db_select){
die("could not connect to the database : ".mysql_error());
             }
           }
  }

public function close(){
if(isset($this->connection)){
 mysql_close($this->connection);
  unset($this->connection);
      }
    }

public function query($sql){
$result=mysql_query($sql,$this->connection);
$this->comfirm_query($result);
   return $result;
    }

private function comfirm_query($result){
if(!$result){
die("database query fail : ".mysql_error());
           }
}

public function fetch_array($result){
  return mysql_fetch_array($result);
    }

public function num_row($result){
  return mysql_num_rows($result);
    }
	
 public function redirect($result){
  return header('location:'.$result);
    }


}
$db= new Mysql();
//$db->close_connection();
?>