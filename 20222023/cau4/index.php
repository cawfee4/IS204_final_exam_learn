<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Document</title>
</head>
<script>
    function timSL(){
        var num = $("#soluongkh").val();
        console.log(num);
        $.ajax({
            url: 'xu_ly.php',
            type: 'GET',
            data: {
                soluongkh: num
            },
            success: function(data){
                $("#sl-text").html(num + " khách hàng có số tiền thuê cao nhất");
                $("#sl-table").html(data);
                console.log(data);
            }
        });
    }
    
    $(document).ready(function(){
        $("#soluongkh").on("keydown", function(e) {
        if (e.which === 13) {
            e.preventDefault();
            timSL();
        }
    });
    });
</script>
<body>
    <!-- <form method="GET"> -->
        <label for="soluongkh">So luong kh</label>
        <input type="number" name="soluongkh" id="soluongkh"/>
        <h2 id="sl-text">

        </h2>
        <table id="sl-table">
        </table>
</body>
</html>