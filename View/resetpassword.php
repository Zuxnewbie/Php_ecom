<section >
  <div class="mask d-flex align-items-center h-100 gradient-custom-3 " style="width: 1200px;">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Reset password</h2>

              <form action="index.php?action=forget&act=resetpassword" method="post" role="form">

                <div class="form-outline mb-4">
                  <input type="hidden" name="email" value="">
                  <label class="form-label" for="form3Example1cg">Enter New Password from email</label>
                  <input type="password" id="form3Example1cg" class="form-control form-control-lg" name="password" retypepassword/>
                </div>

                <!-- <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1cg">Password again</label>
                  <input type="password" id="form3Example1cg" class="form-control form-control-lg" name="password" retypepassword/>
                </div> -->

                <div class="d-flex justify-content-center">
                  <button type="submit" name="submit_password"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Reset Password</button>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>