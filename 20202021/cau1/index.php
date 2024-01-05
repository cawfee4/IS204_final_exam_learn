<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Thêm khách hàng</h2>
    <br>
    <form method="GET" action="#">
        <label for="makh">Mã khách hàng</label>
        <input type="text" name="makh"/>
        <br>
        <label for="tenkh">Họ Tên khách hàng</label>
        <input type="text" name="tenkh"/>
        <br>
        <label for="diachi">Địa chỉ</label>
        <input type="text" name="diachi"/>
        <br>
        <label for="sdt">điện thoại</label>
        <input type="text" name="sdt"/>
        <br>
        <input type="submit" id="them" value="thêm" name="thêm"/>
    </form>
    <?php
    include '../connect.php';
    if(isset($_GET['them']) && $_GET['thêm'] === 'thêm'){
        $makh = $_GET['makh'];
        $tenkh = $_POST['tenkh'];
        $diachi = $_GET['diachi'];
        $sdt = $_GET['sdt'];
        $sql = "INSERT INTO KHACHHANG VALUES('$makh', '$tenkh', '$diachi', '$sdt')";
        echo $sql;
        $result = $conn->query($sql);
        if($result){
            echo "Thêm thành công";
        }else{
            echo "Thêm thất bại";
        }
    }
    ?>
</body>
</html>