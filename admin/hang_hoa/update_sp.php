<div class="container bg-warning-subtle p-2 text-center text-success my-2">
    <h3>Sửa sản phẩm</h3>
</div>
<?php
    if(isset($_GET['id_sp'])){
        $id_sp = $_GET['id_sp'];
    }
    if(isset($_POST['btn_update'])){
        $ma_hh=$_GET['id_sp'];
        $tensp= $_POST['ten_sp'];
        $gia=$_POST['gia'];
        $sale=$_POST['sale'];
        if($_FILES['hinh_anh']['size']==0){
            $img = hang_hoa_select_by_id($id_sp)['hinh'];
        }else{
            $img = $_FILES['hinh_anh']['name'];
            move_uploaded_file($_FILES['hinh_anh']['tmp_name'],'../../content/image/'.$img);
        }
        $ngay_nhap = $_POST['date'];
        $dac_biet = $_POST['dac_biet'];
        $mo_ta = $_POST['mo_ta'];
        $loai_hang = $_POST['loai_hang']; 
        try {
            hang_hoa_update($tensp,$gia,$sale,$img,$ngay_nhap,$mo_ta,$dac_biet,$loai_hang,$ma_hh);
            $MES="Cập nhật thành công!";
        } catch (\Throwable $th) {
            $MES="Cập nhật thất bại!";
        }
    }
?>
<form method="POST" enctype="multipart/form-data" class="container p-0" >
    <div class="row">
        <div class=" col mb-3">
            <label class="fw-semibold" for="">Mã sản phẩm</label>
            <input type="text" class="form-control" name="ma_sp" value="<?= hang_hoa_select_by_id($id_sp)['ma_hh'] ?>" disabled>
        </div>
        <div class="mb-3 col">
            <label class="fw-semibold" for="">Tên sản phẩm</label>
            <input type="text" class="form-control" name="ten_sp" value="<?= hang_hoa_select_by_id($id_sp)['ten_hh'] ?>">
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="fw-semibold" for="">Giá sản phẩm</label>
            <input type="text" class="form-control" name="gia" value="<?= hang_hoa_select_by_id($id_sp)['don_gia'] ?>">
        </div>
        <div class="mb-3 col">
            <label class="fw-semibold" for="">Giảm giá</label>
            <input type="text" class="form-control" name="sale" value="<?= hang_hoa_select_by_id($id_sp)['giam_gia'] ?>">
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="fw-semibold" for="">Hình ảnh</label>
            <input type="file" class="form-control" name="hinh_anh">
        </div>
        <div class="mb-3 col">
            <label class="fw-semibold" for="">Ngày nhập</label>
            <input type="date" class="form-control" name="date" value="<?= hang_hoa_select_by_id($id_sp)['ngay_nhap'] ?>">
        </div>
    </div>
    <div class="row">
        <div class ="col">
            <label class="fw-semibold" for="radio">Hàng đặc biệt</label>
            <div class="mb-3 border py-2 rounded-2 ps-3" id="radio">  
                <div class="form-check-inline form-group">
                    <label for="" class="form-check-label">Đặc biệt</label>
                    
                    <input type="radio" class="form-check-input " name="dac_biet" value="1"<?php if(hang_hoa_select_by_id($id_sp)['dac_biet'] == 1){echo "checked";} ?>>
                </div>
                <div class="form-check-inline form-group">
                    <label for="" class="form-check-lable">Bình thường</label>
                    <input type="radio" class="form-check-input " name="dac_biet" value="0"<?php if(hang_hoa_select_by_id($id_sp)['dac_biet'] == 0){echo "checked";} ?>>
                </div>
            </div>
        </div>
        <div class="col">
            <label class="fw-semibold" for="">Loại hàng</label>
            <select name="loai_hang" id="" class="form-select">
                <?php
                    foreach(loai_select_all() as $row){
                ?>
                    <option value="<?php echo $row['ma_loai']?>" <?php if($row['ma_loai'] == hang_hoa_select_by_id($id_sp)['ma_loai']){echo "selected";} ?>><?php echo $row['ten_loai'] ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <div class="col">
            <label class="fw-semibold" for="">Số lượt xem</label>
            <input type="text" value="<?= hang_hoa_select_by_id($id_sp)['so_luot_xem'] ?>" class="form-control" name="so_luot_xem"disabled  >
        </div>
    </div>
    <div class="mb-3">
        <label class="fw-semibold" for="">Mô tả</label>
        <textarea name="mo_ta" class="form-control" id="" cols="15" rows="5"><?= hang_hoa_select_by_id($id_sp)['mo_ta'] ?></textarea>
    </div>
    <input type="submit" class="btn btn-outline-success btn-sm " value="Sửa sản phẩm" name="btn_update">
    <!-- <input type="submit" class="btn btn-outline-success btn-sm " value="Nhập lại" name="btn_reset"> -->
    <a href="index.php?act=list_sp" class="btn btn-sm btn-outline-success">Danh sách</a>
    <span class="text-warning" style="font-family: rowdies_regula; font-size: 15px;" ><?=(!empty($MES)&& isset($MES))? $MES : ''?></span>
</form>
