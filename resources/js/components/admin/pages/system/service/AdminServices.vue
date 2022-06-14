<template>
<div id="admin_services">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">System Services Detail</h4>
                        <router-link :to="{name: 'CreateService'}">
                          <el-button type="success" size="mini" 
                          icon="el-icon-circle-plus">
                              Create System Service
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
                            Title
                          </th>
                          <th>
                            Description
                          </th>
                          <th>
                            Created At
                          </th>
                          <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(service, index) in services" :key="service.id">
                          <td>
                            {{ index+1 }}
                          </td>
                          <td>
                            {{ service.title }}
                          </td>
                          <td>
                            {{ service.smallDescription }}
                          </td>
                          <td>
                            {{ service.created_at }}
                          </td>
                          <td>

                            <el-button-group>

                                <el-button type="primary" icon="el-icon-info" size="mini"></el-button>

                                <router-link :to="`/api/admin/edit-service/${service.slug}`">
                                  <el-button type="success" 
                                  icon="el-icon-edit" size="mini"></el-button>
                                </router-link>

                                <el-button type="danger"  @click.prevent="deleteService(service.id)"
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
    name: 'AdminServices',
    data(){
      return {}
    },
    methods: {
      getAllServices: function(){
        this.$store.dispatch('service/serviceList')
      },
      deleteService(id){
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          this.$store.dispatch('service/deleteService', id)
          this.getAllServices()
          if (result.isConfirmed) {
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
          }
        })
        // this.$store.dispatch('service/deleteService', id)
        // this.getAllServices()
      }
    },
    computed: {
      services(){
        return this.$store.getters['service/serviceList']
      }
    },
    mounted(){
      this.getAllServices()
    }
}
</script>