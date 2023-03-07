<div class="container bg-warning-subtle p-2 text-center text-success my-2">
    <h3>Sửa thành viên</h3>
</div>
<?php 
    if(isset($_GET['id_kh'])){
        $kh=khach_hang_select_by_id($_GET['id_kh']);
    }
    if(isset($_POST['btn_update'])){
        $id_kh = $_GET['id_kh'];
        $ten_kh = $_POST['ten_kh'];
        $email = $_POST['email'];
        if($_FILES['hinh']['size'] == 0){
            $img = $kh['hinh'];
        }else{
            $img = $_FILES['hinh']['name'];
            move_uploaded_file($_FILES['hinh']['tmp_name'],'../../content/image/'.$img);
        }
        $kich_hoat = $_POST['kich_hoat'];
        $vai_tro = $_POST['vai_tro'];
        try {
            khach_hang_update($ten_kh,$img,$email,$kich_hoat,$vai_tro,$id_kh);
            $MES="Cập nhập thành công!";
        } catch (\Throwable $th) {
            $MES="Cập nhật thất bại";
        }
    }  
?>
<form action="" method="POST" enctype="multipart/form-data" class="container px-5">
    <div class="row mb-3">
        <div class="col">
            <label for="" class="fw-semibold">Mã khách hàng</label>
            <input type="text" name="ma_kh" class="form-control" value="<?= $kh['ma_kh'] ?>" disabled>
        </div>
        <div class="col">
            <label for="" class="fw-semibold">Tên khách hàng</label>
            <input type="text" name="ten_kh" class="form-control" value="<?= $kh['ten_kh']?>">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="" class="fw-semibold">Email</label>
            <input type="email" name="email" class="form-control" value="<?= $kh['email'] ?>">
        </div>
        <div class="col">
            <label for="" class="fw-semibold">Hình ảnh</label>
            <input type="file" name="hinh" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="" class="fw-semibold">Kích hoạt</label>
            <div class="border py-2 rounded-2 ps-3" id="radio">  
                <div class="form-check-inline form-group">
                    <label for="" class="form-check-label">Kích hoạt</label>
                    <input type="radio" class="form-check-input " name="kich_hoat" value="1" <?php if($kh['kich_hoat'] == 1) echo 'checked' ?> required>
                </div>
                <div class="form-check-inline form-group">
                    <label for="" class="form-check-lable">Chưa kích hoạt</label>
                    <input type="radio" class="form-check-input " name="kich_hoat" value="0"<?php if($kh['kich_hoat'] == 0) echo 'checked' ?> required>
                </div>
            </div>
        </div>
        <div class="col">
            <label for="" class="fw-semibold">Vai trò</label>
            <div class=" border py-2 rounded-2 ps-3" id="radio">  
                <div class="form-check-inline form-group">
                    <label for="" class="form-check-label">Nhân viên</label>
                    <input type="radio" class="form-check-input " name="vai_tro" value="1"<?php if($kh['vai_tro'] == 1) echo 'checked' ?> required>
                </div>
                <div class="form-check-inline form-group">
                    <label for="" class="form-check-lable">Khách hàng</label>
                    <input type="radio" class="form-check-input " name="vai_tro" value="0"<?php if($kh['vai_tro'] == 0) echo 'checked' ?> required>
                </div>
            </div>
        </div>
    </div>
    <input type="submit" class="btn btn-outline-success btn-sm " value="Sửa" name="btn_update">
    <!-- <input type="submit" class="btn btn-outline-success btn-sm " value="Nhập lại" name="btn_reset"> -->
    <a href="index.php?act=list_kh" class="btn btn-sm btn-outline-success">Danh sách</a>
    <span class="text-warning" style="font-family: rowdies_regula; font-size: 15px;" ><?=(!empty($MES)&& isset($MES))? $MES : ''?></span>
</form>
