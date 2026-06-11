<?php
$price8 = $_GET['price8'];
$price10 = $_GET['price10'];

$result8 = floor($price8 * 1.08);
$result10 = floor($price10 * 1.10);

$total = $result8 + $result10;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>計算結果</title>
</head>
<body>
    <h1>計算結果</h1>
    <p>軽減税率対象の金額：<?php echo $price8; ?></p>
    <p>通常税率対象の金額：<?php echo $price10; ?></p>
    <p>消費税込みの金額：<?php echo $total; ?></p>
</body>
</html>