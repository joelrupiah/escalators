<template>
<div id="admin_login">
      <div class="content-wrapper d-flex align-items-center auth px-0 w-100">
        <notifications group="foo" :classes="notificationClass" class="mt-3 mr-1" />
        <div class="row w-100 mx-0">
          <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="/backend/images/logo-dark.svg" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" @submit.prevent="login">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" v-model="form.email"
                  id="exampleInputEmail1" placeholder="Email Address">
                  <span class="text-danger" v-if="errors.email">
                    {{ errors.email[0] }}
                  </span>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" v-model="form.password" 
                  id="exampleInputPassword1" placeholder="Password">
                  <span class="text-danger" v-if="errors.password">
                    {{ errors.password[0] }}
                  </span>
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                    SIGN IN
                  </button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <router-link :to="{name: 'AdminReset'}" class="auth-link text-black">
                    Forgot password?
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
import Api from '../../../../apis/admin/Api'
export default {
    name: 'AdminLogin',
    data(){
      return {
        notificationClass: null,
        form: {
          email: "",
          password: "",
        },
        errors: []
      }
    },

    methods: {
      login(){
        Api().post('/admin/login', this.form)
          .then(response => {
            this.$store.commit('admin/LOGIN', true)
            localStorage.setItem("token", response.data)
                this.notificationClass = 'vue-notification success'
                    this.$notify({
                      group: 'foo',
                      title: 'Success',
                      text: 'Login request successful'
                    })
                    // let self = this
                    setTimeout(function(){
                      // self.$router.push({path: '/api/admin'})
                      window.location.href = '/api/admin'
                    }, 3000)
            // this.$router.push({name: 'AdminDashboard'})
          })
          // .catch(error =>{
          //   if (error.response.data.status === 422) {
          //     this.errors = error.response.data.errors
          //   }
          // })
      }
    }
}
</script>