<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include "../connect.php";
    if(isset($_POST["submit"]) && $_POST["submit"] === "Thêm"){
        $makh= $_POST["makh"];
        $tenkh= $_POST["tenkh"];
        $sdt = $_POST["sdt"];
        $cccn = $_POST["cccn"];
        $sql = "INSERT into khachhang(makh,tenkh,sdt,cccn) values('$makh','$tenkh','$sdt','$cccn')";
        $result = $conn->query($sql);
        if($result) {
            echo "them thanh cong";
        }else{
            echo "them that bai";
        }
    }
    ?>
    <form method="POST">
        <label for="makh">Ma khach hang</label>
        <input type="text" name="makh" id="makh">
        <label for="tenkh">Ten khach hang</label>
        <input type="text" name="tenkh" id="tenkh">
        <label for="sdt">So dien thoai</label>
        <input type="text" name="sdt" id="sdt">
        <label for="cccn">Can cuoc cong nhan</label>
        <input type="text" name="cccn" id="cccn">
        <input type="submit" name="submit" value="Thêm"/>
    </form>
</body>
</html>