<div class="container bg-warning-subtle p-2 text-center text-success my-2">
    <h3>Thống kê hàng hóa từng loại</h3>
</div>
<table class="table container">
    <thead>
        <tr>
            <th scope="col">Loại hàng</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Giá cao nhất</th>
            <th scope="col">Giá thấp nhất</th>
            <th scope="col">Giá trung bình</th>
        </tr>
    </thead> 
    <tbody>
        <?php
            $items = tk_hang_hoa();
            foreach($items as $row){       
                extract($row);   
        ?>
        <tr>
            <td class="col"><?= $ten_loai?></td>
            <td class="col"><?= $so_luong ?></td>
            <td class="col"><?= $gia_max?></td>
            <td class="col"><?= $gia_min?></td>
            <td class="col"><?= $gia_avg ?></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
<div class="container p-0">
    <a href="index.php?act" class="btn btn-outline-success btn-sm">Biểu đồ</a>
    <span class="text-warning" style="font-family: rowdies_regula; font-size: 15px;" ><?=(!empty($MES)&& isset($MES))? $MES : ''?></span>
</div>