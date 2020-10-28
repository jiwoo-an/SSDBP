<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
    $filtered_id = mysqli_real_escape_string($link, $_POST['category']);   

    $query = "SELECT c.category_id, c.name, f.film_id, f.title
              FROM film_category fc
              INNER JOIN category c on c.category_id=fc.category_id
              INNER JOIN film f on f.film_id=fc.film_id
              WHERE c.name='{$filtered_id}'";
    $result = mysqli_query($link, $query);

    $article = '';
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= $row['category_id'];
        $article .= '</td><td>';
        $article .= $row['name'];
        $article .= '</td><td>';
        $article .= $row['film_id'];
        $article .= '</td><td>';
        $article .= $row['title'];
        $article .= '</td></tr>';
    }

    mysqli_free_result($result);
    mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> DVD 정보 조회 </title>
</head>
<body>
        <h2><a href="index.php">DVD 정보 조회</a> | 카테고리별 검색</h2>
        <table border="1">
            <tr>
                <th>c_id</th>
                <th>category</th>
                <th>film_id</th>
                <th>title</th>
            </tr>
            <?= $article ?>
        </table>
</body>
</html>