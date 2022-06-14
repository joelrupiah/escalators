<template>
<div id="admin_sendemail">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><b><u>Create Email Details</u></b></h4>
                  <form class="form-sample">
                    <p class="card-description">
                      <b>Email Form</b>
                    </p>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Email Topic</label>
                            <input type="text" class="form-control form-control-sm" 
                            v-model="form.emailTopic" placeholder="Email Topic" aria-label="emailTopic">
                            <span class="text-danger text-xs" v-if="errors.emailTopic">
								{{ errors.emailTopic[0] }}
							</span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Sender Email</label>
                            <input type="text" class="form-control form-control-sm" 
                            v-model="form.senderEmail" placeholder="Sender Email" aria-label="senderEmail">
                            <span class="text-danger text-xs" v-if="errors.senderEmail">
								{{ errors.senderEmail[0] }}
							</span>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Enter email body</label>
                            <ckeditor :editor="editor" v-model="form.emailBody" :config="editorConfig">
                            </ckeditor>
                            <span class="text-danger text-xs" v-if="errors.emailBody">
								{{ errors.emailBody[0] }}
							</span>
                        </div>
                      </div>
                    </div>
                    <button type="button" @click.prevent="sendEmail()"
                     class="btn btn-dark btn-lg btn-block">Send Bulk Email</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
        
    </div>
</div>
</template>

<script>
import Api from '../../../../apis/admin/Api'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic'
export default {
    name: 'SendEmail',
    data(){
        return {
            form: {
                emailTopic: '',
                senderEmail: '',
                emailBody: ''
            },
            errors: {},
            editor: ClassicEditor,
            editorConfig: {
            }
        }
    },
    methods: {
        sendEmail() {
                if (this.form.emailBody !== "") {
                    Api().post("/admin/send-email", this.form).then(res => {
                        this.success = "Emails sent successfully";
                    });
                } else {
                    this.error = "This field is required";
                }
            }
        // sendEmail(){
        //     Api().post("/admin/send-email", this.form)
        //     .then(res => {
        //         this.$message({
        //             message: 'Bulk Email Sent',
        //             type: 'success'
        //         })
        //     })
        //     .catch(error => {
		// 		if (error.response.status === 422) {
		// 			this.errors = error.response.data.errors
		// 		}
		// 	})
        // }
    },
    computed: {},
    mounted(){}
}
</script>