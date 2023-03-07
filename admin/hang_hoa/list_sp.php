<div class="container bg-warning-subtle p-2 text-center text-success my-2">
    <h3>Danh sách sản phẩm</h3>
</div>
<table class="table container text-center">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Mã HH</th>
            <th scope="col">Tên HH</th>
            <th scope="col">Đơn giá</th>
            <th scope="col">Giảm giá</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Lượt xem</th>
            <th></th>
        </tr>
    </thead> 
    <tbody>
        <?php
            foreach(hang_hoa_select_all() as $row){
        ?>
        <tr class="">
            <td class="col p-3"><input type="checkbox" name="" id=""></td>
            <td class="col p-3"><?php echo $row['ma_hh']; ?></td>
            <td class="col p-3"><?php echo $row['ten_hh']; ?></td>
            <td class="col p-3"><?php echo $row['don_gia'] ?></td>
            <td class="col p-3"><?php echo $row['giam_gia'] ?></td>
            <td class="col"><img src="../../content/image/<?php echo $row['hinh']?>" width="45" height="45" alt=""></td>
            <td class="col p-3"><?php echo $row['so_luot_xem'] ?></td>
            <td class="col p-3">
                <a href="index.php?act=update_sp&id_sp=<?php echo $row['ma_hh']?>" class="btn btn-sm btn-outline-success">Sửa</a>
                <a href="index.php?act=delete_sp&id_sp=<?php echo $row['ma_hh']?>" onclick="return confirm('Bạn có chắc chắn xóa không');" class="btn btn-sm btn-outline-success">Xóa</a>
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
    <a href="index.php?act=add_sp" class="btn btn-outline-success btn-sm">Thêm mới</a>
    <span class="text-warning" style="font-family: rowdies_regula; font-size: 15px;" ><?=(!empty($MES)&& isset($MES))? $MES : ''?></span>
</div>