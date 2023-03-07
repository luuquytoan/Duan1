<?php
    require_once "pdo.php";
    function tk_hang_hoa(){
        $sql ="select lo.ma_loai, lo.ten_loai , count(*)so_luong,min(hh.don_gia)gia_min,max(hh.don_gia)gia_max,avg(hh.don_gia)gia_avg
               from hang_hoa hh join loai lo on lo.ma_loai= hh.ma_loai group by lo.ma_loai,lo.ten_loai ";
        return pdo_query($sql);
    }
    function tk_binh_luan(){
        $sql ="select hh.ma_hh,hh.ten_hh,count(*)so_luong,min(bl.ngay_bl)cu_nhat,max(bl.ngay_bl)moi_nhat
                from binh_luan bl join hang_hoa hh on hh.ma_hh=bl.ma_hh group by hh.ma_hh, hh.ten_hh having so_luong>0";
        return pdo_query($sql);
    }


?>