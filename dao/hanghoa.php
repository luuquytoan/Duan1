<?php
    require_once "pdo.php";

    function hang_hoa_insert($tenhh,$don_gia,$giam_gia,$hinh,$ngay_nhap,$mo_ta,$dac_biet,$ma_loai){
        $sql ="insert into hang_hoa(ten_hh,don_gia,giam_gia,hinh,ngay_nhap,mo_ta,dac_biet,ma_loai) value(?,?,?,?,?,?,?,?)";
        pdo_execute($sql,$tenhh,$don_gia,$giam_gia,$hinh,$ngay_nhap,$mo_ta,$dac_biet,$ma_loai);
    }

    function hang_hoa_update($tenhh,$don_gia,$giam_gia,$hinh,$ngay_nhap,$mo_ta,$dac_biet,$ma_loai,$ma_hh){
        $sql = "update hang_hoa set ten_hh =?,don_gia=?,giam_gia=?,hinh=?,ngay_nhap=?,mo_ta=?,dac_biet=?,ma_loai=? where ma_hh=?";
        pdo_execute($sql,$tenhh,$don_gia,$giam_gia,$hinh,$ngay_nhap,$mo_ta,$dac_biet,$ma_loai,$ma_hh);
    }
    function hang_hoa_delete($ma_hh){
        $sql = "delete from hang_hoa where ma_hh = ?";
        if (is_array($ma_hh)) {
            foreach($ma_hh as $ma){
                pdo_execute($sql,$ma);
            }
        }else
            pdo_execute($sql,$ma_hh);
    }
    function hang_hoa_select_all(){
        $sql = "select * from hang_hoa";
        return pdo_query($sql);
    }
    function hang_hoa_select_by_id($ma_hh){
        $sql = "select * from hang_hoa where ma_hh = ?";
        return pdo_query_one($sql,$ma_hh);
    }
    function hang_hoa_select_by_loai($ma_loai){
        $sql = "select * from hang_hoa where ma_loai = ?";
        return pdo_query($sql,$ma_loai);
    }
    function hang_hoa_exist($ma_hh){
        $sql = "select count(*) from hang_hoa where ma_hh =?";
        return pdo_query_value($sql,$ma_hh);
    }
    function hang_hoa_tang_luot_xem($ma_hh){
        $sql = "update hang_hoa set so_luot_xem = so_luot_xem + 1 where ma_hh = ?";
        pdo_execute($sql,$ma_hh);
    }
    function hang_hoa_select_top5(){
        $sql = "select * from hang_hoa where so_luot_xem > 0 order by so_luot_xem desc limit 0,5";
        return pdo_query($sql);
    }
    function hang_hoa_select_keyword($keyword){
        $sql = "select * from hang_hoa hh  JOIN loai lo ON lo.ma_loai=hh.ma_loai  WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
        return pdo_query($sql,'%'.$keyword.'%', '%'.$keyword.'%');
    }
?>