<?php
if(isset($_GET['soluongkh'])){
    include '../connect.php';
    $soluongkh = $_GET['soluongkh'];
    $sql = "SELECT KH.MAKH, KH.TENKH, SUM(HD.TONGTIEN) AS TONGTIEN
    FROM HOADON HD, KHACHHANG KH
    WHERE HD.MAKH = KH.MAKH
    GROUP BY KH.MAKH
    ORDER BY TONGTIEN DESC
    LIMIT $soluongkh
    ";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        echo '<tr>';
        echo '<th>STT</th>';
        echo '<th>Mã khách hàng</th>';
        echo '<th>Tên khách hàng</th>';
        echo '<th>Tổng tiền</th>';
        echo '</tr>';
        $index = 1;
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$index++."</td>";
            echo "<td>".$row['MAKH']."</td>";
            echo "<td>".$row['TENKH']."</td>";
            echo "<td>".$row['TONGTIEN']."</td>";
            echo "</tr>";
        }
    }
}
?>