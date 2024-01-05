<?php
function loadTable($type){
    include "../connect.php";
    if($type==="get-available-room"){
        $sql = "SELECT * from phong where TINHTRANG ='Trong'";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            $index = 1;
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$index++."</td>";
                echo "<td>".$row['MAPHONG']."</td>";
                echo "<td>".$row['TINHTRANG']."</td>";
                echo "<td><button type='button' onclick=\"them('" . $row['MAPHONG'] . "')\">Thêm</button></td>";
                echo "</tr>";
            }
        }
    }else if($type==="get-booked-room"){
        $sql = "SELECT * from phong where TINHTRANG ='Co khach'";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            $index=1;
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$index++."</td>";
                echo "<td>".$row['MAPHONG']."</td>";
                echo "<td>".$row['TINHTRANG']."</td>";
                echo "<td><button type='button' onclick=\"xoa('".$row['MAPHONG']."')\">Xóa</button></td>";
                echo "</tr>";
            }
        }

    }
}
function them(){
    include "../connect.php";
    $maphong = $_GET['maphong'];
    $sql = "UPDATE PHONG SET TINHTRANG='Co khach' WHERE MAPHONG='$maphong'";
    $conn->query($sql);

}
function xoa(){
    include "../connect.php";
    $maphong = $_GET['maphong'];
    $sql = "UPDATE phong SET TINHTRANG='trong' WHERE MAPHONG='$maphong'";
    $conn->query($sql);
}
// if(isset($_PUT['action']) && $_PUT['action']==='remove-room'){
//     xoa();
// }
if(isset($_GET['action'])){
    switch($_GET['action']){
        case 'get-available-room':
            loadTable('get-available-room');
            break;
        case 'get-booked-room':
            loadTable('get-booked-room');
            break;
        case 'add-room':
            them();
            break;
        case 'delete-room':
            xoa();
            break;
    }
}
?>