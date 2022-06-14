<template>
<div id="admin_services">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">System Services Descriptions</h4>
                        <router-link :to="{name: 'CreateServiceDescription'}">
                          <el-button type="success" size="mini" 
                          icon="el-icon-circle-plus">
                              Create System Service Descriptions
                          </el-button>
                        </router-link>
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
                            Service
                          </th>
                          <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="servicedescription in servicedescriptions" :key="servicedescription.id">
                          <td>
                            2
                          </td>
                          <td>
                            {{ servicedescription.service.title }}
                          </td>
                          <td>
                            <el-button-group>

                                <el-button type="primary" icon="el-icon-info" size="mini"></el-button>
                                
                                <router-link :to="`/api/admin/edit-service-description/${servicedescription.id}`">
                                  <el-button type="success" icon="el-icon-edit" size="mini"></el-button>
                                </router-link>

                                <el-button type="danger" @click.prevent="deleteServiceDescription(servicedescription.id)"
                                icon="el-icon-delete" size="mini"></el-button>

                            </el-button-group>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>

    </div>
</div>
</template>

<script>
export default {
    name: 'AdminServiceDescription',
    data(){
      return {}
    },
    methods: {
      getAllServices: function(){
        this.$store.dispatch('service/getServiceDescriptions')
      },
      deleteServiceDescription(id){
          this.$store.dispatch('service/deleteServiceDescription', id)
          this.getAllServices()
          this.$message({
              message: 'Service delete request complete',
              type: 'success'
          })
      }
    },
    computed: {
      servicedescriptions(){
        return this.$store.getters['service/serviceDescription']
      }
    },
    mounted(){
      this.getAllServices()
    }
}
</script>