<div class="container bg-warning-subtle p-2 text-center text-success my-2">
    <h3>Tổng hợp bình luận</h3>
</div>
<table class="table container">
    <thead>
        <tr>
            <th></th>
            <th scope="col">Hàng hóa</th>
            <th scope="col">Số BL</th>
            <th scope="col">Mới nhất</th>
            <th scope="col">Cũ nhất</th>
            <th></th>
        </tr>
    </thead> 
    <tbody>
        <?php
            $items = tk_binh_luan();
            foreach($items as $row){
        ?>
        <tr>
            <td class"col"><input type="checkbox" name="" id=""></td>
            <td class="col"><?php echo $row['ten_hh']; ?></td>
            <td class="col"><?php echo $row['so_luong']; ?></td>
            <td class="col"><?= $row['moi_nhat'] ?></td>
            <td class="col"><?= $row['cu_nhat'] ?></td>
            <td class="col">
                <a href="index.php?act=detail_bl&id_hh=<?= $row['ma_hh']?>" class="btn btn-sm btn-outline-success">Chi tiết</a>
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
</div>
