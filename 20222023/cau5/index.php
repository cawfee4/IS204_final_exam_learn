<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Document</title>
</head>
<script>
    function loadTable(){
        var mahd = $("#mahd").val();
        $.ajax({
            url: 'xu_ly.php',
            type: 'GET',
            data: {
                action: 'loadTable',
                mahd: mahd
            },
            success: function(data){
                $("#room-table").html(data);
            }
        });
    }
    function loadHD(){
        var makh = $("#tenkh").val();
        $.ajax({
            url: 'xu_ly.php',
            type: 'GET',
            data: {
                action: 'loadHD',
                makh: makh
            },
            success: function(data){
                $("#mahd").html(data);
                loadTable();
            }
        });
    }
</script>
<body>
    <?php
    include '../connect.php';
    ?>
    <label for="tenkh">Tên khách hàng</label>
    <select name="tenkh" id="tenkh" onchange="loadHD()">
        <?php
        $sql = "SELECT * FROM KHACHHANG";
        if($result = $conn->query($sql)){
            while($row = $result->fetch_assoc()){
                echo "<option value='".$row['MAKH']."'>".$row['TENKH']."</option>";
            }
        }
        ?>
    </select>
    <br>
    <label for="mahd">Mã hóa đơn</label>
    <select name="mahd" id="mahd" onchange="loadTable()">
    </select>
    <h4 id="table-text">Danh sách các phòng trong hóa đơn</h4>
    <table id="room-table">

    </table>
</body>
</html>