<?php
if(isset($_GET['action'])){
    function fetchTable(){
        include '../connect.php';
        $mahd = $_GET['mahd'];
        $sql = "SELECT XE.TENXE, CTHD.MAHD FROM XE,CTHD WHERE XE.MAXE = CTHD.MAXE AND CTHD.MAHD = '$mahd'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['TENXE']."</td>";
                echo "<td><button onclick='xoaCongViec(\"".$row['MAHD']."\")'>Xoa</button></td>";
                echo "</tr>";
            }
        }
        $conn->close();
    };
    function fetchHD(){
        include '../connect.php';
        $makh = $_GET['makh'];
        $sql = "SELECT MAHD FROM HOPDONG WHERE MAKH = '$makh'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<option value='".$row['MAHD']."'>".$row['MAHD']."</option>";
            }
        }
        $conn->close();
    }
    function xoaXe(){
        include '../connect.php';
        $mahd = $_GET['mahd'];
        $sql2 = "DELETE FROM HOPDONG WHERE MAHD = '$mahd'";
        $sql = "DELETE FROM CTHD WHERE MAHD = '$mahd'";
        $conn->query($sql);
        $conn->query($sql2);
        $conn->close();
    }
    switch ($_GET['action']) {
        case 'fetchTable':
            fetchTable();
            break;
        case 'xoaCongViec':
            xoaCongViec();
            break;
        case 'fetchHD':
            fetchHD();
            break;

    }
}
?>