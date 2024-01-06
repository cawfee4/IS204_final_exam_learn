    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form method="get">
            <label for="macd">Ma cong dan</label>
            <input type="text" name="macd"/>
            <label for="tencd">Ten cong dan</label>
            <input type="text" name="tencd"/>
            <label for="gioitinh">Gioi tinh</label>
            <input type="checkbox" name="gioitinh"/>
            <label for="namsinh">Nam sinh</label>
            <input type="date" name="namsinh"/>
            <label for="nuocve">Nuoc ve</label>
            <input type="text" name="nuocve"/>
            <label for="tendcl">Ten diem cach ly</label>
            <select name="tendcl">
                <?php
                include '../connect.php';
                $sql = "SELECT * FROM DIEMCACHLY";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<option value='".$row['MaDiemCachLy']."'>".$row['TenDiemCachLy']."</option>";
                    }
                }
                ?>
            </select>
            <input type="submit" value="them" name="them" id="them"/>
        </form>
        <?php
        if(isset($_GET['them']) && $_GET['them'] === 'them'){
            $macd = $_GET['macd'];
            $tencd = $_GET['tencd'];
            $gioitinh = isset($_GET['gioitinh']) ? 'nam' : 'nu';
            $namsinh = $_GET['namsinh'];
            $nuocve = $_GET['nuocve'];
            $tendcl = $_GET['tendcl'];
            $sql = "INSERT INTO CONGDAN VALUES ('$macd', '$tencd', '$gioitinh', '$namsinh', '$nuocve', '$tendcl')";
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