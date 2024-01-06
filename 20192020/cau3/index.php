<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Ten khach hang</th>
                <Th>So lan thue xe</Th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../connect.php';
            $sql = "SELECT HOTEN,COUNT(MAXE) AS SLTX FROM KHACHHANG,HOADON WHERE KHACHHANG.MAKH = HOADON.MAKH AND SLTX > 2 GROUP BY HOTEN";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td> ".$row['HOTEN']."</td>";
                    echo "<td> ".$row['SLTX']."</td>";
                }
            }
            ?>
        </tbody>
    </table>
</body>
</html>