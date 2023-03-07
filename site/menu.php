    <nav class="navbar navbar-expand-lg bg-body-tertiary ">
        <div class="container-fluid mx-3">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0" style=" font-size: 20px;">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sản phẩm
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                                $items = loai_select_all();
                                foreach($items as $item){
                                    extract($item);
                            ?>
                                <li><a class="dropdown-item" href="#"><?=$ten_loai?></a></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Giới thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Liên hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Góp ý</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hỏi đáp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Giỏ hàng</a>
                    </li>
                </ul>
                    <form class="d-flex" method="POST" action="index.php?act=search" >
                        <input class="form-control me-2" name="search" type="text" >
                        <input type="submit" class="btn btn-outline-success" name="btn_search" value="Tìm kiếm">
                    </form>
                <ul class="navbar-nav d-flex me-5 flex-row">
                    <?php
                        if(isset($_SESSION['user'])){
                            extract($_SESSION['user']);
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $_SESSION['user']['ten_kh'] ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?act=my_acc">Tài khoản của tôi</a></li>
                                <?php
                                    if($vai_tro == 1){
                                ?>
                                    <li><a class="dropdown-item" href="/xshop/admin/">Tới trang quản trị</a></li>
                                <?php
                                    }
                                ?>
                                <li><a class="dropdown-item" href="index.php?act=logout">Đăng xuất</a></li>
                            </ul>
                        </li>
                    <?php
                        }
                        else{
                    ?>
                        <a href="index.php?act=login" class="btn btn-success me-2">Đăng nhập</a>
                        <a href="index.php?act=signin" class="btn btn-success">Đăng kí</a>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>