<template>
<div id="admin_login">
      <div class="content-wrapper d-flex align-items-center auth px-0 w-100">
        <div class="row w-100 mx-0">
          <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="/backend/images/logo-dark.svg" alt="logo">
              </div>
              <h6 class="font-weight-light">Input valid email address.</h6>
              <form class="pt-3">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email Address">
                </div>
                <div class="mt-3">
                    <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="">
                        RESET PASSWORD
                    </a>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <router-link :to="{name: 'AdminLogin'}" class="auth-link text-black">
                    Sign in to continue.
                  </router-link>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</template>

<script>
export default {
    name: 'AdminReset'
}
</script>