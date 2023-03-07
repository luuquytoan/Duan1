<?php
    require "../../dao/khachhang.php";
    require "../../dao/binhluan.php";
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
                case 'list_kh':
                    include "list_kh.php";
                    break;
                case 'add_kh':
                    include "add_kh.php";
                    break;
                case 'update_kh':
                    include "update_kh.php";
                    break;
                case 'delete_kh':
                    if(isset($_GET['id_kh'])){
                        $id_kh = $_GET['id_kh'];
                        try {
                            binh_luan_delete2($id_kh);
                            khach_hang_delete($id_kh);
                            $MES ="Xóa thành công!";
                        } catch (\Throwable $th) {
                            //throw $th;
                            $MES ="Xóa thất bại!";
                        }
                    }
                    include "list_kh.php";
                    break;
                default:
                    break;
            }
        }
        else include "list_kh.php";
    ?>
</body>
</html>