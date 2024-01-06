<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script>
    function xoa(ma){
        $.ajax({
            url: 'xu_ly.php',
            type: 'GET',
            data: {
                macd: ma
            },
            success: function(data){
                console.log(data);
                $("#liet-ke-cong-dan tbody").html(data);
            }
        });
    }
    $(document).ready(function(){
        $.ajax({
            url: 'xu_ly.php',
            type: 'GET',
            data: {
                action: 'load_table'
            },
            success: function(data){
                console.log(data);
                $("#liet-ke-cong-dan tbody").html(data);
            }
        });
    })
</script>
<body>
    <table id="liet-ke-cong-dan">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ten cong dan</th>
                <th>Gioi tinh</th>
                <th>Nam sinh</th>
                <th>Nuoc ve</th>
                <Th>Chuc nang</Th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</body>
</html>