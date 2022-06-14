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
                            <img :src="fileLinkOne(form.imageOne)" alt="" style="width:40px;height:40px">
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
                            <img :src="fileLinkTwo(form.imageTwo)" alt="" style="width:40px;height:40px">
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
                      </div>
                    </div>

                    <div style="border-bottom:2px solid green;height:5px"></div>

                    <p class="card-description mt-3">
                      <b>Frontiers of Research</b>
                    </p>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                            <label>Main Description</label>
                            <ckeditor :editor="editor" v-model="form.smallDescriptionOne" :config="editorConfig">
                            </ckeditor>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
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
    name: 'EditServiceDescription',
    data(){
        return {
            form: {
                id: '',
                service_id: '',
                mainDescription: '',
                imageOne: '',
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
        fileLinkOne(name){
            if (name != null && name.length < 256) {
                return '/uploads/service/main/' + name
            }else {
                return this.form.imageOne
            }
                
        },
        fileLinkTwo(name){
            if (name != null && name.length < 256) {
                return '/uploads/service/other/' + name
            }else {
                return this.form.imageTwo
            }
                
        },
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
        getAllServices: function(){
            this.$store.dispatch('service/serviceList')
        },
        getServiceDescriptions(){
          this.$store.dispatch('service/showServiceDescriptions', this.$route.params.id)
        },
        updateService(){
        // console.log(this.$route.params.id, this.form)
          Api().post('/admin/update-service-description/'+this.$route.params.id, this.form)
            .then(() =>{
              this.$message({
                    message: 'Service update request complete',
                    type: 'success'
                })
                // let self = this
                // self.$router.push({path: '/api/admin/admin-services-descriptions'})
                
            })
            .catch(error => {
                console.log(error)
            })
      },
    },
    computed: {
      servicedescription(){
        return this.$store.getters['service/singleServiceDescription']
      },
      services(){
        return this.$store.getters['service/serviceList']
      }
    },
    mounted(){
      this.getServiceDescriptions()
      this.getAllServices()
    },
    watch: {
        servicedescription(){
            // this.form = this.servicedescription
            this.form.id = this.servicedescription.id
            this.form.service_id = this.servicedescription.service_id
            this.form.mainDescription = this.servicedescription.mainDescription
            this.form.imageOne = this.servicedescription.imageOne
            this.form.mainDescriptionOne = this.servicedescription.mainDescriptionOne
            this.form.imageTwo = this.servicedescription.imageTwo
            this.form.pointOne = this.servicedescription.pointOne
            this.form.pointTwo = this.servicedescription.pointTwo
            this.form.pointThree = this.servicedescription.pointThree
            this.form.pointFour = this.servicedescription.pointFour
            this.form.mainDescriptionTwo = this.servicedescription.mainDescriptionTwo
            this.form.smallDescriptionOne = this.servicedescription.smallDescriptionOne
            this.form.smallHeaderOne = this.servicedescription.smallHeaderOne
            this.form.smallHeaderTwo = this.servicedescription.smallHeaderTwo
            this.form.smallHeaderThree = this.servicedescription.smallHeaderThree
            this.form.smallDescOne = this.servicedescription.smallDescOne
            this.form.smallDescTwo = this.servicedescription.smallDescTwo
            this.form.smallDescThree = this.servicedescription.smallDescThree
        }
    }
}
</script>