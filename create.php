<?php
  $conn = mysqli_connect('localhost:3307','hsh123','1234','opentutorials');
  $sql = "select * from topic";
  $result = mysqli_query($conn,$sql);
  $list = '';
  //$row = mysqli_fetch_array($result);

  while($row = mysqli_fetch_array($result)){
    $list = $list."<li><a href=\"index.php?id={$row['ID']}\">{$row['TITLE']}</a></li>";
  }

  $article = array('title' => 'Welcome','description' => 'Hello web');
if(isset($_GET['id'])) {
  $filtered_id = mysqli_real_escape_string($conn,$_GET['id']);
  $sql = "select * from topic where id = {$filtered_id}";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $article['title'] = $row['TITLE'];
  $article['description'] = $row['DESCRIPTION'];
  print_r($article);
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
  </head>
  <body>
    <h1>WEB</h1>
    <ol>
      <?= $list ?>
    </ol>
    <form class="" action="create_pro.php" method="post">
      <p><input type="text" name="title" value=""></p>
      <p><textarea name="description"></textarea></p>
      <p><input type="submit" name="" value="submit"></p>

    </form>
  </body>
</html>
