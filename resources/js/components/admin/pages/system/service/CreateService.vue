<template>
<div id="create_service">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><b><u>Create Sevice Details</u></b></h4>
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
                    <button type="button" @click.prevent="createService()"
                     class="btn btn-dark btn-lg btn-block">Create Service</button>
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
    name: 'CreateService',
    data(){
        return {
            form: {
                title: '',
                smallDescription: '',
            },
            // errors: {},
            editor: ClassicEditor,
            editorConfig: {
            }
        }
    },
    methods: {
        createService(){
            // console.log(this.form)
            Api().post('/admin/service', this.form)
                .then(() => {
                    this.$message({
                        message: 'Service create request complete',
                        type: 'success'
                    })
                })
        }
    }
}
</script>