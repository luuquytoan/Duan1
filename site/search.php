
<div class="top-all container mt-2">
    <?php
    $sp = hang_hoa_select_keyword($search);
            foreach($sp as $row){
                extract($row);
    ?>
    <div class="card top border-0 text-center"style=" overflow: hidden;">
        <a href="index.php?act=sp_ct&id_hh=<?=$ma_hh?>"style="text-decoration:none;"><img src="../content/image/<?=$hinh?>" class="" alt="" >
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