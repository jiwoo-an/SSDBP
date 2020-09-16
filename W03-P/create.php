<?php
  $link = mysqli_connect('localhost', 'root', 'ghd1006', 'fav');
  $query = "SELECT * FROM film";
  $result = mysqli_query($link, $query);
  $list = '';
  while ($row = mysqli_fetch_array($result)) {
      $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

  $article = array(
    'title' => 'Welcome',
    'mainactors' => 'I love 90s movie because of the mood. Let me introduce my favorite 90s high-teen film!<br>
    The order is meaningless, I love these equally♡'
  );

  if (isset($_GET['id'])) {
      $query = "SELECT * FROM film WHERE id={$_GET['id']}";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      $article = array(
      'title' => $row['title'],
      'mainactors' => $row['mainactors']
    );
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>90s High-Teen Film</title>
  </head>
  <body>
    <h1><a href="index.php">Favorite 90s High-Teen Film</h1>
    <ul> <?= $list ?> </ul>
    <form action="process_create.php" method="POST">
      <p><input type="text" name="title" placeholder="title"></p>
      <p><textarea name="mainactors" placeholder="mainactors"></textarea></p>
      <p><input type="submit"></p>
    </form>
  </body>
</html>
