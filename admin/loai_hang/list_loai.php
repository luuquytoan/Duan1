<div class="container bg-warning-subtle p-2 text-center text-success my-2">
    <h3>Danh sách loại hàng</h3>
</div>
<table class="table container">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Mã lọai</th>
            <th scope="col">Tên loại</th>
            <th></th>
        </tr>
    </thead> 
    <tbody>
        <?php
            foreach(loai_select_all() as $row){
        ?>
        <tr>
            <td class="col"><input type="checkbox" name="" id=""></td>
            <td class="col"><?php echo $row['ma_loai']; ?></td>
            <td class="col"><?php echo $row['ten_loai']; ?></td>
            <td class="col">
                <a href="index.php?act=update_loai&id_loai=<?php echo $row['ma_loai']?>" class="btn btn-sm btn-outline-success">Sửa</a>
                <a href="index.php?act=delete_loai&id_loai=<?php echo $row['ma_loai']?>" onclick="return confirm('Bạn có chắc chắn xóa không');" class="btn btn-sm btn-outline-success">Xóa</a>
            </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
<div class="container p-0">
    <a href="#" class="btn btn-outline-success btn-sm">Chọn tất</a>
    <a href="#" class="btn btn-outline-success btn-sm">Bỏ chọn</a>
    <a href="#" class="btn btn-outline-success btn-sm">Xóa các mục đã chọn</a>
    <a href="index.php?act=add_loai" class="btn btn-outline-success btn-sm">Thêm mới</a>
    <span class="text-warning" style="font-family: rowdies_regula; font-size: 15px;" ><?=(!empty($MES)&& isset($MES))? $MES : ''?></span>
</div>
