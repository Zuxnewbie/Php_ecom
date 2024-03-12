<section >
  <div class="mask d-flex align-items-center h-100 gradient-custom-3 " style="width: 1200px;">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form action="index.php?action=sign_in&act=sign_in_action" method="post" role="form">

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="txttenkh" retypepassword/>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                  <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="txtemail" retypepassword/>
                </div>
                
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1cg">Address</label>
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="txtdiachi" retypepassword/>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1cg">Phone Number</label>
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="txtsodt" retypepassword/>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1cg">Username</label>
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="txtusername" retypepassword/>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4cg">Password</label>
                  <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="txtpass"/>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                  <input type="password" id="form3Example4cdg" class="form-control form-control-lg" name="retypepassword"/>
                </div>

                <!-- <div class="form-check d-flex justify-content-center mb-5">
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                </div> -->

                <div class="d-flex justify-content-center">
                  <button type="submit" name="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>