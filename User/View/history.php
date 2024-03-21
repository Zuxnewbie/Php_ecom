<?php
if (!isset($_SESSION['makh'])) {
    echo "<script> alert('Bạn chưa đăng nhập')</script>";
    echo "<meta http-equiv='refresh' content='0;url=./index.php?action=log_in'/>";
} else {
    ?>
    <div class="container">
        <!-- Modal end -->
        <?php
        if (isset($_SESSION['makh'])) {
            $makh = $_SESSION['makh'];
            $htr = new History();

            $result = $htr->selectHistory($makh);

            // Check if there are any results
            if ($result->rowCount() > 0) {
                ?>
                <div class="row mt-3 pl-3 pr-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Mã số hóa đơn</th>
                                <th>Khách Hàng</th>
                                <th>Tên hàng hóa</th>
                                <th>Ngày mua</th>
                                <!-- <th>Giá</th> -->
                                <th>Số lượng</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Loop through the results and display them
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row['mshd']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['tenkh']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['tenhh']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['date']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['soluongmua']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['diachi']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['sodienthoai']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['thanhtien']; ?>
                                    </td>

                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php
            } else {
                echo "No history found."; // Or any message you want to display when there's no history
            }
        }
        ?>
    </div>
    <?php
}
?>