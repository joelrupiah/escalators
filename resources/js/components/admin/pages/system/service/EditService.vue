<template>
<div id="create_service">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><b><u>Create Sevice Details</u></b></h4>
                  {{ this.$route.params.slug }}
                  <form class="form-sample">
                    <p class="card-description">
                      <b>Service info</b>
                    </p>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Service Title</label>
                            <input type="text" class="form-control form-control-sm" 
                            v-model="form.title" placeholder="Service Title" aria-label="Username">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                            <label>Small Description</label>
                            <ckeditor :editor="editor" v-model="form.smallDescription" :config="editorConfig">
                            </ckeditor>
                        </div>
                      </div>
                    </div>
                    <button type="button" @click.prevent="updateService()"
                     class="btn btn-dark btn-lg btn-block">Update Service</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
        
    </div>
</div>
</template>

<script>
import Api from '../../../../../apis/admin/Api'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic'
export default {
    name: 'EditService',
    data(){
        return {
            form: {
                id: null,
                title: null,
                smallDescription: null,
            },
            // errors: {},
            editor: ClassicEditor,
            editorConfig: {
            }
        }
    },
    methods: {
        getService(){
          Api().get('/admin/show-service/'+this.$route.params.slug)
            .then((response) =>{
                const this_ = this
                this.form.title = response.data.service.title
                this.form.id = response.data.service.id
                this.form.smallDescription = response.data.service.smallDescription
            })
            .catch(error => {
                console.log(error)
            })
      },
        updateService(){
        // console.log(this.$route.params.slug, this.form)
          Api().post('/admin/update-service/'+this.$route.params.slug, this.form)
            .then((response) =>{
              Toast.fire({
                icon: 'success',
                title: 'Project update response success'
              })
                // this.notificationClass = 'vue-notification success'
                // this.$notify({
                //   group: 'foo',
                //   title: 'Success',
                //   text: 'Category Update Request Successful'
                // })
                let self = this
                self.$router.push({name: 'AdminProjects'})
            })
            .catch(error => {
                console.log(error)
            })
      },
    },
    computed: {},
    mounted(){
        this.getService()
    }
}
</script>