<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Document</title>
</head>
<body>
    <script>
        function fetchCar(){
            var sl = $('#sl').val();
            $.ajax({
                url: 'fetchCar.php',
                type: 'post',
                data: {sl:sl},
                success: function(response){
                    $('#xe-table tbody').html(response);
                }
            })
        }
        $(document).ready(function(){
            $(#sl).keydown(function(e){
                if(e.key === 'Tab'){
                    fetchCar();
                }
            })
        })
    </script>
    <label for="sl">Chon so luong</label>
    <input type="number" name="sl" id="sl"/>
    <table id="xe-table">
        <Thead>
            <tr>
                <th>Ten xe</th>
                <th>So lan thue</th>
            </tr>
        </Thead>
        <tbody></tbody>
    </table>
</body>
</html>