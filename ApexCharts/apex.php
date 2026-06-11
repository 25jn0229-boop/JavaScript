<?php
// 1. Fetch values and set default to 0 if they are empty or not set
$s = isset($_GET['s']) && $_GET['s'] !== '' ? (int)$_GET['s'] : 0;
$a = isset($_GET['a']) && $_GET['a'] !== '' ? (int)$_GET['a'] : 0;
$b = isset($_GET['b']) && $_GET['b'] !== '' ? (int)$_GET['b'] : 0;
$c = isset($_GET['c']) && $_GET['c'] !== '' ? (int)$_GET['c'] : 0;
$d = isset($_GET['d']) && $_GET['d'] !== '' ? (int)$_GET['d'] : 0;

// 2. Pack them into a clean array and safely convert to JSON for JavaScript
$chart_data = json_encode([$s, $a, $b, $c, $d]);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./apexcharts.css" />
    <script src="./apexcharts.min.js"></script>
    <style>
      #chart {
        max-width: 650px;
        margin: 35px auto;
      }
    </style>
  </head>
  <body>
    <h1>科目成績割合（例）</h1>
    <div id="chart"></div>
    
    <script>

      let options = {
        chart: {
          type: 'pie',
        },
        labels: ['成績：秀', '成績：優', '成績：良', '成績：可', '成績：不可'],
        series: <?php echo $chart_data; ?>
      };

      let chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();
    </script>
  </body>
</html>