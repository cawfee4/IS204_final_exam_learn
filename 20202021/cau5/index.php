<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<script>
    $(document).ready(function(){
        $("#slbd").keydown(function(e){
            if(e.which === 13){
                console.log('a');
                var num = $("#slbd").val();
                $.ajax({
                    url: 'xu_ly.php',
                    type: 'GET',
                    data: {
                        slbd: num
                    },
                    success: function(data){
                        console.log(data);
                        $("#slbd-table tbody").html(data);
                    }
                });
            }
        })
    })
</script>
<body>
    <h1>
        Liệt kê
    </h1>
    <label for="slbd">Chọn số lần bảo dưỡng</label>
    <input type="number" name="slbd" id="slbd"/>
    <table id="slbd-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã phòng</th>
                <th>Loại phòng</th>
                <th>Số lần bảo dưỡng</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</body>
</html>