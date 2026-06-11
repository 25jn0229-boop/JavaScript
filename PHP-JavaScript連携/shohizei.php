<?php
$price = $_GET['price'];
$tax = $_GET['tax'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>計算結果</title>
</head>
<body>
    <h1>計算結果</h1>

    <p>金額：
        <?php echo $price; ?>
    </p>

    <p>消費税込みの金額：
        <script>
            let price = <?php echo $price; ?>;
            let tax = <?php echo $tax; ?>;

            let result = Math.floor(price * tax);

            document.write(result);
        </script>
    </p>
</body>
</html>