<div class="card mb-2 d-flex container mt-5" style="width:20%; padding: 0;">
    <div class="card-header text-center ">
        Đổi mật khẩu
    </div>
    <div class="card-body ">
        <form method="POST">
            <div class="form-outline mb-3">
                <label class="form-label fw-semibold" for="form2Example2">Mật khẩu cũ</label>
                <input type="password" id="form2Example2" class="form-control" name="pass" />
            </div>
            <div class="form-outline mb-3">
                <label class="form-label fw-semibold" for="form2Example3">Mật khẩu mới</label>
                <input type="password" id="form2Example3" class="form-control" name="pass1" />
            </div>
            <div class="form-outline mb-3">
                <label class="form-label fw-semibold" for="form2Example4">Xác nhận mật khẩu</label>
                <input type="password" id="form2Example4" class="form-control" name="pass2" />
            </div>
            <button type="submit" name="btn_change" class="btn btn-primary " style="width: 100%;">Đổi mật khẩu</button>
        </form>
        <a href="index.php?act=my_acc" class="mt-2">Quay lại</a>
        <span class="text-warning" style="font-family: rowdies_regula; font-size: 15px;" ><?=(!empty($MES)&& isset($MES))? $MES : ''?></span>
    </div>
</div> 