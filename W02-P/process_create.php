<?php
  $link = mysqli_connect("localhost", "root", "ghd1006", "fav");
  $query = "
    INSERT INTO film (
      title, mainactors
      ) VALUES (
        '{$_POST['title']}',
        '{$_POST['mainactors']}'
        )
  ";

  $result = mysqli_query($link, $query);
  if($result == false){
    echo '저장하는 과정에서 문제가 발생했습니다. 관라자에게 문의하세요.';
    echo mysqli_error($link);
  } else {
    echo '성공했습니다. <a href="index.php">돌아가기</a>';
  }
?>
