<?php
function loadHD(){
    include '../connect.php';
    $makh = $_GET['makh'];
    $sql = "SELECT * FROM HOADON WHERE MAKH = '$makh'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            echo "<option value='".$row['MAHD']."'>".$row['MAHD']."</option>";
        }
    }
}
function loadTable(){
    include '../connect.php';
    $mahd = $_GET['mahd'];
    $sql = "SELECT P.MAPHONG, P.LOAIPHONG FROM PHONG P, HOADON HD, THUE TH
    WHERE P.MAPHONG = TH.MAPHONG AND TH.MAHD = HD.MAHD AND HD.MAHD = '$mahd'";
    $result = $conn->query($sql);

    if($result->num_rows>0){
        $index=1;
        echo '<tr>';
        echo '<th>STT</th>';
        echo '<th>Mã phòng</th>';
        echo '<th>Loại phòng</th>';
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$index++."</td>";
            echo "<td>".$row['MAPHONG']."</td>";
            echo "<td>".$row['LOAIPHONG']."</td>";
            echo "</tr>";
        }
    }
}
if(isset($_GET['action'])){
    switch($_GET['action']){
        case 'loadHD':
            loadHD();
            break;
        case 'loadTable':
            loadTable();
            break;
    }
}
?>