<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> DVD 정보 조회 </title>
</head>

<body>
    <h1> DVD 정보 조회 </h1>
    <a href="dvd_select.php">(1) DVD 전체 조회</a><br>
    <form action="category_select.php" method="POST">
        (2) 카테고리별 검색:
        <input type="text" name="category" placeholder="category">
        <input type="submit" value="Search">
    </form>
    <a href="dvd_inventory_now.php">(3) DVD 전체 재고 현황</a>
    
</body>

</html>