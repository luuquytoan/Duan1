<div class="card mb-2 d-flex container mt-5" style="width:20%; padding: 0;">
    <div class="card-header text-center ">
        Tài khoản
    </div>
    <div class="card-body ">
        <form method="POST">
            <div class="form-outline mb-3">
                <label class="form-label fw-semibold" for="form2Example1">Tên đăng nhập</label>
                <input type="text" id="form2Example1" class="form-control" name="user" />
            </div>

            <div class="form-outline mb-3">
                <label class="form-label fw-semibold" for="form2Example2">Mật khẩu</label>
                <input type="password" id="form2Example2" class="form-control" name="pass" />
            </div>

            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form2Example34" checked />
                        <label class="form-check-label" for="form2Example34">Nhớ mật khẩu</label>
                    </div>
                </div>
                <div class="col">
                    <a href="index.php?act=forgot_pass">Quên mật khẩu</a>
                </div>
            </div>
            <button type="submit" name="btn_login" class="btn btn-primary btn-block" style="width: 100%;">Đăng nhập</button>
        </form>
        <span><?=(isset($MES)&&!empty($MES))?$MES:''?></span>
    </div>
</div> 
