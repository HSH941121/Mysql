<?php
  $conn = mysqli_connect('localhost:3307','hsh123','1234','opentutorials');
  $filterd = array('title' => mysqli_real_escape_string($conn,$_POST['title']),'description' => mysqli_real_escape_string($conn,$_POST['description']), 'id' => $_POST['id']);

  $sql = "update topic set title = '{$filterd['title']}', description = '{$filterd['description']}' where id = '{$filterd['id']}'";
  $result = mysqli_query($conn,$sql);
  if($result === false) {
    echo "수정에 실패 했습니다.";
    error_log(mysqli_error($conn));
  }
  else{
    echo "성공했습니다. <a href='index.php'>돌아가기</a>";
  }
  echo $sql;
 ?>
