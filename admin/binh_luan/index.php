<?php
    require "../../dao/binhluan.php";
    require "../../dao/thong_ke.php";
    require "../../dao/khachhang.php";
    require "../../dao/hanghoa.php";
    $MES ="";
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
</head>
<body>
    <div class="container bg-warning-subtle p-3 text-center text-success mb-2">
        <h1 style="font-family: rowdies_regula;">WEll COME TO PAGE ADMIN</h1>
    </div>
    <?php include "../menu.php" ?>
    <?php
        if(isset($_GET['act'])){
            $act = $_GET['act'];
            switch ($act) {
                case 'detail_bl':
                    include "detail.php";
                    break;
                case 'delete_bl':
                    if(isset($_GET['id_bl'])){
                        try {
                            binh_luan_delete($_GET['id_bl']);
                            $MES ="Xóa thành công";
                        } catch (\Throwable $th) {
                            //throw $th;
                            $MES="Xóa thất bại";
                        }
                    }
                    include "detail.php";
                default:
                    break;
            }
        }
        else include "list.php";
    ?>
</body>
</html>