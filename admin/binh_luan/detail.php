<?php
    if(isset($_GET['id_hh'])){
        $id = $_GET['id_hh'];
        $items = binh_luan_select_by_hang_hoa($id);
    }
?>
<div class="container p-0 my-3 d-flex">
    <h3>Hàng hóa:</h3><h5 class="p-2"><?= hang_hoa_select_by_id($id)['ten_hh'] ?></h5>
</div>
<table class="table container">
    <thead>
        <tr>
            <th></th>
            <th scope="col">Nội dung</th>
            <th scope="col">Ngày BL</th>
            <th scope="col">Người BL</th>
            <th></th>
        </tr>
    </thead> 
    <tbody>
            <?php
                for($i=0;$i<count($items);$i++){
            ?><tr>
            <td class"col"><input type="checkbox" name="" id=""></td>
            <td class="col"><?= $items[$i]['noi_dung']?></td>
            <td class="col"><?=$items[$i]['ngay_bl'] ?></td>
            <td class="col"><?php echo khach_hang_select_by_id($items[$i]['ma_kh'])['ten_kh'] ?></td>
            <td class="col">
                <a href="index.php?act=delete_bl&id_bl=<?= $items[$i]['ma_bl']?>&id_hh=<?= $items[$i]['ma_hh'] ?>" class="btn btn-sm btn-outline-success">Xóa</a>
            </td>
            <?php
            }
            ?>
        </tr>
    </tbody>
</table>
<div class="container p-0">
    <a href="#" class="btn btn-outline-success btn-sm">Chọn tất</a>
    <a href="#" class="btn btn-outline-success btn-sm">Bỏ chọn</a>
    <a href="#" class="btn btn-outline-success btn-sm">Xóa các mục đã chọn</a>
    <span class="text-warning" style="font-family: rowdies_regula; font-size: 15px;" ><?=(!empty($MES)&& isset($MES))? $MES : ''?></span>

</div>
