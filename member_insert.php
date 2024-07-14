<?php
//1. POSTデータ取得
$name   = $_POST["name"];
$email  = $_POST["email"];
$naiyou = $_POST["naiyou"];
$age    = $_POST["age"]; 
$auth_id= $_POST["auth_id"];

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO m_an_table(name,email,age,naiyou,indate,auth_id)VALUES(:name,:email,:age,:naiyou,sysdate(),:auth_id)");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':age', $age, PDO::PARAM_INT);        //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':auth_id', $auth_id, PDO::PARAM_INT);        //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("member_index.php");
}
?>
