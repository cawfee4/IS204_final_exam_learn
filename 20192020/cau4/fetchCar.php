<?php
include '../connect.php';
if(isset($_GET['sl'])){
    $sl = $_GET['sl'];
    $sql = "SELECT XE.TENXE,COUNT(XE.MAXE) AS SLT FROM XE,CTHD WHERE XE.MAXE = CTHD.MAXE GROUP BY XE.TENXE LIMIT $sl";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row['TENXE']."</td>";
            echo "<td>".$row['SLT']."</td>";
            echo "</tr>";
        }
    }
}
?>