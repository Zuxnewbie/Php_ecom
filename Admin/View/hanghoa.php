<div class="container">
  <div class="card">
    <div class="card-header">
      <h2>Danh Sach San Pham</h2>
      <div class="card-header-right">
        <a href="index.php?action=hanghoa&act=insert_hanghoa">
          <h4>Thêm sản phẩm</h4>
        </a>
      </div>
    </div>
    <div class="card-block table-border-style">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr class="table-primary">
              <th>Mã hàng</th>
              <th>Tên hàng</th>
              <th>Đơn giá</th>
              <th>Giảm giá</th>
              <th>Mã loại</th>
              <th>Đặc biệt</th>
              <th>Số lượt xem</th>
              <!-- <th>Ngày lập</th> -->
              <th>Mô tả</th>
              <th>Update</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $hh = new hanghoa();
            $result = $hh->getHangHoa();
            while ($set = $result->fetch()):
              ?>
              <tr>
                <td>
                  <?php echo $set['mahh']; ?>
                </td>
                <td>
                  <?php echo $set['tenhh']; ?>
                </td>
                <td>
                  <?php echo $set['dongia']; ?>
                </td>
                <td>
                  <?php echo $set['giamgia']; ?>
                </td>
                <td>
                  <?php echo $set['maloai']; ?>
                </td>
                <td>
                  <?php echo $set['dacbiet']; ?>
                </td>
                <td>
                  <?php echo $set['soluotxem']; ?>
                </td>

                <td>
                  <div style="white-space: pre-line;">
                    <?php echo $set['mota']; ?>
                  </div>
                </td>
                <td><a href="index.php?action=hanghoa&act=update_hanghoa&id=<?php echo $set['mahh']; ?>">Cập nhật</a></td>
                <td>
                  <form action="index.php?action=hanghoa&act=delete_hanghoa" method="post">
                    <input type="hidden" name="mahh" value="<?php echo $set['mahh']; ?>">
                    <input type="hidden" name="soft_delete" value="1">
                    <input type="submit" value="Xóa">
                  </form>
                </td>
              </tr>
              <?php
            endwhile;
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>