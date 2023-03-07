<?php
    require "../../dao/loai.php";
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
                case 'list_loai':
                    include "list_loai.php";
                    break;
                case 'add_loai':
                    include "add_loai.php";
                    break;
                case 'update_loai':
                    include "update_loai.php";
                    break;
                case 'delete_loai':
                    if(isset($_GET['id_loai'])){
                        $id_loai = $_GET['id_loai'];
                        try {
                            
                            loai_delete($id_loai);
                            $MES="Xóa thành công";
                        } catch (\Throwable $th) {
                            $MES="Xóa thất bại";
                        }
                    }
                    include "list_loai.php";
                    break;
                default:
                    break;
            }
        }
        else include "list_loai.php";
    ?>
</body>
</html>