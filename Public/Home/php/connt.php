<?php 
header("Content-type: text/html; charset=utf-8"); 
require_once($_SERVER['DOCUMENT_ROOT']."/config/config.php");
$mydb = new mydb();
//mysqli 连接数据库
$mysqli_connt= array(
    'host'   => $mydb->MY_HOST,
    'db'     => "db_shop",
    'db_user'=> $mydb->MY_USER,
    'db_pwd' => $mydb->MY_PWD,
	);

$mysqli= @new mysqli($mysqli_connt['host'],$mysqli_connt['db_user'],$mysqli_connt['db_pwd']);
if($mysqli->connect_errno){
	echo "连接失败";
}
$mysqli->query("set names 'utf8';");
$select_db=$mysqli->select_db($mysqli_connt['db']);
/*if($select_db){
    echo "连接数据库成功";
}else{
	echo "连接数据库失败";
}*/

?>