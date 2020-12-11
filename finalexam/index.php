<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 서울시 코로나19 확진자 현황 </title>
</head>
<body>
    <h1> 서울시 코로나19 확진자 현황 </h1>
    <form action="dateconditions.php" method="POST">
      (1) 서울시 일별 확진자 정보
      <input type="text" name="date" placeholder="mm.dd. ex)1.1. or 01.01.">
      <input type="submit" value="Search">
    </form>
    <a href="gu_sum.php"> (2) 서울시 구별 누적 확진자 수 </a><br>
    <a href="conditions.php"> (3) 서울시 확진자 대비 완치자 사망자 수 </a><br>
    <form action="travel.php" method="POST">
      (4) 확진자 여행력 정보
      <input type="text" name="trhistory" placeholder="country name">
      <input type="submit" value="Search">
    </form>
</body>
</html>
