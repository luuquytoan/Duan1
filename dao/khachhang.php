<?php
    require_once "pdo.php";
    function khach_hang_insert($ma_kh,$ten_kh,$mk,$hinh,$email,$kich_hoat,$vai_tro){
        $sql = "insert into khach_hang value(?,?,?,?,?,?,?)";
        pdo_execute($sql,$ma_kh,$ten_kh,$mk,$hinh,$email,$kich_hoat,$vai_tro);
    }
    function khach_hang_update($ten_kh,$hinh,$email,$kich_hoat,$vai_tro,$ma_kh){
        $sql ="update khach_hang set ten_kh=?,hinh=?,email=?,kich_hoat=?,vai_tro=? where ma_kh=?";
        pdo_execute($sql,$ten_kh,$hinh,$email,$kich_hoat,$vai_tro,$ma_kh);
    }
    function khach_hang_delete($ma_kh){
        $sql ="delete from khach_hang where ma_kh = ?";
        if (is_array($ma_kh)) {
            foreach($ma_kh as $ma){
                pdo_execute($sql,$ma);
            }
        }else
            pdo_execute($sql,$ma_kh);
    }
    function khach_hang_select_all(){
        $sql ="select * from khach_hang";
        return pdo_query($sql);
    }
    function khach_hang_select_by_id($ma_kh){
        $sql = "select *from khach_hang where ma_kh = ?";
        return pdo_query_one($sql,$ma_kh);
    }
    function khach_hang_exist($ma_kh){
        $sql = "select count(*) from khach_hang where ma_kh = ?";
        return pdo_query_value($sql,$ma_kh);
    }
    function khach_hang_change_pass($mk,$ma_kh){
        $sql = "update khach_hang set mat_khau = ? where ma_kh =?";
        pdo_execute($sql,$mk,$ma_kh);
    }
    function check_login($ma_kh,$pass){
        $sql = "select *from khach_hang where ma_kh = ? and mat_khau = ?";
        return pdo_query_one($sql,$ma_kh,$pass);
    }
?>