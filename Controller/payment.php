<?php
    if (isset($_SESSION['makh'])) {
        $makh = $_SESSION['makh'];

        $hd = new Bill();

        $sohd = $hd->insertBill($makh);

        $_SESSION['mshd'] = $sohd;
        
        $total = 0;

        foreach ($_SESSION['cart'] as $key => $value) {

            // echo "This is TESTing from foreach SESSION['cart'] ";
            
            $hd->insert_Bill_details($sohd, $value['mahh'], $value['maloai'], $value['soluong'], $value['thanhtien']);

            $total += $value['thanhtien'];



        }
        $hd->update_total_money($sohd, $makh, $total);
    }
    unset($_SESSION['cart']);
    include_once "./View/payment.php";
?>