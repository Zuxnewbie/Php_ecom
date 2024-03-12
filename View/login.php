<section >
  <div class="mask d-flex align-items-center h-100 gradient-custom-3 " style="width: 1200px;">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Login Here</h2>

              <form action="index.php?action=log_in&act=log_in_action" method="post" role="form">

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1cg">Username</label>
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="txtusername" retypepassword/>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4cg">Password</label>
                  <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="txtpassword"/>
                </div>


                <div class="d-flex justify-content-center">
                  <button type="submit" name="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Log in</button>
                </div>

                
              </form>
              <p class="text-right mt-5 mb-0 text-danger"><a href="index.php?action=forget"
                  class="fw-bold text-body text-danger">Forget Password ?</a></p>

              <p class="text-center text-muted mt-5 mb-0">Have not already an account? <a href="index.php?action=sign_in"
                  class="fw-bold text-body"><u>Sign-in here</u></a></p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>