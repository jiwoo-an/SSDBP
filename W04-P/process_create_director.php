<?php
  $link = mysqli_connect("localhost", "root", "ghd1006", "fav");
  $filtered = array(
    'name' => mysqli_real_escape_string($link, $_POST['name'])
  );
  $query = "
    INSERT INTO director (
      name
      ) VALUES (
        '{$filtered['name']}'
        )
  ";

  $result = mysqli_query($link, $query);
  if ($result == false) {
      echo '저장하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
      errror_log(mysqli_error($link));
  } else {
      header('Location: director.php');
  }
