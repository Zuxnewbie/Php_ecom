<?php 
    if (isset($_SESSION['makh'])) {
        $makh = $_SESSION['makh'];
        $mahh = $_POST['txtmahh'];
        $comment = $_POST['comment'];

        $result = new Comment();
        $result->insertComment($makh, $mahh, $comment);
    }

    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&act=sanphamchitiet&id='.$mahh.'"/>';

?>