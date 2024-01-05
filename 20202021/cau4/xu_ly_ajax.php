<?php
    function loadXe(){
        include "../connect.php";
        $sql = "SELECT xe.SOXE
        FROM XE, BAODUONG
        WHERE xe.SOXE = baoduong.SOXE
        AND baoduong.NGAYNHAN = '".$_GET['ngayNhanXe']."'";
        $result = $conn->query($sql);   
        while ($row = $result->fetch_assoc()){
            echo "<option value='".$row['SOXE']."'>".$row['SOXE']."</option>";
        }
        loadCongViec();
    }
    function loadCongViec(){
        include "../connect.php";
        $sql = "SELECT TENCV,DONGIA,CV.MACV, CT_BD.MABD
        FROM CONGVIEC CV, BAODUONG BD, CT_BD
        WHERE CV.MACV = CT_BD.MACV
        AND BD.MABD = CT_BD.MABD
        AND BD.SOXE = '".$_GET['soxe']."'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row['TENCV']."</td>";
            echo "<td>".$row['DONGIA']."</td>";
            echo "<td><button type='button' onclick='xoaCongViec(".$row['MACV'].",".$row['MABD'].")'>Xóa</button></td>";
            echo "</tr>";
        }
    }

    function xoaCongViec(){
        include "../connect.php";
        $sql = "DELETE FROM CT_BD WHERE MACV = '".$_GET['MACV']."' AND MABD = '".$_GET['MABD']."'";
        if($conn->query($sql)){
            echo "success";
        }
        
    }


    if(isset($_GET['action'])){
        switch($_GET['action']){
            case 'loadXe':
                loadXe();
                break;
            case 'loadCongViec':
                loadCongViec();
                break;
            case 'xoaCongViec':
                xoaCongViec();
                break;
        }
    }
?>