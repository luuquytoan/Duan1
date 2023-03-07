<div class="container bg-warning-subtle p-2 text-center text-success my-2">
    <h3>Danh sách khách hàng</h3>
</div>
<table class="table container text-center">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Mã KH</th>
            <th scope="col">Tên KH</th>
            <th scope="col">Mật khẩu</th>
            <th scope="col">Email</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Vai trò</th>
            <th></th>
        </tr>
    </thead> 
    <tbody>
        <?php
            foreach(khach_hang_select_all() as $row){
        ?>
        <tr class="">
            <td class="col p-3"><input type="checkbox" name="" id=""></td>
            <td class="col p-3"><?php echo $row['ma_kh']; ?></td>
            <td class="col p-3"><?php echo $row['ten_kh']; ?></td>
            <td class="col p-3"><?php echo $row['mat_khau'] ?></td>
            <td class="col p-3"><?php echo $row['email'] ?></td>
            <td class="col"><img src="../../content/image/<?php echo $row['hinh']?>" width="50" height="auto" alt=""></td>
            <td class="col p-3"><?php echo $row['vai_tro'] ?></td>
            <td class="col p-3">
                <a href="index.php?act=update_kh&id_kh=<?php echo $row['ma_kh']?>" class="btn btn-sm btn-outline-success">Sửa</a>
                <a href="index.php?act=delete_kh&id_kh=<?php echo $row['ma_kh']?>" onclick="return confirm('Bạn có chắc chắn xóa không');" class="btn btn-sm btn-outline-success">Xóa</a>
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
    <a href="index.php?act=add_kh" class="btn btn-outline-success btn-sm">Thêm mới</a>
    <span class="text-warning" style="font-family: rowdies_regula; font-size: 15px;" ><?=(!empty($MES)&& isset($MES))? $MES : ''?></span>
</div>