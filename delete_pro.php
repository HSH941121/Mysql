<?php
  $conn = mysqli_connect('localhost:3307','hsh123','1234','opentutorials');
  $filterd = array('id' => $_POST['id']);

  $sql = "delete from topic where id = '{$filterd['id']}'";
  $result = mysqli_query($conn,$sql);
  if($result === false) {
    echo "삭제에 실패 했습니다.";
    error_log(mysqli_error($conn));
  }
  else{
    echo "성공했습니다. <a href='index.php'>돌아가기</a>";
  }
  echo $sql;
 ?>
