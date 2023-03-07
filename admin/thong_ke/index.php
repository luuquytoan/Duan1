<?php
    require "../../dao/thong_ke.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="../../bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../content/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
                <?php
                    $items = tk_hang_hoa();
                    foreach ($items as $item){
                    echo "['$item[ten_loai]', $item[so_luong]],";
                    }
                ?>
            ]);

        var options = {
          title: 'Thống kê hàng hóa'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</head>
<body>
    <div class="container bg-warning-subtle p-3 text-center text-success mb-2">
        <h1 style="font-family: rowdies_regula;">WEll COME TO PAGE ADMIN</h1>
    </div>
    <?php include "../menu.php" ?>
    <?php
        if(!isset($_GET['act'])){
            include "list.php";
        }
        else include "chart.php";
    ?>
    
</body>
</html>