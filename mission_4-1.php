<?php
header('Content-Type: text/html; charset=UTF-8');
$dsn  =  'データベース名';
$user  =  'ユーザー名';
$password  =  'パスワード';
$pdo  =  new  PDO($dsn,$user,$password);


  $sql1=  "CREATE TABLE form(id INT PRIMARY KEY AUTO_INCREMENT,name char(32),comment TEXT,date datetime,pass char(32));";
  $stmt  =  $pdo->query($sql1);

  $sql = 'SELECT * FROM form';
  $results = $pdo ->query($sql);
$name = $_POST['name'];
$comment = $_POST['comment'];
$number = $_POST['number'];
$number2 = $_POST['number2'];
$number2sub = $_POST['number2sub'];
$passward = $_POST['passward'];
$passward1 = $_POST['passward1'];
$passward2 = $_POST['passward2'];

//通常動作
 if((!empty($name) or !empty($comment) or !empty($passward)) and empty($number2sub)){

 $sql2 = $pdo ->prepare("INSERT INTO form(name,comment,date,pass)VALUES(:name,:comment,NOW(),:pass)");
 $sql2 -> bindParam(':name',$name,PDO::PARAM_STR);
 $sql2 -> bindParam(':comment',$comment,PDO::PARAM_STR);
 $sql2 -> bindParam(':pass',$passward,PDO::PARAM_STR);

 $sql2 -> execute();
}

//削除機能
if(!empty($number)){ 
 $sql3 = 'SELECT * FROM form';
 $results = $pdo ->query($sql3);
 $data=$results->fetchAll();
 foreach($data as $row){
    if($row['id']==$number){
       if($row['pass'] == $passward1){
	 $sql4="delete from form where id= $number";
	 $result=$pdo->query($sql4);
       }
       else{
         $error = "パスワードが違います！";
       }
    }
 }

}


//編集機能１
if(!empty($number2)){
 $sql4 = 'SELECT * FROM form';
 $results = $pdo ->query($sql4);
 $data=$results->fetchAll();
 foreach($data as $row){
    if($row['id']==$number2){
      if($row['pass'] == $passward2){
       $edit0 =$row['id']; 
       $edit1 =$row['name'] ;
       $edit2 =$row['comment'] ;
      }
      else{ $error = "パスワードが違います！";
      }
     }
   }
}


 ?>

<html>
<body>
<form  method = "post" >
<input type = "text" name = 'name' placeholder = "名前" value = "<?php echo $edit1; ?>" size = "20">
<br>
<input type = "text" name = 'comment' placeholder = "コメント" value = "<?php echo $edit2; ?>"size = "20">
<br>
<input = type "text" name = "passward" placeholder = "パスワード">
<input type = "submit"value = "送信" >
<input type ="text" name = 'number2sub' style ="visibility:hidden" value= <?php echo $edit0;?> >
<br>
<?php echo $error; ?>
<br>
 <input type = "text" name = "number" placeholder = "削除行番号" size = "20">
<br>
<input = type "text" name = "passward1" placeholder = "パスワード">
<input type = "submit"value = "削除" >
<br>
<input type = "text" name = "number2" placeholder = "編集行番号" size = "20">
<br>
<input = type "text" name = "passward2" placeholder = "パスワード">
<input type = "submit"value = "編集" >
</form>
</body>



<?php

//編集機能２
if(!empty($number2sub)){
 $sql4 = 'SELECT * FROM form';
 $results = $pdo ->query($sql4);
 $data=$results->fetchAll();
  foreach($data as $row){
    if($row['id']==$number2sub){
      $sql5 = "update form set name = '$name',comment = '$comment' where id = $number2sub";
      $result = $pdo->query($sql5);
     }
   }
}

//フォームに表示
$sql0 = 'SELECT * FROM form';
$results = $pdo ->query($sql0);
$results -> execute();

$data=$results->fetchAll();

if($data !==false){
 foreach($data as $row){
  echo $row['id'].',';
  echo $row['name'].',';
  echo $row['comment'].',';
  echo $row['date'].'<br>';
 }
}
else
{
 echo "まだ書き込みはありません。";
}

?>
<html>
