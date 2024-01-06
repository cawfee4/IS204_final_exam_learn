<?php
function xoa(){
    include "../connect.php";
    $macd = $_GET['macd'];
    $sql = "DELETE FROM CONGDAN WHERE MaCongDan = '$macd'";
    $result = $conn->query($sql);
    if($result){
        echo "Xoa thanh cong";
    }else{
        echo "Xoa that bai";
    }

}
function loadTable(){
    include "../connect.php";
    $sql = "SELECT * FROM CONGDAN";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $i=1;
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$i++."</td>";
            echo "<td>".$row['TenCongDan']."</td>";
            echo "<td>".$row['GioiTinh']."</td>";
            echo "<td>".$row['NamSinh']."</td>";
            echo "<td>".$row['NuocVe']."</td>";
            echo "<td><a href='sua.php?macd=".$row['MaCongDan']."'>Sua</a><button></button></td>";
            echo "</tr>";
            $i++;
        }
    }
}
?>