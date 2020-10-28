<?php
  $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
  $query = "SELECT f.film_id, f.title, count(i.inventory_id)
            FROM film f
            INNER JOIN inventory i on i.film_id=f.film_id
            GROUP BY f.film_id";
  $result = mysqli_query($link, $query);

  $dvd_invent = '';
  while($row = mysqli_fetch_array($result)) {
    $dvd_invent .= '<tr>';
    $dvd_invent .= '<td>'.$row['film_id'].'</td>';
    $dvd_invent .= '<td>'.$row['title'].'</td>';
    $dvd_invent .= '<td>'.$row['count(i.inventory_id)'].'</td>';
    $dvd_invent .= '</tr>';
  }  
  
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>DVD 정보 조회</title>
</head>

<body>
    <h2><a href="index.php">DVD 정보 조회</a> | DVD 재고 조회 </h2>
    <table border="1">
        <tr>
            <th>film_id</th>
            <th>title</th>
            <th>inventory</th>
        </tr>
        <?=$dvd_invent?>
    </table>
</body>

</html>