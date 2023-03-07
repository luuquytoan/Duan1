<?php
    if(isset($_SESSION['user'])){
        extract($_SESSION['user']);
    }
?>
<div class="card container mt-5 d-flex justify-content-center" style="width:30%; padding:0;">
<div class="card-header text-center mb-2">
    Thông tin tài khoản
</div>
<div class="card-title text-center" >
<img src="../content/image/<?=$hinh?>" alt="" style="width:20%; border-radius:50%"></div>
<div class="card-body">
<form action="" method="POST" enctype="multipart/form-data" class=" px-5 pb-3">
        <div class="col mb-2">
            <label for="" class="fw-semibold">Mã khách hàng</label>
            <input type="text" name="ma_kh" class="form-control" value="<?=$ma_kh?>" disabled>
        </div>
        <div class="col mb-2">
            <label for="" class="fw-semibold">Tên khách hàng</label>
            <input type="text" name="ten_kh" class="form-control" value="<?=$ten_kh?>">
        </div>
        <div class="col mb-2">
            <label for="" class="fw-semibold">Email</label>
            <input type="email" name="email" class="form-control" value="<?=$email?>">
        </div>
        <div class="col mb-2">
            <label for="" class="fw-semibold">Hình ảnh</label>
            <input type="file" name="hinh" class="form-control">
        </div>
        <input name="pass"  type="hidden" value="<?=$mat_khau?>" id="">
        <input name="kich_hoat" value="0" type="hidden">
        <input name="vai_tro" value="0" type="hidden">
        <div class="d-flex justify-content-between">
            <a href="index.php?act=pass_change">Đổi mật khẩu</a>
            <a href="index.php">Quay lại</a>
        </div>
    <input type="submit" class="btn btn-primary  mt-3" value="Cập nhập tài khoản" name="btn_update" style="width:100%; ">
    <span class="text-warning" style="font-family: rowdies_regula; font-size: 15px;" ><?=(!empty($MES)&& isset($MES))? $MES : ''?></span>
</form>
</div>
</div>