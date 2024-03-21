<div class="container mt-4">
  <div class="page-body">
    <div class="row">
      <div class="col-sm-8">
        <div class="card">
          <div class="card-block">
            <h4 class="sub-title">Quản lý loại hàng xuất nhập khẩu</h4>
            <form method="post" action="index.php?action=loai&act=add_loai">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mã Loại</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Mã loại" name="maloai" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tên loại</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Tên loại" name="tenloai" />
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Lưu</button>

              </div>
            </form>
            <div class="form-group">
              <a href="index.php?action=loai&act=edit_loai" class="btn btn-danger">Danh sách</a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>