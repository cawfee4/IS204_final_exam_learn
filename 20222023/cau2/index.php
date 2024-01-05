<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_POST["submit"]) && $_POST["submit"] === "Thêm"){
        $makh = $_POST["tenkh"];
        $mahd = $_POST["mahd"];
        $tenhd = $_POST["tenhd"];
        $tongtien = $_POST["tongtien"];
        $sql = "INSERT into hoadon(mahd,tenhd,makh,tongtien) values('mahd','tenhd','makh','$tongtien')";
        $result = $conn->query($sql);
        if($result){
            echo "them thanh cong";
        }else{
            echo "them that bai";
        }
    }
    ?>
    <form method="POST">
        <table>
            <tr>
                <td>
                    <label for="tenkh">Tên khách hang</label>
                </td>
                <td>
                    <select name="tenkh" id="tenkh">
                    <?php
                    include "../connect.php";
                    $sql = "SELECT * from khachhang";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            echo "<option value='".$row["makh"]."'>".$row["tenkh"]."</option>";
                        }
                    
                    }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="mahd">Mã hóa đơn</label>
                </td>
                <td>
                    <input type="text" name="mahd" id="mahd">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tenhd">Tên hóa đơn</label>
                </td>
                <td>
                    <input type="text" name="tenhd" id="tenhd">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tongtien">Tong tien</label>
                </td>
                <td>
                    <input type="number" name="tongtien" id="tongtien"/> 
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Thêm"/>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>