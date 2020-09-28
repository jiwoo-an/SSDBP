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
  $update_link = '';
  $delete_link = '';
  $director = '';

  if (isset($_GET['id'])) {
      $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
      $query = "SELECT * FROM film LEFT JOIN director ON film.director_id = director.id WHERE film.id={$filtered_id}";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      $article['title'] = htmlspecialchars($row['title']);
      $article['mainactors'] = htmlspecialchars($row['mainactors']);
      $article['name'] = htmlspecialchars($row['name']);

      $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
      $delete_link = '
      <form action="process_delete.php" method="POST">
        <input type="hidden" name="id" value="'.$_GET['id'].'">
        <input type="submit" value="delete">
      </form>
      ';
      $director = "<p>by {$article['name']}</p>";
  }
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> 90s High-Teen Film </title>
</head>
<body>
  <h1><a href="index.php">Favorite 90s High-Teen Film</h1>
  <a href="director.php">director</a>
  <ul> <?= $list ?> </ul>
  <a href="create.php">create</a>
  <?=$update_link ?>
  <?=$delete_link ?>
  <h2> <?= $article['title']?> </h2>
   <?= $article['mainactors'] ?>
   <?=$director ?>
</body>
</html>
