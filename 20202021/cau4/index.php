<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <script>
        function loadXe(){
            console.log('loading');
            var ngayNhanXe = $("#ngaynhanxe").val();
            $.ajax({
                url: 'xu_ly_ajax.php',
                type: 'GET',
                data: {
                    action: 'loadXe',
                    ngayNhanXe: ngayNhanXe
                },
                success: function(data){
                    $("#soxe").html(data);
                    loadCongViec();
                }
            });
        }
        
        function loadCongViec(){
            var soxe = $('#soxe').val();
            console.log(soxe);
            console.log('load');
            $.ajax({
                url: 'xu_ly_ajax.php',
                type: 'GET',
                data: {
                    action: 'loadCongViec',
                    soxe: soxe
                },
                success: function(data){
                    $("#congviec tbody").html(data);
                }
            });
        } // Remove this extra closing brace
        
        function xoaCongViec(MACV,MABD) {
            console.log(MACV,MABD);
            $.ajax({
                url: 'xu_ly_ajax.php', // Update with the correct PHP script path
                type: 'GET',
                data: {
                    action: 'xoaCongViec',
                    MACV: MACV,
                    MABD:MABD,
                },
                success: function(response) {
                    if (response == 'success') {
                    loadCongViec();
                    } else {
                        console.error('Error:', response);
                    }
                }
            });
        }
    </script>
    <h2>Thanh toán</h2>
    <form method="POST">
        <label for="soxe">Số xe</label>
        <select id="soxe" name="soxe" onchange="loadCongViec()">
        </select>
        <label for="ngaynhanxe">Ngày nhận xe</label>
        <input type="date" id="ngaynhanxe" name="ngaynhanxe" onchange="loadXe()"/>
        <table id="congviec">
            <thead>
                <tr>
                    <th>Công việc</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <button type="button" onclick="thanhtoan()">Thanh toán</button>
    </form>
</body>
</html>