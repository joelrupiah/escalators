<template>
<div id="create_service">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><b><u>Create Sevice Details</u></b></h4>
                  <form class="form-sample" enctype="multipart/form-data">
                    <p class="card-description">
                      <b>Service info</b>
                    </p>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Selelct Service</label>
                            <select class="form-control form-control-sm" 
                            id="service_id" v-model="form.service_id">
                              <option :value="service.id" v-for="service in services" :key="service.id">
                                  {{ service.title }}
                              </option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Service Image</label>
                            <input type="file" class="form-control form-control-sm" 
                             @change="loadImageOne($event)" placeholder="Username" aria-label="Username">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                            <label></label>
                            <img :src="form.imageOne" alt="" style="width:40px;height:40px">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                            <label>Service Main Description</label>
                            <ckeditor :editor="editor" v-model="form.mainDescription" :config="editorConfig">
                            </ckeditor>
                        </div>
                      </div>
                    </div>

                    <div style="border-bottom:2px solid green;height:5px"></div>

                    <p class="card-description mt-3">
                      <b>Why choose this service</b>
                    </p>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                            <label>Main Description</label>
                            <ckeditor :editor="editor" v-model="form.mainDescriptionOne" :config="editorConfig">
                            </ckeditor>
                        </div>
                        <!-- <div class="form-group">
                            <label>Main Description</label>
                            <el-input type="textarea" autosize placeholder="Input Small Description"
                            v-model="form.mainDescriptionOne"></el-input>
                        </div> -->
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Service Image</label>
                            <input type="file" class="form-control form-control-sm" 
                            @change="loadImageTwo($event)" placeholder="Username" aria-label="Username">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                            <label></label>
                            <img :src="form.imageTwo" alt="" style="width:40px;height:40px">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Point One</label>
                            <input type="text" class="form-control form-control-sm" 
                            v-model="form.pointOne" placeholder="Point One" aria-label="Username">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Point Two</label>
                            <input type="text" class="form-control form-control-sm" 
                            v-model="form.pointTwo" placeholder="Point Two" aria-label="Username">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Point Three</label>
                            <input type="text" class="form-control form-control-sm" 
                            v-model="form.pointThree" placeholder="Point Three" aria-label="Username">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Point Four</label>
                            <input type="text" class="form-control form-control-sm" 
                            v-model="form.pointFour" placeholder="Point Four" aria-label="Username">
                        </div>
                      </div>
                    </div>

                    <div style="border-bottom:2px solid green;height:5px"></div>

                    <p class="card-description mt-3">
                      <b>Our work benefits</b>
                    </p>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                            <label>Main Description</label>
                            <ckeditor :editor="editor" v-model="form.mainDescriptionTwo" :config="editorConfig">
                            </ckeditor>
                        </div>
                        <!-- <div class="form-group">
                            <label>Main Description</label>
                            <el-input type="textarea" autosize placeholder="Input Main Description"
                            v-model="form.mainDescriptionTwo"></el-input>
                        </div> -->
                      </div>
                    </div>

                    <div style="border-bottom:2px solid green;height:5px"></div>

                    <p class="card-description mt-3">
                      <b>Frontiers of Research</b>
                    </p>
                    <div class="row">
                      <div class="col-md-12">
                        <!-- <div class="form-group">
                            <label>Main Description</label>
                            <ckeditor :editor="editor" v-model="form.mainDescriptionOne" :config="editorConfig">
                            </ckeditor>
                        </div> -->
                        <div class="form-group">
                            <label>Main Description</label>
                            <el-input type="textarea" autosize placeholder="Input Main Description"
                            v-model="form.smallDescriptionOne"></el-input>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <!-- <div class="form-group">
                            <label>Main Description</label>
                            <ckeditor :editor="editor" v-model="form.mainDescriptionOne" :config="editorConfig">
                            </ckeditor>
                        </div> -->
                        <div class="form-group">
                            <label>Header One</label>
                            <input type="text" class="form-control form-control-sm" 
                            v-model="form.smallHeaderOne" placeholder="Header One" aria-label="Username">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                            <label>Small Description One</label>
                            <ckeditor :editor="editor" v-model="form.smallDescOne" :config="editorConfig">
                            </ckeditor>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Header Two</label>
                            <input type="text" class="form-control form-control-sm" 
                            v-model="form.smallHeaderTwo" placeholder="Header Two" aria-label="Username">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                            <label>Small Description Two</label>
                            <ckeditor :editor="editor" v-model="form.smallDescTwo" :config="editorConfig">
                            </ckeditor>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Header Three</label>
                            <input type="text" class="form-control form-control-sm" 
                            v-model="form.smallHeaderThree" placeholder="Header Three" aria-label="Username">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                            <label>Small Description Three</label>
                            <ckeditor :editor="editor" v-model="form.smallDescThree" :config="editorConfig">
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
    name: 'CreateServiceDescription',
    data(){
        return {
            form: {
                service_id: '',
                mainDescription: '',
                imageOne: '',
                mainDescription: '',
                mainDescriptionOne: '',
                imageTwo: '',
                pointOne: '',
                pointTwo: '',
                pointThree: '',
                pointFour: '',
                mainDescriptionTwo: '',
                smallDescriptionOne: '',
                smallHeaderOne: '',
                smallHeaderTwo: '',
                smallHeaderThree: '',
                smallDescOne: '',
                smallDescTwo: '',
                smallDescThree: ''
            },
            // errors: {},
            editor: ClassicEditor,
            editorConfig: {
            }
        }
    },
    methods: {
        loadImageOne(e){
            // console.log(e.target.files[0].name)
            let file = e.target.files[0]
            let reader = new FileReader()
            // let this_ = this
            // reader.onload = function(e){
            //   this_.form.image = e.target.result
            // }
            reader.onload = e => {
                this.form.imageOne = e.target.result
            }
            reader.readAsDataURL(file)
        },
        loadImageTwo(e){
            // console.log(e.target.files[0].name)
            let file = e.target.files[0]
            let reader = new FileReader()
            // let this_ = this
            // reader.onload = function(e){
            //   this_.form.image = e.target.result
            // }
            reader.onload = e => {
                this.form.imageTwo = e.target.result
            }
            reader.readAsDataURL(file)
        },
        getServices(){
          this.$store.dispatch('service/getServices')
        },
        createService(){
            // console.log(this.form)
            Api().post('/admin/servicedescription', this.form)
                .then(() => {
                    this.$message({
                        message: 'Service create request complete',
                        type: 'success'
                    })
                })
        }
    },
    computed: {
      services(){
        return this.$store.getters['service/serviceList']
      }
    },
    mounted(){
      this.getServices()
    }
}
</script>