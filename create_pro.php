<?php
  $conn = mysqli_connect('localhost:3307','hsh123','1234','opentutorials');
  $filterd = array('title' => mysqli_real_escape_string($conn,$_POST['title']),'description' => mysqli_real_escape_string($conn,$_POST['description']));

  $sql = "insert into topic (title,description,created) values ('{$filterd['title']}','{$filterd['description']}',now())";
  $result = mysqli_query($conn,$sql);
  if($result === false) {
    echo "저장에 실패 했습니다.";
    error_log(mysqli_error($conn));
  }
  else{
    echo "성공했습니다. <a href='index.php'>돌아가기</a>";
  }
  echo $sql;
 ?>
