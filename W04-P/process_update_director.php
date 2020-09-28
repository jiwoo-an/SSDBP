<?php
  $link = mysqli_connect("localhost", "root", "ghd1006", "fav");
  $filtered = array(
    'id' => mysqli_real_escape_string($link, $_POST['id']),
    'name' => mysqli_real_escape_string($link, $_POST['name'])
  );
  $query = "
    UPDATE director
    SET
      name = '{$filtered['name']}'
    WHERE
      id = '{$filtered['id']}'
  ";

  $result = mysqli_query($link, $query);
  if ($result == false) {
      echo '수정하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
      errror_log(mysqli_error($link));
  } else {
      header('Location: director.php?id='.$filtered['id']);
  }
