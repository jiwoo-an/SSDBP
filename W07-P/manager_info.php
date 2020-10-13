<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'employees');
    
    if(mysqli_connect_errno()){
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }

    $query = "
        SELECT m.dept_no, d.dept_name, m.emp_no, e.first_name, e.last_name
        FROM dept_manager m
        INNER JOIN departments d on d.dept_no=m.dept_no
        INNER JOIN employees e on e.emp_no=m.emp_no
        ORDER BY dept_no;
    ";
    $result = mysqli_query($link, $query);

    $article = '';
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= $row['dept_no'];
        $article .= '</td><td>';
        $article .= $row['dept_name'];
        $article .= '</td><td>';
        $article .= $row['emp_no'];
        $article .= '</td><td>';
        $article .= $row['first_name'];
        $article .= '</td><td>';
        $article .= $row['last_name'];
        $article .= '</td></tr>';
    }

    mysqli_free_result($result);
    mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 부서 담당자 조회 </title>
    <style>
        body{
            font-family: Consolas, monospace;
            font-family: 12px;
        }
        table{
            width: 100%;
        }
        th,td{
            padding: 10px;
            border-bottom: 1px solid #dadada;
        }
    </style>
</head>
<body>
        <h2><a href="index.php">직원 관리 시스템</a> | 부서 담당자 조회</h2>
        <table>
            <tr>
                <th>dept_no</th>
                <th>dept_name</th>
                <th>emp_no</th>
                <th>first_name</th>
                <th>last_name</th>
            </tr>
            <?= $article ?>
        </table>
</body>
</html>