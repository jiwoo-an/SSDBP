<?php
  $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
  $query = "SELECT f.film_id, f.title, f.description, l.name, f.length, f.replacement_cost, f.special_features 
            FROM film f
            INNER JOIN language l on l.language_id=f.language_id";
  $result = mysqli_query($link, $query);

  $dvd_info = '';
  while($row = mysqli_fetch_array($result)) {
    $dvd_info .= '<tr>';
    $dvd_info .= '<td>'.$row['film_id'].'</td>';
    $dvd_info .= '<td>'.$row['title'].'</td>';
    $dvd_info .= '<td>'.$row['description'].'</td>';
    $dvd_info .= '<td>'.$row['name'].'</td>';
    $dvd_info .= '<td>'.$row['length'].'</td>'; 
    $dvd_info .= '<td>'.$row['replacement_cost'].'</td>';
    $dvd_info .= '<td>'.$row['special_features'].'</td>';
    $dvd_info .= '</tr>';
  }  
  
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>DVD 정보 조회</title>
</head>

<body>
    <h2><a href="index.php">DVD 정보 조회</a> | DVD 전체 조회 </h2>
    <table border="1">
        <tr>
            <th>film_id</th>
            <th>title</th>
            <th>description</th>
            <th>language</th>
            <th>length</th>
            <th>replacement_cost</th>
            <th>special_features</th>
        </tr>
        <?=$dvd_info?>
    </table>
</body>

</html>