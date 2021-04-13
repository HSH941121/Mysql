<?php
  $conn = mysqli_connect('localhost:3307','hsh123','1234','opentutorials');
  $sql = "select * from topic";
  $result = mysqli_query($conn,$sql);
  //$row = mysqli_fetch_array($result);

  while($row = mysqli_fetch_array($result)){
    echo '<h2>'.$row['TITLE'].'<h2>';
  }
 ?>
