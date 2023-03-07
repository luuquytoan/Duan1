<div class="content">
        <h2 class="text-center text-danger fw-bold" style="font-family:lobster_regula; font-size: 40px;">Top Yêu thích</h2>
        <div class="top-like container ">
            <?php
                $items = hang_hoa_select_top5();
                foreach($items as $item){
                    extract($item);
            ?>
            <div class="card top border-0 text-center"style=" overflow: hidden;">
                <a href="index.php?act=sp_ct&id_hh=<?=$ma_hh?>"><img src="../content/image/<?=$hinh?>" class="" alt="">
                    <div class="card-body p-0">
                        <h5 class=""style="color:black;"><?=$ten_hh?></h5>
                    </div>
                    <div class="card_footer" style="color: orange; font-weight: 500; font-size: 17px">
                        <p>Giá: <?=$don_gia?>$</p>
                    </div>
                </a>
                <div class="top-title text-center bg-white" style="">
                    <a href="index.php?act=sp_ct&id_hh=<?=$ma_hh?>" class="btn btn-success">Mua</a>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
        <h2 class="fw-bold my-3 text-center">Sản phẩm của chúng tôi</h2>
        <div class="top-all container ">
            <?php
                $items = hang_hoa_select_all();
                foreach($items as $item){
                    extract($item);
            ?>
            <div class="card top border-0 text-center"style=" overflow: hidden;">
                <a href="index.php?act=sp_ct&id_hh=<?=$ma_hh?>"><img src="../content/image/<?=$hinh?>" class="" alt="">
                    <div class="card-body p-0">
                        <h5 class=""style="color:black;"><?=$ten_hh?></h5>
                    </div>
                    <div class="card_footer" style="color: orange; font-weight: 500; font-size: 17px">
                        <p>Giá: <?=$don_gia?>$</p>
                    </div>
                </a>
                <div class="top-title text-center bg-white" style="">
                    <a href="index.php?act=sp_ct&id_hh=<?=$ma_hh?>" class="btn btn-success">Mua</a>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>