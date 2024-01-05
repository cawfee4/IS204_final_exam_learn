<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        Thêm thông tin xe khách hàng
    </h1>
    <form method="Get" action="#">
        <label for="hotenkh">Họ tên khách hàng</label>
        <select name="hotenkh" id="hotenkh">
            <?php
            include "../connect.php";
            $sql = "SELECT * FROM khachhang";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<option value='".$row['$MAKH']."'>'".$row['HOTENKH']."'</option>";
                }
            }
            ?>
        </select>
        <label for="soxe">So xe</label>
        <input type="text" name="soxe" id="soxe">
        <label for="hangxe">Hãng xe</label>
        <select name="hangxe" id="hangxe">
            <?php
            include "../connect.php";
            $sql = "SELECT * FROM hangxe";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<option value='".$row['$HANGXE']."'>'".$row['$HANGXE']."'</option>";
                }
            }
            ?>
        </select>
        <label for="namsx">Năm sản xuất</label>
        <input type="text" name="namsx" id="namsx">
        <input type="submit" value="thêm" name="them" id="them">
    </form>
    <?php
    include "../connect.php";
    if(isset($_GET['them']) && $_GET['them'] === 'thêm'){
        $makh = $_GET['hotenkh'];
        $soxe = $_GET['soxe'];
        $hangxe = $_GET['hangxe'];
        $namsx = $_GET['namsx'];
        $sql = "INSERT INTO XE VALUES('$soxe', '$hangxe', '$namsx', '$makh')";
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