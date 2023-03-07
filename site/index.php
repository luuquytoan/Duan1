
<?php 
session_start();
$MES="";
include "../dao/khachhang.php";
include "../dao/hanghoa.php";
include "../dao/binhluan.php";
include "../site/header.php"; 

if(isset($_GET['act'])){
    $act =$_GET['act'];
    switch ($act) {
        case 'search':
            $search ="";
            if(isset($_POST['btn_search'])&&($_POST['btn_search'])){
                $sear = $_POST['search'];
                $search = $sear;
            }
            include "menu.php";
            include "search.php";
            break;
        case 'login':
            if (isset($_POST['btn_login'])) {
                $user = $_POST['user'];
                $pass = md5($_POST['pass']);
                $check = check_login($user,$pass);
                if(is_array($check)){
                    if($check['mat_khau'] == $pass){
                        $_SESSION['user'] = $check;
                        header('location: index.php');
                    }
                }
                else{
                    $MES = "Sai mật khẩu";
                }
            }
            include "dangnhap.php";
            break;
        case 'forgot_pass':
            if(isset($_POST['btn_forgot'])){
                $ma_kh = $_POST['user'];
                $email = $_POST['email'];
                $pass = md5($_POST['pass']);
                $pass2 = md5($_POST['pass1']);
                if(khach_hang_exist($ma_kh) > 0){
                    $user = khach_hang_select_by_id($ma_kh);
                    if($email == $user['email'] && $pass == $pass2){
                        try {
                            khach_hang_change_pass($pass2,$ma_kh);
                            $MES ="Đừng quên mật khẩu nữa đấy";
                        } catch (\Throwable $th) {
                            $MES="Lỗi";
                        }
                    }else{
                        $MES="Sai email hoặc mật khẩu";
                    }
                }else{
                    $MES="Mã khách hàng không tồn tại";
                }
            }
            include "forgot_pass.php";
            break;
        case 'pass_change':
            if(isset($_POST['btn_change'])&&isset($_SESSION['user'])){
                extract($_SESSION['user']);
                $pass =  md5($_POST['pass']);
                $pass1 = md5($_POST['pass1']);
                $pass2 = md5($_POST['pass2']);
                if($pass != $mat_khau){
                    $MES="Sai mật khẩu";
                }
                elseif($pass1 == $pass2){
                    try {
                        khach_hang_change_pass($pass2,$ma_kh);
                        $MES="Đổi thành công";
                    } catch (\Throwable $th) {
                        $MES="Lỗi";
                    }
                }else $MES="Xác nhận mật khẩu mới sai!";
            }
            include "pass_change.php";
            break;
        case 'logout':
            session_unset();
            header('location: index.php');
            break;
        case 'signin':
            if(isset($_POST['btn_signin'])){
                $ma_kh =$_POST['ma_kh'];
                $ten_kh=$_POST['ten_kh'];
                $pass=md5($_POST['pass']);
                $pass2=md5($_POST['pass2']);
                $email = $_POST['email'];
                $img = $_FILES['hinh']['name'];
                move_uploaded_file($_FILES['hinh']['tmp_name'],'../../content/image/'.$img);
                $kich_hoat = $_POST['kich_hoat'];
                $vai_tro =$_POST['vai_tro'];
                if(khach_hang_exist($ma_kh)>0){
                    $MES ="user name đã được sử dụng!";
                }
                else if ($pass != $pass2) {
                    $MES = "Sai mật khẩu";
                }
                else {
                    if($_FILES['hinh']['size']==0){
                        $img = "user.png";
                    }else{
                        $img = $_FILES['hinh']['name'];
                        move_uploaded_file($_FILES['hinh']['tmp_name'],'../content/image/'.$img);
                    }
                    try {
                        khach_hang_insert($ma_kh, $ten_kh, $pass2, $img, $email, $kich_hoat, $vai_tro);
                        $MES = "Đăng ký thành viên thành công!";
                    }
                    catch (Exception $exc) {
                        $MES = "Đăng ký thành viên thất bại!";
                    }

                }
            }
            include "dangki.php";
            break;
        case 'sp_ct':
            include "../site/menu.php";
            if(isset($_GET['id_hh'])){
                try {
                    hang_hoa_tang_luot_xem($_GET['id_hh']);
                } catch (\Throwable $th) {
                    $MES="Lỗi view";
                }
            }
            if(isset($_SESSION['user'])){
                if(isset($_POST['btn_gui'])&&isset($_GET['id_hh'])){
                    $noi_dung = $_POST['noi_dung'];
                    $ngay_bl = date_format(date_create(),"Y/m/d");
                    $ma_kh = $_SESSION['user']['ma_kh'];
                    $ma_hh = $_GET['id_hh'];
                    try {
                        binh_luan_insert($noi_dung,$ma_kh,$ma_hh,$ngay_bl);
                    } catch (\Throwable $th) {
                        $MES = "Lỗi";
                    }
                }
            }
            else{
                $MES ="Đăng nhập để bình luận!";
            }
            include "chitietsp.php";
            include "../site/footer.php";
            break;
        case 'my_acc':
            if (isset($_POST['btn_update'])&&isset($_SESSION['user'])){
                extract($_SESSION['user']);
                $ten_kh = $_POST['ten_kh'];
                $email = $_POST['email'];
                if($_FILES['hinh']['size'] == 0){
                    $img = $hinh;
                }else {
                    $img = $_FILES['hinh']['name'];
                    move_uploaded_file($_FILES['hinh']['tmp_name'],'../content/image/'.$img);
                }
                $pass = $_POST['pass'];
                $kich_hoat = $_POST['kich_hoat'];
                $vai_tro = $_POST['vai_tro'];
                try {
                    khach_hang_update($ten_kh,$img,$email,$kich_hoat,$vai_tro,$ma_kh);
                    $MES = "Cập nhập thành công!";
                    $_SESSION['user'] = khach_hang_select_by_id($ma_kh);
                } catch (\Throwable $th) {
                    $MES="Lỗi";
                }
            }
            include "myacc.php";
            break;
        default:
            # code...
            break;
    }
}
else{
    include "../site/menu.php";
    include "../site/banner.php"; 
    include "../site/content.php";
    include "../site/footer.php";
}
?>
    <script src="../bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


    
    



    