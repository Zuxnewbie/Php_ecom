<!--header section end -->


<!-- end quảng cáo -->
<?php
$hh = new HangHoa();
$count = $hh->getHangHoaAll()->rowCount();

$limit = 6;
$trang = new Page();
$start = $trang->findStart($limit);
$page = $trang->findPage($count, $limit);



$ac = 1; // testing with $ac = 0 , default = 1
if (isset($_GET['action'])) {
    if (isset($_GET['act']) && $_GET['act'] == 'sanphamkhuyenmai') {
        $ac = 2;
    } 
    else if (isset($_GET['act']) && $_GET['act'] == 'search'){
        $ac = 3;
    }   
    else {
        $ac = 1;
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
                            echo '<h2 class="mb-5 font-weight-bold text-center" style="color: red;">All Product New</h2>';
                        }
                        if ($ac == 2) {
                            echo '<h2 class="mb-5 font-weight-bold text-center" style="color: red;">All Sale Product</h2>';
                        }
                        if ($ac == 3) {
                            
                            echo '<h2 class="mb-5 font-weight-bold text-center" style="color: red;">Search Product For '.$_POST['txtsearch'].'</h2>';
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
                        $result = $hh->getHangHoaAllPage($start, $limit);
                        // echo $start;
                        // echo $limit;
                    }
                    if ($ac == 2) {
                        $result = $hh->getHangHoaAllSale($start, $limit);
                    }

                    if ($ac == 3) {
                        if (isset($_POST['txtsearch'])) {
                            $tenhh = $_POST['txtsearch'];
                            $result = $hh->selectSearch($tenhh, $start, $limit);
                        }
                        
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
                                if ($ac == 3) {
                                    echo '<h2 class="dolor_text"><span style="color: #ebc30a;">
                                    ' . number_format($set['dongia']) . '
                                    </span>VND</h2>';
                                }
                                if ($ac == 2) {
                                    echo '<h2 class="dolor_text"><span style="color: #ebc30a;">
                                    ' . number_format($set['dongia'] - $set['giamgia']) . '>VND <br>
                                    <strike>' . number_format($set['dongia']) . ' ></strike>
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
                <!-- pagination -->
                <?php if ($ac == 1):
                    
                ?>
                <div class="col-md-6 offset-md-5">
                    <ul class="pagination">
                        <?php
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        // echo $count . "</br>";
                        // echo $page . "</br>";
                        // echo $start . "</br>";
                        
                        // echo '<li class="page-item"><a class="page-link" href="./index.php?action=sanpham&page=' . ($current_page - 1) . '">Prev</a></li>';
                        if ($current_page > 1 && $page > 1) {
                            echo '<li class="page-item"><a class="page-link" href="./index.php?action=sanpham&page=' . ($current_page - 1) . '">Prev</a></li>';
                        }
                        for ($i = 1; $i <= $page; $i++) {
                            echo '<li class="page-item"><a class="page-link" href="./index.php?action=sanpham&page=' . $i . '">' . $i . '</a></li>';
                        }
                        if ($current_page < $page && $page > 1) {
                            echo '<li class="page-item"><a class="page-link" href="./index.php?action=sanpham&page=' . ($current_page + 1) . '">Next</a></li>';
                        }
                        ?>
                    </ul>
                </div>
                <?php endif;?>

            </div>




            <!-- <div class="read_bt_1"><a href="#">Read More</a></div> -->
        </div>
    </div>
</div>


<!--vegetables section end -->
<!--footer section start -->