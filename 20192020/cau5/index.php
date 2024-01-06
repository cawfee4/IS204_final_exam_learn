<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script>
    function fetchTable(){
        var mahd = $('#mahd').val();
        $.ajax({
            url: 'xu_ly.php',
            type: 'get',
            data: {
                action: "fetchTable",
                mahd:mahd
            },
            success: function(response){
                $('#car-table tbody').html(response);
            }
        })
    }
    function fetchHD(){
        var makh = $('#tenkh').val();
        $.ajax({
            url: 'xu_ly.php',
            type: 'get',
            data: {
                action: "fetchHD",
                makh:makh
            },
            success: function(response){
                $('#mahd').html(response);
                fetchTable();
            }
        })
    }
    function xoaXe(mahd){
        $.ajax({
            url: 'xu_ly.php',
            type: 'get',
            data: {
                action: "xoaXe",
                mahd:mahd
            },
            success: function(response){
                fetchTable();
            }
        
        })
    }
    $(document).ready(function(){
        $('#tenkh').change(function(){
            fetchHD();
        })
    })
</script>
<body>
    <label for="tenkh">Ten Khach hang</label>
    <select name="tenkh" onchange="fetchHD()">
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
    <label for="mahd">Ma hop dong</label>
    <select name="mahd"></select>
    <h4>Danh sach cac xe</h4>
    <table id="car-table">
        <thead>
            <tr>
                <th>Ten xe</th>
                <th>Chuc nang</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</body>
</html>