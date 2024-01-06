<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" action="#">
        <label for="MaDCL">Ma diem cach ly</label>
        <input type="text" name="MaDCL"/>
        <br>
        <label for="TenDCL">Ten diem cach ly</label>
        <input type="text" name="TenDCL"/>
        <br>
        <label for="DiaChi">Dia chi</label>
        <input type="text" name="DiaChi"/>
        <br>
        <label for="succhua">Suc chua</label>
        <input type="text" name="succhua"/>
        <br>
        <input type="submit" id="them" value="them" name="them"/>
    </form>
    <?php
    if(isset($_GET['them']) && $_GET['them'] === 'them'){
        $madcl = $_GET['MaDCL'];
        $tendcl = $_GET['TenDCL'];
        $diachi = $_GET['DiaChi'];
        $succhua = $_GET['succhua'];
        $sql = "INSERT INTO DIEMCACHLY VALUES ('$madcl', '$tendcl', '$diachi', '$succhua')";
        $result = $conn->query($sql);
        if($result){
            echo "Them thanh cong";
        }else{
            echo "Them that bai";
        }
    }
    ?>
</body>
</html>