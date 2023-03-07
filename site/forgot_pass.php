<div class="card mb-2 d-flex container mt-5" style="width:20%; padding: 0;">
    <div class="card-header text-center ">
        Quên mật khẩu
    </div>
    <div class="card-body ">
        <form method="POST">
            <div class="form-outline mb-3">
                <label class="form-label fw-semibold" for="form2Example1">Mã khách hàng</label>
                <input type="text" id="form2Example1" class="form-control" name="user" />
            </div>

            <div class="form-outline mb-3">
                <label class="form-label fw-semibold" for="form2Example2">Email</label>
                <input type="email" id="form2Example2" class="form-control" name="email" />
            </div>
            <div class="form-outline mb-3">
                <label class="form-label fw-semibold" for="form2Example3">Mật khẩu mới</label>
                <input type="password" id="form2Example3" class="form-control" name="pass" />
            </div>
            <div class="form-outline mb-3">
                <label class="form-label fw-semibold" for="form2Example4">Xác nhận mật khẩu</label>
                <input type="password" id="form2Example4" class="form-control" name="pass1" />
            </div>
            <a href="index.php?act=login" class="btn btn-success" style="width:100%; margin-bottom:1rem;">Đăng nhập</a>
            <button type="submit" name="btn_forgot" class="btn btn-primary " style="width: 100%;">Lấy lại mật khẩu</button>
        </form>
        <span class="text-warning" style="font-family: rowdies_regula; font-size: 15px;" ><?=(!empty($MES)&& isset($MES))? $MES : ''?></span>
    </div>
</div> 