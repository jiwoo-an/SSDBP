<?php
  $link = mysqli_connect("localhost", "root", "ghd1006", "fav");
  $filtered = array(
    'title' => mysqli_real_escape_string($link, $_POST['title']),
    'mainactors' => mysqli_real_escape_string($link, $_POST['mainactors']),
    'director_id' => mysqli_real_escape_string($link, $_POST['director_id'])
  );
  $query = "
    INSERT INTO film (
      title, mainactors, director_id
      ) VALUE (
        '{$filtered['title']}',
        '{$filtered['mainactors']}',
        '{$filtered['director_id']}'
        )
  ";

  $result = mysqli_multi_query($link, $query);
  if ($result == false) {
      echo '저장하는 과정에서 문제가 발생했습니다. 관라자에게 문의하세요.';
      echo mysqli_error($link);
  } else {
      echo '성공했습니다. <a href="index.php">돌아가기</a>';
  }
