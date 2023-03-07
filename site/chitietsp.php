<?php
if(isset($_GET['id_hh'])){
    $id_hh = $_GET['id_hh'];
    $items = hang_hoa_select_by_id($_GET['id_hh']);
    extract($items);
}
?>
<div class="container">
    <div class="row border-bottom pb-4">
        <div class="col text-center">
            <img src="../content/image/<?=$hinh?>" style="width: 55.5%;" alt="">
        </div>
        <div class="col ">
            <div class="card border-0 pt-5">
                <div class="card-body" style="border-radius: 0;">
                    <h5 class="card-title mb-3 text-primary " style="font-family: Arial, Helvetica, sans-serif;font-weight: 700; font-size: 25px;"><?=$ten_hh?></h5>
                    <p class="card-subtitle mb-2 text-muted" style="font-size: 12px;">Giá cũ: <s>12345678</s></p>
                    <h6 class="card-subtitle text-danger-emphasis " style="font-size: 25px;">Giá: <?=$don_gia?>$</h6>
                    <div class="stars my-3 border-bottom pb-4" style="color:orange;">
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <form action="" class="">
                        <label for="quantity">Số lượng</label>
                        <input name="quantity" type="number" value="1" min="1" class=" border-success border d-flex mb-2" style="width: 3rem; outline: none;">
                        <a href="#" class="btn btn-warning">Giỏ hàng</a>
                        <a href="#" class="btn btn-warning">Mua ngay</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row border-bottom">
        <h4 class="bg-light p-1 ps-3" style="font-family: pacifico_regula; font-size: 20px;">Mô tả</h4>
        <div class="col">
            <p><?=$mo_ta?></p>
        </div>
    </div>





    <div class="row  border-bottom pb-2">
        <h4 class="bg-light p-1 ps-3" style="font-family: pacifico_regula; font-size: 20px;">Bình luận</h4>
        <div class="card">
            <div class="card-body grid">
                <?php
                    $comments = binh_luan_select_by_id($id_hh);
                    foreach ($comments as $comment) {
                        extract($comment);
                ?>
                    <div class="bg-body-secondary mb-2 " style="display:inline-block; padding: 5px 10px; border-radius: 10px; width: auto;">
                        <h6 class="card-title"><?= khach_hang_select_by_id($ma_kh)['ten_kh'] ?></h6>
                        <p class="card-text ps-3"><?= $noi_dung ?></p>
                    </div><br>
                <?php
                    }
                ?>
            </div>
            <div class="card-footer border-0 bg-white text-center">
                <form action="" method="POST" class="d-flex">
                    <input class="form-control me-2" type="text" name="noi_dung" placeholder="Nội dung" aria-label="Search">
                    <button class="btn btn-light" type="submit" name="btn_gui">Gửi</button>
                </form>
                <span class="text-warning" style="font-family: rowdies_regula; font-size: 15px;" ><?=(!empty($MES)&& isset($MES))? $MES : ''?></span>
            </div>
        </div>
    </div>

    <div class="row pb-4 ">
        <h4 class="bg-light p-1 ps-3" style="font-family: pacifico_regula; font-size: 20px;">Sản phẩm tương tự</h4>
        <div class="top-all">
            <?php
                $sp_tt = hang_hoa_select_by_loai($ma_loai);
                foreach($sp_tt as $row){
            ?>
            <div class="card top border-0 text-center"style=" overflow: hidden;">
                <a href="index.php?act=sp_ct&id_hh=<?=$row['ma_hh']?>"><img src="../content/image/<?=$row['hinh']?>" class="" alt=""></a>
                <div class="card-body p-0">
                    <h5 class=""><?=$row['ten_hh']?></h5>
                </div>
                <div class="card_footer" style="color: orange; font-weight: 500; font-size: 17px">
                    <p>Giá: <?=$row['don_gia']?>$</p>
                </div>
                <div class="top-title text-center bg-white" style="">
                    <a href="index.php?act=sp_ct&id_hh=<?=$row['ma_hh']?>" class="btn btn-success">Mua</a>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>