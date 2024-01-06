<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Them khach hang</h2>
    <form method="get">
        <label for="makh">Ma khach hang</label>
        <input type="text" name="makh"/>
        <br>
        <label for="hoten">Ho ten</label>
        <input type="text" name="hoten"/>
        <br>
        <label for="sdt">Dien thoai</label>
        <input type="text" name="sdt"/>
        <br>
        <input type="submit" value="them" name="them"/>
    </form>
    <?php
    if(isset($_GET['them']) && $_GET['them']==="them"){
        include '../connect.php';
        $makh = $_GET['makh'];
        $hoten = $_GET['hoten'];
        $sdt = $_GET['sdt'];
        $sql = "INSERT INTO KHACHHANG VALUES ('$makh', '$hoten', '$sdt')";
        $result = $conn->query($sql);
        if($result){
            echo "Them thanh cong";
        }
        else{
            echo "Them that bai";
        }
    }
    ?>
</body>
</html>