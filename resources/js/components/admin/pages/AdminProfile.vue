<template>
    <div id="admin_profile">
        <div class="content-wrapper">
        <notifications group="foo" :classes="notificationClass" class="mt-3 mr-1" />
            <div class="row mb-2">
                  <div class="card profile-card bg-gradient-primary">
                    <div class="card-body">
                      <div class="row align-items-center h-100">
                        <div class="col-md-4">
                          <figure class="avatar mx-auto mb-4 mb-md-0">
                            <img :src="fileLink(form.avatar)" alt="avatar" style="width:100px;height:100px">
                          </figure>
                        </div>
                        <div class="col-md-8">
                          <h6 class="text-white text-center text-md-left">
                            <strong>{{ admin.name }}</strong>
                          </h6>
                          <p class="text-white text-center text-md-left">
                            <small>{{ admin.email }}</small>
                          </p>
                          <div class="d-flex align-items-center justify-content-between info pt-2">
                            <div>
                              <p class="text-white font-weight-bold">Birth date</p>
                              <!-- <p class="text-white font-weight-bold">Birth city</p> -->
                            </div>
                            <div>
                              <p class="text-white">{{ admin.dob | time }}</p>
                              <!-- <p class="text-white">Netherlands</p> -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-last-name">Avatar</label>
                  <input type="file" id="input-last-name" class="form-control" @change="loadAvatar($event)">
                </div>
              </div>
            </div>
            
            <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Horizontal Two column</h4>
                  <form class="form-sample">
                    <p class="card-description">
                      Personal info
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Other Names</label>
                          <div class="col-sm-9">
                            <!-- <input type="text" class="form-control" /> -->
                            <el-input placeholder="Input First Name" 
                            v-model="form.name"></el-input>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Surname</label>
                          <div class="col-sm-9">
                            <!-- <input type="text" class="form-control" /> -->
                            <el-input placeholder="Input Last Name" 
                            v-model="form.surname"></el-input>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email Address</label>
                          <div class="col-sm-9">
                            <!-- <input type="text" class="form-control" /> -->
                            <el-input placeholder="Input Email Address" 
                            v-model="form.email"></el-input>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">DOB</label>
                          <div class="col-sm-9">
                            <!-- <input type="text" class="form-control" /> -->
                            <el-date-picker placeholder="Pick a day" 
                            v-model="form.dob" type="date"></el-date-picker>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                            <!-- <input type="text" class="form-control" /> -->
                            <el-input placeholder="Input Password" 
                            v-model="form.password" show-password></el-input>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Confirm Password</label>
                          <div class="col-sm-9">
                            <!-- <input type="text" class="form-control" /> -->
                            <el-input placeholder="Confirm Password" 
                            v-model="form.password_confirmation" show-password></el-input>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <button type="button"  @click.prevent="updateDetails()"
                         class="btn btn-dark btn-lg btn-block">
                          Update Data
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
import Api from '../../../apis/admin/Api'
export default {
    name: 'AdminProfile',
    data(){
      return {
        notificationClass: null,
        admin: {},
        form: {
          name: '',
          surname: '',
          email: '',
          dob: '',
          avatar: '',
          password: '',
          password_confirmation: ''
        }
      }
    },
    methods: {
      fileLink(name){
      if (name != null && name.length < 256) {
        return '/uploads/user/' + name
      }else {
        return this.form.avatar
      }
        
      },
      loadAvatar(e){
        // console.log(e.target.files[0])
        let file = e.target.files[0]
        let reader = new FileReader()
        reader.onload = e => {
          this.form.avatar = e.target.result
        }
        reader.readAsDataURL(file)
      },
      updateDetails(){
        Api().post('/admin/update-user/', this.form)
          .then(response => {
            this.notificationClass = 'vue-notification success'
                    this.$notify({
                      group: 'foo',
                      title: 'Success',
                      text: 'Update data request successful'
                    })
                    // let self = this
                    setTimeout(function(){
                      // self.$router.push({path: '/api/admin'})
                      // window.location.href = '/api/admin'
                    }, 3000)
          })
          .catch(error => {
            
          })
      }
    },
    computed: {
      // admin(){
      //   return this.$store.getters['admin/AUTH_ADMIN']
      // }
    },
    mounted(){
      // this.authAdmin()
      Api().get('/admin/user')
        .then(response => {
          this.admin = response.data
          // console.log(this.admin)
        })
    },
    watch: {
      admin(){
        this.form = this.admin
      }
    }
}
</script>