<div class="card container mt-5" style="width:30%; padding:0;">
<div class="card-header text-center mb-2">
    Đăng kí thành viên
</div>
<div class="card-body">
<form action="" method="POST" enctype="multipart/form-data" class=" px-5 pb-3">
        <div class="col mb-2">
            <label for="" class="fw-semibold">Mã khách hàng</label>
            <input type="text" name="ma_kh" class="form-control">
            <span name="hi"><?php
             if(isset($error['mkh']))echo $error['mkh']; ?></span>
        </div>
        <div class="col mb-2">
            <label for="" class="fw-semibold">Tên khách hàng</label>
            <input type="text" name="ten_kh" class="form-control">
        </div>
        <div class="col mb-2">
            <label for="" class="fw-semibold">Mật khẩu</label>
            <input type="password" name="pass" class="form-control">
        </div>
        <div class="col mb-2">
            <label for="" class="fw-semibold">Xác nhận mật khẩu</label>
            <input type="password" name="pass2" class="form-control">
            <span><?php if(isset($error['pass'])) echo $error['pass']; ?></span>
        </div>
        <div class="col mb-2">
            <label for="" class="fw-semibold">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="col mb-2">
            <label for="" class="fw-semibold">Hình ảnh</label>
            <input type="file" name="hinh" class="form-control">
        </div>
        <input name="kich_hoat" value="0" type="hidden">
        <input name="vai_tro" value="0" type="hidden">
    <input type="submit" class="btn btn-primary  mt-3" value="Đăng kí" name="btn_signin" style="width:100%; ">
    <a href="index.php?act=login" class="btn btn-success btn-sm mt-2" style="width:100%;">Đăng nhập</a>
    <span class="text-warning" style="font-family: rowdies_regula; font-size: 15px;" ><?=(!empty($MES)&& isset($MES))? $MES : ''?></span>
</form>
</div>
</div>
