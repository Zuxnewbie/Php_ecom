<!--banner section start -->
<div class="banner_section layout_padding">
  <div class="container">
    <div id="main_slider" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row" >
            <div class="col-md-6">
              <div class="image_1"><img src="Content/imagetourdien/carousel1.png" width="787px" height="600px"></div>
            </div>
            <div class="col-md-6">
              <h1 class="banner_taital">Morning <span style="color: #ecad15;">Shop</span></h1>
              <p class="banner_text">Morning Fruit là thương hiệu trái cây tươi chất lượng cao, với đa dạng sản phẩm phục vụ mọi nhu cầu: đặc sản vùng miền, trái cây nhập khẩu, quà tặng trái cây, mâm ngũ quả, nước ép, và trái cây sấy.</p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row">
            <div class="col-md-6">
              <div class="image_1"><img src="Content/imagetourdien/carousel2.png"></div>
            </div>
            <div class="col-md-6">
              <h1 class="banner_taital">Morning <span style="color: #ecad15;">Shop</span></h1>
              <p class="banner_text">Morning Fruit là thương hiệu trái cây tươi chất lượng cao, với đa 
                dạng sản phẩm phục vụ mọi nhu cầu: đặc sản vùng miền, trái cây nhập khẩu, quà tặng trái 
                cây, mâm ngũ quả, nước ép, và trái cây sấy.</p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row">
            <div class="col-md-6">
              <div class="image_1"><img src="Content/imagetourdien/carousel3.png"></div>
            </div>
            <div class="col-md-6">
              <h1 class="banner_taital">Morning <span style="color: #ecad15;">Shop</span></h1>
              <p class="banner_text">Morning Fruit là thương hiệu trái cây tươi chất lượng cao, với đa 
                dạng sản phẩm phục vụ mọi nhu cầu: đặc sản vùng miền, trái cây nhập khẩu, quà tặng trái 
                cây, mâm ngũ quả, nước ép, và trái cây sấy.</p>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
        <i class=""><img src="Content/images/left-icon.png"></i>
      </a>
      <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
        <i class=""><img src="Content/images/right-icon.png"></i>
      </a>
    </div>
  </div>
</div>
<!--banner section end -->

<!--about section start -->
<div class="about_section layout_padding">
  <div class="vegetables_section layout_padding">
    <div class="container">
      <div class="image_2"><img src="Content/images/img-2.png"></div>
      <h1 class="about_taital">Our Vegetables</h1>
      <p class="lorem_text">Reader will be distracted by the readable content of a</p><br><br>

      <h3 class="about_taital">All Product</h3>
      <a href="index.php?action=sanpham">
        <span style="color: gray; float: right; font-size:large">Xem chi tiết</span>
    </div>
    </a>
    <div class="vegetables_section_2 layout_padding">
      <div class="row">
        <?php
        $hh = new HangHoa();
        $result = $hh->getHangHoa();
        while ($set = $result->fetch()):
          ?>
          <div class="col-md-3">
            <div class="box_section">
              <div class="image_4"><img src="Content/imagetourdien/<?php echo $set['hinh']; ?>"></div>
              <h2 class="dolor_text">
                <?php echo $set['tenhh']; ?>
              </h2>
              <h2 class="dolor_text"><span style="color: #ebc30a;">
                  <?php echo number_format($set['dongia']); ?>
                </span>VND</h2>
              <h2 class="dolor_text_1">1 kg</h2>
              <p class="tempor_text">
                So luot xem:
                <?php echo $set['soluotxem'] ?>
              </p>
              <div class="buy_bt_1 active"><a
                  href="./index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'] ?>">Details</a></div>
            </div>
          </div>


        <?php endwhile; ?>
      </div>

    </div>
    <!-- <div class="read_bt_1" style="float: right;"><a href="#">Read More</a></div> -->
  </div>

  <div class="container">

    <h3 class="about_taital">All Product Sale</h3>

    <a href="index.php?action=sanpham&act=sanphamkhuyenmai">
      <span style="color: gray; float: right; font-size:large">Xem chi tiết</span>
  </div>
  </a>
  <div class="vegetables_section_2 layout_padding">
    <div class="row">
      <?php
      $hh = new HangHoa();
      $result = $hh->saleHangHoa();
      while ($set = $result->fetch()):
        ?>
        <div class="col-md-3">
          <div class="box_section">
            <div class="image_4"><img src="Content/imagetourdien/<?php echo $set['hinh']; ?>"></div>
            <h2 class="dolor_text">
              <?php echo $set['tenhh']; ?>
            </h2>
            <h2 class="dolor_text"><span style="color: #ebc30a;">
                <?php echo number_format($set['dongia'] - $set['giamgia']); ?>VND <br>
                <strike>
                  <?php echo number_format($set['dongia']); ?>
                </strike>
              </span>VND</h2>
            <h2 class="dolor_text_1">1 kg</h2>
            <p class="tempor_text">
              So luot xem:
              <?php echo $set['soluotxem'] ?>
            </p>
            <div class="buy_bt_1 active"><a
                href="./index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'] ?>">Details</a></div>
          </div>
        </div>


      <?php endwhile; ?>
    </div>

  </div>
  <!-- <div class="read_bt_1" style="float: right;"><a href="#">Read More</a></div> -->
</div>


<!--about section end -->
<!--choose section start -->
<div class="choose_section layout_padding">
  <div class="container">
    <div class="image_2"><img src="Content/images/img-2.png"></div>
    <h1 class="about_taital">Why Choose Us</h1>
    <div class="image_3"><img src="Content/images/img-14.png"></div>
    <p class="lorem_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
      aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
    <div class="read_bt_1"><a href="#">Read More</a></div>
  </div>
</div>
<!--choose section end -->
<!--testimonial section start -->

<!-- <div class="testimonial_section layout_padding">
    <div class="container">
      <div id="my_slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="image_2"><img src="Content/images/img-2.png"></div>
            <h1 class="about_taital">Testimonial</h1>
            <div class="testimonial_main">
              <div class="client_main">
                <div class="client_left">
                  <div><img src="Content/images/client-img.png" class="client_img"></div>
                </div>
                <div class="client_right">
                  <h4 class="magna_text">Magna</h4>
                  <p class="consectetur_text">Consectetur adipiscing</p>
                </div>
              </div>
              <p class="ipsum_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum</p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="image_2"><img src="Content/images/img-2.png"></div>
            <h1 class="about_taital">Testimonial</h1>
            <div class="testimonial_main">
              <div class="client_main">
                <div class="client_left">
                  <div><img src="Content/images/client-img.png" class="client_img"></div>
                </div>
                <div class="client_right">
                  <h4 class="magna_text">Magna</h4>
                  <p class="consectetur_text">Consectetur adipiscing</p>
                </div>
              </div>
              <p class="ipsum_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum</p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="image_2"><img src="Content/images/img-2.png"></div>
            <h1 class="about_taital">Testimonial</h1>
            <div class="testimonial_main">
              <div class="client_main">
                <div class="client_left">
                  <div><img src="Content/images/client-img.png" class="client_img"></div>
                </div>
                <div class="client_right">
                  <h4 class="magna_text">Magna</h4>
                  <p class="consectetur_text">Consectetur adipiscing</p>
                </div>
              </div>
              <p class="ipsum_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
          <i class=""><img src="Content/images/left-icon1.png"></i>
        </a>
        <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
          <i class=""><img src="Content/images/right-icon1.png"></i>
        </a>
      </div>
    </div>
  </div> -->

<!--testimonial section end -->
<!--contact section start -->


<!-- <div class="contact_section layout_padding">
    <div class="container">
        <div class="image_2"><img src="Content/images/img-2.png"></div>
        <h1 class="about_taital">Contact Us</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="mail_sectin">
                    <input type="text" class="email-bt" placeholder="Your Name" name="Name">
                    <input type="text" class="email-bt" placeholder="Email" name="Name">
                    <input type="text" class="email-bt" placeholder="Phone Number" name="Name">
                    <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                    <div class="send_bt"><a href="#">Send</a></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map_main">
                    <div class="map-responsive">
                        <iframe
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France"
                            width="600" height="480" frameborder="0" style="border:0; width: 100%;"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->


<!--contact section end -->