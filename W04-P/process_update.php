<?php
  $link = mysqli_connect("localhost", "root", "ghd1006", "fav");
  $filtered = array(
    'id' => mysqli_real_escape_string($link, $_POST['id']),
    'title' => mysqli_real_escape_string($link, $_POST['title']),
    'mainactors' => mysqli_real_escape_string($link, $_POST['mainactors'])
  );
  $query = "
    UPDATE film
    SET
      title = '{$filtered['title']}',
      mainactors = '{$filtered['mainactors']}'
    WHERE
      id = '{$filtered['id']}'
  ";

  $result = mysqli_multi_query($link, $query);
  if ($result == false) {
      echo '수정하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
      errror_log(mysqli_error($link));
  } else {
      echo '성공했습니다. <a href="index.php">돌아가기</a>';
  }
