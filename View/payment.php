<?php
if (!isset($_SESSION['makh'])):
  echo "<script> alert('Ban chua dang nhap')</script>";
  echo "<meta http-equiv='refresh' content='0;url=./index.php?action=log_in'/>";
?>
<?php
else:
  ?>
  <div class="container">
    <section style="background-color: #eee;">
      <div class="container py-5 ">
        <div class="card">
          <?php
          if (isset($_SESSION['mshd'])) {
            $mshd = $_SESSION['mshd'];
            $hd = new Bill();
            $kh = $hd->getInfor_Customer($mshd);
            $ngay = $kh['date'];
            $tenkh = $kh['tenkh'];
            $dc = $kh['diachi'];
            $sodt = $kh['sodienthoai'];
            $index = 0;
            $product = $hd->getInfor_Product($mshd);
            $tien = $hd->selectTotalMoney($mshd);
            $money = $tien['tongtien'];

            ?>
            <div class="card-body">
              <div class="row d-flex justify-content-center pb-5">
                <div class="col-md-7 col-xl-5 mb-4 mb-md-0">
                  <!-- <div class="py-4 d-flex flex-row">
                    <h5><b>Payment Bill</b></h5>
                  </div> -->
                  <h4>Payment Bill</h4>
                  <?php while ($set = $product->fetch()):
                    $index++;
                    ?>
                    <div class="pt-2">
                      <div class="d-flex pb-2">
                        <div class="ms-auto">
                          <p class="text-primary">
                            <?php echo $index; ?>.
                          </p>
                        </div>
                        <div>
                          <p>
                            <b>
                              <?php echo $set['tenhh']; ?><span class="ml-2 text-success">-</span>
                            </b>
                          </p>
                          <p>
                            <?php echo number_format($set['dongia']); ?>VNĐ
                          </p>
                        </div>
                      </div>
                      <p>
                        <?php echo $set['tenloai']; ?>
                      </p>

                    <?php endwhile; ?>
                    <div class="p-2 d-flex">
                      <div class="col-8"><b></b></div>
                      <div class="ms-auto text-right"><b class="text-info">Add your Voucher</b></div>
                    </div>

                    <div class="p-2 d-flex">
                      <div class="col-8"><b>Total</b></div>

                      <div class="ms-auto"><b class="text-success">
                          <?php echo number_format($money); ?>VND
                        </b></div>
                    </div>

                    <input type="button" value="Proceed to payment" class="btn btn-primary btn-block btn-lg" />
                  </div>

                </div>

                <div class="col-md-5 col-xl-4 offset-xl-1">
                  <div class="py-4 d-flex justify-content-end">
                    <h6><a href="./index.php?action=home">Cancel and return to website</a></h6>
                  </div>
                  <div class="rounded d-flex flex-column p-2" style="background-color: #f8f9fa;">
                    <div class="p-2 me-3">
                      <h4>Information Customer</h4>
                    </div>
                    <div class="p-2 d-flex">
                      <div class="col-8">Bill number:</div>
                      <div class="ms-auto">
                        <?php echo $mshd; ?>
                      </div>
                    </div>
                    <div class="p-2 d-flex">
                      <div class="col-8">Fullname:</div>
                      <div class="ms-auto">
                        <?php echo $tenkh; ?>
                      </div>
                    </div>
                    <div class="p-2 d-flex">
                      <div class="col-8">Address:</div>
                      <div class="ms-auto">
                        <?php echo $dc; ?>
                      </div>
                    </div>
                    <div class="p-2 d-flex">
                      <div class="col-8">Phone number: </div>
                      <div class="ms-auto">
                        <?php echo $sodt; ?>
                      </div>
                    </div>
                    <div class="p-2 d-flex pt-3">
                      <div class="col-8">Date's Bill Created: </div>
                      <div class="ms-auto">
                        <?php echo $ngay; ?>
                      </div>
                    </div>
                    <div class="border-top px-2 mx-2"></div>
                  </div>
                </div>
              </div>
            </div>

          <?php } else {
            echo "DONT SEE ANY SESSION['MSHD'] !!!!!!!";
          } ?>
        </div>
      </div>
    </section>
  </div>

<?php endif ?>