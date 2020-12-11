<?php
  $link = mysqli_connect("localhost","dbpt08","ssfinal8!","dbpt08");
  $query = "SELECT 여행력, 확진일, 지역, 상태 FROM covidseoul WHERE 여행력 REGEXP '{$_POST['trhistory']}'";
  $result = mysqli_query($link, $query);

  $travel_info = '';
    while($row = mysqli_fetch_array($result)) {
        $travel_info .= '<tr>';
        $travel_info .= '<td>'.$row['여행력'].'</td>';
        $travel_info .= '<td>'.$row['확진일'].'</td>';
        $travel_info .= '<td>'.$row['지역'].'</td>';
        $travel_info .= '<td>'.$row['상태'].'</td>';
        $travel_info .= '</tr>';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> covidseoul </title>
</head>
<body>
  <h1><a href="travel.php">확진자 여행력 정보</a></h1>
  <p><a href="index.php">서울시 코로나19 확진자 현황</a></p>
    <table border="1">
        <tr>
            <th>여행력</th>
            <th>확진일</th>
            <th>지역</th>
            <th>상태</th>
        </tr>
        <?=$travel_info?>
    </table>
</body>
</html>
