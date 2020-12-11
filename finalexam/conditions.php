<?php
    $link = mysqli_connect('localhost', 'dbpt08', 'ssfinal8!', 'dbpt08');

    $query_tot = "
        SELECT *
        FROM covidseoul
    ";

    $query_dis = "
        SELECT *
        FROM covidseoul
        WHERE 상태 = '퇴원';
    ";

    $query_dead = "
        SELECT *
        FROM covidseoul
        WHERE 상태 = '사망';
    ";

    $result_tot = mysqli_query($link, $query_tot);
    $count_tot = mysqli_num_rows($result_tot);

    $result_dis = mysqli_query($link, $query_dis);
    $count_dis = mysqli_num_rows($result_dis);

    $result_dead = mysqli_query($link, $query_dead);
    $count_dead = mysqli_num_rows($result_dead);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Conditions</title>
        <style>
        body {
            font-family: Consolas, monospace;
            font-family: 16px;
        }
        table {
            width: 100%;
            text-align: center;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #dadada;
        }
    </style>
    </head>
    <body>
        <h1><a href="conditions.php">서울시 확진자 대비 완치자 사망자 수</a></h1>
        <p><a href="index.php">서울시 코로나19 확진자 현황</a></p>

        <table>
            <tr>
                <th>서울시 내 총 확진자 수</th>
                <th>완치자 수</th>
                <th>사망자 수</th>
            </tr>
            <tr>
                <td><?= $count_tot ?></td>
                <td><?= $count_dis ?>(<?= $count_dis/$count_tot ?>%)</td>
                <td><?= $count_dead ?>(<?= $count_dead/$count_tot ?>%)</td>
            </tr>
        </table>
    </body>
</html>
