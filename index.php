<?php
  $conn = mysqli_connect('localhost:3307','hsh123','1234','opentutorials');
  $sql = "select * from topic";
  $result = mysqli_query($conn,$sql);
  $list = '';
  //$row = mysqli_fetch_array($result);

  while($row = mysqli_fetch_array($result)){
    $escapetitle = htmlspecialchars($row['TITLE']);
    $list = $list."<li><a href=\"index.php?id={$row['ID']}\">{$escapetitle}</a></li>";
  }

  $article = array('title' => 'Welcome','description' => 'Hello web', 'name' => '');
  $updatelink = '';
  $deletelink = '';
  $author = '';
if(isset($_GET['id'])) {
  $updatelink = '<a href="update.php?id='.$_GET['id'].'">update</a>';
  $deletelink = '
        <form action="delete_pro.php" method="post">
          <input type="hidden" name="id" value="'.$_GET['id'].'">
          <input type="submit" value="delete">
        </form>
        ';
  $filtered_id = mysqli_real_escape_string($conn,$_GET['id']);
  $sql = "select * from topic left join author on topic.author_id = author.id where topic.id = {$filtered_id}";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $article['title'] = htmlspecialchars($row['TITLE']);
  $article['description'] = htmlspecialchars($row['DESCRIPTION']);
  $article['name'] = htmlspecialchars($row['name']);
  $author = 'by '.$article['name'];
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
    <h1><a href="index.php">WEB</a></h1>
    <ol>
      <?= $list ?>
    </ol>
    <a href="create.php">create</a>
    <?= $updatelink ?>
    <?= $deletelink ?>
    <h2><?= $article['title']?></h2>
    <?= $article['description']?>
    <!-- <p> by <?= $article['name'] ?> </p> -->
    <p> <?= $author ?> </p>
  </body>
</html>
