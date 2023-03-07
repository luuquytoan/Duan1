

<?php
    $error = array();
    if(isset($_POST['btn_insert']) ){
        foreach(khach_hang_select_all() as $row){
                if($row['ma_kh'] == $_POST['ma_kh']){
                    $err ="";
                }
        }
        if(isset($err)){
                $error['mkh'] = "Mã đã tồn tại vui lòng nhập lại";
            }
            else $ma_kh = $_POST['ma_kh'];
        $ten_kh=$_POST['ten_kh'];
        $pass=md5($_POST['pass']);
        $pass2=md5($_POST['pass2']);
        if($pass != $pass2){
            $error['pass'] = "Mật khẩu không chính xác!";
        }
        $email = $_POST['email'];
        $img = $_FILES['hinh']['name'];
        move_uploaded_file($_FILES['hinh']['tmp_name'],'../../content/image/'.$img);
        $kich_hoat = $_POST['kich_hoat'];
        $vai_tro =$_POST['vai_tro'];
        if(isset($ma_kh,$ten_kh,$pass2,$email,$img,$kich_hoat,$vai_tro)){
            try {
                khach_hang_insert($ma_kh,$ten_kh,$pass2,$img,$email,$kich_hoat,$vai_tro);
                $MES ="thêm thành công";
            } catch (\Throwable $th) {
                //throw $th;
                $MES ="thêm thất bại";
            }
        }
    }
?>

<div class="container bg-warning-subtle p-2 text-center text-success my-2">
    <h3>Thêm thành viên</h3>
</div>
<form action="" method="POST" enctype="multipart/form-data" class="container px-5">
    <div class="row mb-3">
        <div class="col">
            <label for="" class="fw-semibold">Mã khách hàng</label>
            <input type="text" name="ma_kh" class="form-control">
            <span name="hi"><?php
             if(isset($error['mkh']))echo $error['mkh']; ?></span>
        </div>
        <div class="col">
            <label for="" class="fw-semibold">Tên khách hàng</label>
            <input type="text" name="ten_kh" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="" class="fw-semibold">Mật khẩu</label>
            <input type="password" name="pass" class="form-control">
        </div>
        <div class="col">
            <label for="" class="fw-semibold">Xác nhận mật khẩu</label>
            <input type="password" name="pass2" class="form-control">
            <span><?php if(isset($error['pass'])) echo $error['pass']; ?></span>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="" class="fw-semibold">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="col">
            <label for="" class="fw-semibold">Hình ảnh</label>
            <input type="file" name="hinh" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="" class="fw-semibold">kích hoạt</label>
            <div class="border py-2 rounded-2 ps-3" id="radio">  
                <div class="form-check-inline form-group">
                    <label for="" class="form-check-label">Kích hoạt</label>
                    <input type="radio" class="form-check-input " name="kich_hoat" value="1" >
                </div>
                <div class="form-check-inline form-group">
                    <label for="" class="form-check-lable">Chưa kích hoạt</label>
                    <input type="radio" class="form-check-input " name="kich_hoat" value="0" >
                </div>
            </div>
        </div>
        <div class="col">
            <label for="" class="fw-semibold">Vai trò</label>
            <div class=" border py-2 rounded-2 ps-3" id="radio">  
                <div class="form-check-inline form-group">
                    <label for="" class="form-check-label">Khách hàng</label>
                    <input type="radio" class="form-check-input " name="vai_tro" value="1" required>
                </div>
                <div class="form-check-inline form-group">
                    <label for="" class="form-check-lable">Nhân viên</label>
                    <input type="radio" class="form-check-input " name="vai_tro" value="0" required>
                </div>
            </div>
        </div>
    </div>
    <input type="submit" class="btn btn-outline-success btn-sm " value="Thêm người dùng" name="btn_insert">
    <!-- <input type="submit" class="btn btn-outline-success btn-sm " value="Nhập lại" name="btn_reset"> -->
    <a href="index.php?act=list_kh" class="btn btn-sm btn-outline-success">Danh sách</a>
    <span class="text-warning" style="font-family: rowdies_regula; font-size: 15px;" ><?=(!empty($MES)&& isset($MES))? $MES : ''?></span>
</form>
<?php


    // if(isset($_POST['btn_insert'])){
    //     $error = array();
    //     foreach(khach_hang_select_all() as $row){
    //     if($row['ma_kh'] == $_POST['ma_kh']&&$_SERVER['REQUEST_METHOD'] == "POST"){
    //         $error['hi'] ="Mã đã tồn tại vui lòng nhập lại!";
    //     }
    //     else {
    //         $ma_kh = $_POST['ma_kh'];
    //         echo $row['ma_kh'];
    //     }}
    //     $ten_kh=$_POST['ten_kh'];
    //     $pass=md5($_POST['pass']);
    //     $pass2=md5($_POST['pass2']);
    //     if($pass != $pass2){
    //         return confirm("Vui lòng xác nhận lại mật khẩu");
    //     }
    //     $email = $_POST['email'];
    //     $img = $_FILES['hinh']['name'];
    //     move_uploaded_file($_FILES['hinh']['tmp_name'],'../../content/image/'.$img);
    //     $kich_hoat = $_POST['kich_hoat'];
    //     $vai_tro =$_POST['vai_tro'];
    //     // khach_hang_insert($ma_kh,$ten_kh,$pass2,$img,$email,$kich_hoat,$vai_tro);
    // }

?>