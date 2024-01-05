<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<script>
    function loadTable(){
        console.log('loading table');
        $.ajax({
            url: 'xu_ly.php',
            type: 'GET',
            data: {
                action: 'get-available-room'
            },
            success: function(data){
                $('#available-table tbody').html(data);
            }
        })
        $.ajax({
            url: 'xu_ly.php',
            type: 'GET',
            data: {
                action: 'get-booked-room'
            },
            success: function(data){
                $('#booked-table tbody').html(data);
            }
        })
    }
    $(document).ready(function(){
        loadTable();
    });
    function them(maphong){
        $.ajax({
            url: 'xu_ly.php',
            type: 'GET',
            data: {
                action: 'add-room',
                maphong: maphong,
            },
            success: function(data){
                loadTable();
            }
        })
    }
    function xoa(maphong){
        $.ajax({
            url: 'xu_ly.php',
            type: 'GET',
            data: {
                action: 'delete-room',
                maphong: maphong,
            },
            success: function(data){
                loadTable();
            }
        })
    }
</script>
<body>
    <form>
        <label for="mahd">Mã hóa đơn</label>
        <select name="mahd" id="mahd">
            <?php
            include "../connect.php";
            $sql = "SELECT * from hoadon";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<option value='".$row["MAHD"]."'>".$row["MAHD"]."</option>";
                }
            }
            ?>
        </select>
        <br>
        <h2>
            Danh sách các phòng còn trống
        </h2>
        <br>
        <table id="available-table">
            <thead>
                <tr>
                    <th>
                        STT
                    </th>
                    <th>
                        Mã phòng
                    </th>
                    <th>
                        Tên phòng
                    </th>
                    <th>
                        Chức năng
                    </th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table> 
        <h2>
            Danh sách các phòng đã thêm
        </h2>
        <table id="booked-table">
            <thead>
                <tr>
                    <th>
                        STT
                    </th>
                    <th>
                        Mã phòng
                    </th>
                    <th>
                        Tên phòng
                    </th>
                    <th>
                        Chức năng
                    </th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </form>
</body>
</html>