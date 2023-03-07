<div class="container bg-warning-subtle p-2 text-center text-success my-2">
    <h3>Sửa danh mục</h3>
</div>
<?php
    if(isset($_GET['id_loai'])){
        $id_loai = $_GET['id_loai'];
    }
    if(isset($_POST['btn_update'])){
        $ten_loai = $_POST['ten_loai'];
        try {
            loai_update($id_loai,$ten_loai);
            $MES="Cập nhập thành công!";
        } catch (\Throwable $th) {
            $MES="Thất bại";
        }
    }
?>
<form action=""  method="POST" enctype="multipart/form-data" class="container p-0 mb-3">
    <label for="formGroupExampleInput" class="form-label">Mã danh mục</label>
    <input type="text" class="form-control mb-3" id="formGroupExampleInput" placeholder=""name="id_loai" disabled value="<?php echo loai_sellect_by_id($id_loai)['ma_loai'] ?> " >

    <label for="formGroupExampleInput2" class="form-label">Tên danh mục</label>
    <input type="text" class="form-control mb-3" id="formGroupExampleInput2" placeholder=""name="ten_loai" required value="<?php echo loai_sellect_by_id($id_loai)['ten_loai'] ?>">

    <input type="submit" class="btn btn-outline-success btn-sm " value="Sửa" name="btn_update">
    <!-- <input type="submit" class="btn btn-outline-success btn-sm " value="Nhập lại" name="btn_reset"> -->
    <a href="index.php?act=list_loai" class="btn btn-sm btn-outline-success">Danh sách</a>
    <span class="text-warning" style="font-family: rowdies_regula; font-size: 15px;" ><?=(!empty($MES)&& isset($MES))? $MES : ''?></span>

</form>
