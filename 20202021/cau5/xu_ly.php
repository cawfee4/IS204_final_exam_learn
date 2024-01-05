<?php
function loadTable(){
    include '../connect.php';
    $slbd = $_GET['slbd'];
    $sql = "SELECT KH.HOTENKH, XE.SOXE, COUNT(CT_BD.MABD) AS SLBD
    FROM KHACHHANG KH, BAODUONG BD, CT_BD, XE
    WHERE KH.MAKH = XE.MAKH AND XE.SOXE = BD.SOXE AND CT_BD.MABD = BD.MABD 
    GROUP BY XE.SOXE
    HAVING SLBD > $slbd";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        $index = 1;
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$index++."</td>";
            echo "<td>".$row['HOTENKH']."</td>";
            echo "<td>".$row['SOXE']."</td>";
            echo "<td>".$row['SLBD']."</td>";
            echo "</tr>";
        }
    }
}
if(isset($_GET['slbd'])){
    loadTable();
}
?>