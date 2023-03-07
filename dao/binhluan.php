<?php
    require_once "pdo.php";
    function binh_luan_insert($noi_dung,$ma_kh,$ma_hh,$ngay_bl){
        $sql ="insert into binh_luan(noi_dung,ma_kh,ma_hh,ngay_bl)  value(?,?,?,?)";
        pdo_execute($sql,$noi_dung,$ma_kh,$ma_hh,$ngay_bl);
    }
    function binh_luan_update($noi_dung,$ma_kh,$ma_hh,$ngay_bl,$ma_bl){
        $sql = "update binh_luan set noi_dung=?, ma_kh = ?, ma_hh =?, ngay_bl =? where ma_bl =?";
        pdo_execute($sql,$noi_dung,$ma_kh,$ma_hh,$ngay_bl,$ma_bl);
    }
    function binh_luan_delete($ma_bl){  
        $sql ="delete from binh_luan where ma_bl =?";
        if (is_array($ma_bl)) {
            foreach($ma_bl as $ma){
                pdo_execute($sql,$ma);
            }
        }else
            pdo_execute($sql,$ma_bl);
    }
    function binh_luan_delete1($ma_bl){  
        $sql ="delete from binh_luan where ma_hh =?";
        if (is_array($ma_bl)) {
            foreach($ma_bl as $ma){
                pdo_execute($sql,$ma);
            }
        }else
            pdo_execute($sql,$ma_bl);
    }
    function binh_luan_delete2($ma_bl){  
        $sql ="delete from binh_luan where ma_kh =?";
        if (is_array($ma_bl)) {
            foreach($ma_bl as $ma){
                pdo_execute($sql,$ma);
            }
        }else
            pdo_execute($sql,$ma_bl);
    }
    function binh_luan_select_all(){
        $sql ="select * from binh_luan ";
        return pdo_query($sql);
    }
    function binh_luan_select_by_id($ma_hh){
        $sql ="select * from binh_luan where ma_hh =?";
        return pdo_query($sql,$ma_hh);
    }
    function binh_luan_exist($ma_bl){
        $sql = "select count(*) from binh_luan ma_bl =?";
        return pdo_query_value($sql,$ma_bl);
    }
    function binh_luan_select_by_hang_hoa($ma_hh){
        $sql ="select b.*,h.ten_hh from binh_luan b join hang_hoa h on h.ma_hh=b.ma_hh where b.ma_hh=? order by ngay_bl desc";
        return pdo_query($sql,$ma_hh);
    }
?>