<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" action="#">
        <label for="mahd">Ma hop dong</label>
        <input type="text" name="mahd"/>
        <br>
        <label for="tenhd">Ten hop dong</label>
        <input type="text" name="tenhd"/>
        <br>
        <label for="tenkh">Ten khach hang</label>
        <select name="tenkh">
            <?php
            include '../connect.php';
            $sql = "SELECT * FROM KHACHHANG";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<option value='".$row['MAKH']."'>".$row['HOTEN']."</option>";
                }
            }
            ?>
        </select>
        <br>
        <label for="tenxe">Ten xe</label>
        <select name="tenxe[]" multiple>
            <?php
            include '../connect.php';
            $sql = "SELECT * FROM XE";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<option value='".$row['MAXE']."'>".$row['TENXE']."</option>";
                }
            }
            ?>
        </select>
        <br>
        <label for="sotien">So tien</label>
        <input type="number" name="sotien"/>
        <br>
        <input type="submit" value="thue" name="thue"/>
    </form>
    <?php
    if(isset($_GET['thue']) && $_GET['thue']==="thue"){
        include '../connect.php';
        $mahd = $_GET['mahd'];
        $tenhd = $_GET['tenhd'];
        $tenkh = $_GET['tenkh'];
        $tenxe_selected = $_GET['tenxe'];
        $sotien = $_GET['sotien'];
        foreach ($tenxe_selected as $selected_value) {
            $sql1 = "INSERT INTO HOADON VALUES ('$mahd', '$tenhd', '$tenkh', '$selected_value', '$sotien')";
            $sql2 = "INSERT INTO CTHD VALUES ('$mahd', '$selected_value')";
            $result1 = $conn->query($sql);
            $result2 = $conn->query($sql);
            if($result1 && $result2){
                echo "Them thanh cong";
            }else{
                echo "Them that bai";
            }
        }        
    }
    ?>
</body>
</html>