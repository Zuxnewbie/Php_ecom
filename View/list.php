<?php

// $ac = 0;
if (isset($_GET['action'])) {
    if (isset($_GET['act']) && $_GET['act'] == '1') {
        $ac = 1;
    } else if (isset($_GET['act']) && $_GET['act'] == '2') {
        $ac = 2;
    } else if (isset($_GET['act']) && $_GET['act'] == '3') {
        $ac = 3;
    } else {
        $ac = 8;
    }
}

?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <section id="examples">

                <!-- Heading -->
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if ($ac == 1) {
                            echo '<h2 class="mb-5 font-weight-bold text-center" style="color: red;">Trái Cây Nhập Khẩu</h2>';
                        }
                        if ($ac == 2) {
                            echo '<h2 class="mb-5 font-weight-bold text-center" style="color: red;">Trái Cây Việt Nam</h2>';
                        }
                        if ($ac == 3) {
                            echo '<h2 class="mb-5 font-weight-bold text-center" style="color: red;">Trái Cây Thái Lan</h2>';
                        }
                        if ($ac == 8) {
                            echo '<h2 class="mb-5 font-weight-bold text-center" style="color: red;">Trái Cây Nhật Bản</h2>';
                        }
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<div class="about_section">
    <!--vegetables  section start -->
    <div class="vegetables_section layout_padding">
        <div class="container">
            <div class="vegetables_section_2 layout_padding">
                <div class="row">

                    <?php
                    $hh = new HangHoa();
                    if ($ac == 1) {
                        // $result = $hh->getHangHoa();
                        // $result = $hh->getHangHoaAllPage($start, $limit);
                        $result = $hh->getNhapKhau();
                        // echo $start;
                        // echo $limit;
                    }
                    if ($ac == 2) {
                        $result = $hh->getVN();
                        // $result = $hh->getHangHoaAllSale($start, $limit);
                    }

                    if ($ac == 3) {
                        // if (isset($_POST['txtsearch'])) {
                        //     $tenhh = $_POST['txtsearch'];
                        //     $result = $hh->selectSearch($tenhh, $start, $limit);
                        // }
                        $result = $hh->getTL();
                        
                    }
                    if ($ac == 8) {
                        $result = $hh->getNB();

                        
                    }
                    //do tung sp len view
                    while ($set = $result->fetch()):
                        ?>
                        <div class="col-md-4">
                            <div class="box_section">
                                <div class="image_4"><img src="Content/imagetourdien/<?php echo $set['hinh']; ?>"></div>
                                <h2 class="dolor_text">
                                    <?php echo $set['tenhh']; ?>
                                </h2>

                                <?php
                                if ($ac == 1) {
                                    echo '<h2 class="dolor_text"><span style="color: #ebc30a;">
                                    ' . number_format($set['dongia']) . '
                                    </span>VND</h2>';
                                }
                                if ($ac == 2) {
                                    echo '<h2 class="dolor_text"><span style="color: #ebc30a;">
                                    ' . number_format($set['dongia']) . '
                                    </span>VND</h2>';
                                }
                                if ($ac == 3) {
                                    echo '<h2 class="dolor_text"><span style="color: #ebc30a;">
                                    ' . number_format($set['dongia']) . '
                                    </span>VND</h2>';
                                }
                                if ($ac == 8) {
                                    echo '<h2 class="dolor_text"><span style="color: #ebc30a;">
                                    ' . number_format($set['dongia']) . '
                                    </span>VND</h2>';
                                }
                                ?>

                                <h2 class="dolor_text_1"> - 1 kg</h2>
                                <p class="tempor_text">
                                    So luot xem:
                                    <?php echo $set['soluotxem'] ?>
                                </p>
                                <div class="buy_bt_1 active"><a href="#">Buy Now</a></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>