<?php
    require_once "pdo.php";

    function loai_insert($ten_loai){
        $sql = "insert into loai value (null,?)";
        pdo_execute($sql,$ten_loai);
    }

    function loai_update($ma_loai,$ten_loai){
        $sql = "update loai set ten_loai = ? where ma_loai = ?";
        pdo_execute($sql,$ten_loai,$ma_loai);
    }

    function loai_delete($ma_loai){
        $sql = "delete from loai where ma_loai = ?";
        if(is_array($ma_loai)){
            foreach($ma_loai as $ma){
                pdo_execute($sql,$ma);
            }
        }else 
            pdo_execute($sql,$ma_loai);
    }

    function loai_select_all(){
        $sql = 'select*from loai';
        return pdo_query($sql);
    }

    function loai_sellect_by_id($ma_loai){
        $sql = "select * from loai where ma_loai = ?";
        return pdo_query_one($sql,$ma_loai);
    }

    function loai_exist($ma_loai){
        $sql = "select count(*) from loai where ma_loai = ?";
        return pdo_qurery_value($sql,$ma_loai);
    }
?>