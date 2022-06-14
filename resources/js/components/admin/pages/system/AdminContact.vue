<template>
<div id="admin_contact">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">System Contact Detail</h4>
                        <el-button type="success" size="mini" 
                        @click="contactModal" icon="el-icon-circle-plus">
                            Create System Contact
                        </el-button>
                    </div>
                  
                  <!-- <p class="card-description">
                    Add class <code>.table-bordered</code>
                  </p> -->
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Phone
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Address
                          </th>
                          <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(contact, index) in contacts" :key="contact.id">
                          <td>
                            {{ index+1 }}
                          </td>
                          <td>
                            {{ contact.phone }}
                          </td>
                          <td>
                            {{ contact.email }}
                          </td>
                          <td>
                            {{ contact.address }}
                          </td>
                          <td>
                            <el-button-group>
                                <el-button type="primary" icon="el-icon-info" size="mini"></el-button>
                                <el-button type="success" @click.prevent="editModal(contact)"
                                icon="el-icon-edit" size="mini"></el-button>
                                <el-button type="danger"  @click.prevent="deleteContact(contact.id)"
                                icon="el-icon-delete" size="mini"></el-button>
                            </el-button-group>
                          </td>
                        </tr>
                        <!-- <tr v-if="emptyContact()">
                          <td colspan="6">
                            <h6 class="text-center text-danger font-bold">No Data Available</h6>
                          </td>
                        </tr> -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>

            <vs-dialog square prevent-close v-model="active">
            <template #header>
            <h4 class="not-margin" v-show="!editmode">Add Contact</h4>
            <h4 class="not-margin" v-show="editmode">Edit Contact</h4>
            </template>

            <form @submit.prevent="editmode ? updateContact() : addContact()">
              <div class="con-form">
              <vs-input class="mb-2" v-model="form.phone" block placeholder="Mobile">
                  <template #icon>
                  <i class='bx bxs-phone-call'></i>
                  </template>
              </vs-input>
              <vs-input class="mb-2" v-model="form.email" block placeholder="Email">
                  <template #message-danger>
                    invalid email
                  </template>
                  <template #icon>
                  <i class='bx bx-mail-send'></i>
                  </template>
              </vs-input>
              <vs-input class="mb-2" v-model="form.address" block 
              placeholder="1208, Mfangano Street, Nairobi. Kenya">
                  <template #icon>
                  <i class='bx bxs-inbox'></i>
                  </template>
              </vs-input>
              </div>
            

              <template footer>
              <div class="footer-dialog">
                  <vs-button :loading="loading" block v-show="!editmode" ref="button" flat square>Create Contact</vs-button>
                  <vs-button :loading="loading" block v-show="editmode" ref="button" flat square>Update Contact</vs-button>
              </div>
              </template>
            </form>
        </vs-dialog>

    </div>
</div>
</template>

<script>
import Api from '../../../../apis/admin/Api'
export default {
    name: 'AdminContact',
    data(){
        return {
            editmode: false,
            loading: false,
            active: false,
            form: {
                phone: '',
                email: '',
                address: ''
            }
        }
    },
    methods: {
      // emptyContact(){
      //     return (this.contacts.length < 1)
      //   },
      contactModal(){
          this.editmode = false
          // this.form = ''
          this.active = true
      },
      editModal(contact){
            this.editmode = true
            this.form = contact
            this.active = true
      },
      addContact(){
          Api().post('/admin/contact', this.form)
            .then(() => {
              // this.loading = true
              this.active = false
              this.$message({
                  showClose: true,
                  message: 'Contact created succeffully.',
                  type: 'success'
                });
                this.contactList()
              // this.loading = false
              this.form.phone = '',
              this.form.email = '',
              this.form.address = ''
            })
      },
      updateContact(){
            Api().put('/admin/contact/'+this.form.id, this.form)
                .then(res=>{
                    // this.loading = true
                    this.active = false
                    this.editmode = false
                    this.categoryList()
                    this.$message({
                    showClose: true,
                    message: 'Contact updated succeffully.',
                    type: 'success'
                  });
                    // this.loading = false
                    this.form.phone = ''
                    this.form.email = ''
                    this.form.address = ''
                })
                .catch(err=>{

                })
        },
        deleteContact(id){
            this.$store.dispatch('contact/deleteContact', id)
            this.$message({
                showClose: true,
                message: 'Contact deleted succeffully.',
                type: 'success'
            });
            this.contactList()
        },
      contactList(){
        this.$store.dispatch('contact/contactList')
      },
    },
    computed: {
      contacts(){
        return this.$store.getters['contact/contactList']
      }
    },
    mounted(){
      this.contactList()
    }
}
</script>