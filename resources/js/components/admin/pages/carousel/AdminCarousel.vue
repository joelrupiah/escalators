<template>
<div id="admin_services">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Carousel List</h4>
                        <router-link :to="{name: 'CreateCarousel'}">
                          <el-button type="success" size="mini" 
                          icon="el-icon-circle-plus">
                              Create Carousel Images
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
                            Created At
                          </th>
                          <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(carousel, index) in carousels" :key="carousel.id">
                          <td>
                           {{ index+1 }}
                          </td>
                          <td>
                            {{ carousel.title }}
                          </td>
                          <td>
                            {{ carousel.create_at }}
                          </td>
                          <td>

                            <el-button-group>

                                <el-button type="primary" icon="el-icon-info" size="mini"></el-button>

                                <router-link :to="`/api/admin/edit-carousel/${carousel.slug}`">
                                  <el-button type="success" 
                                  icon="el-icon-edit" size="mini"></el-button>
                                </router-link>

                                <el-button type="danger"  @click.prevent="deleteCarousel(carousel.id)"
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
    name: 'AdminCarousel',
    data(){
      return {}
    },
    methods: {
        getCarouselImages(){
            this.$store.dispatch('carousel/getCarouselItems')
        },
        deleteCarousel(id){
            this.$store.dispatch('carousel/deleteCarouselItem', id)
        }
    },
    computed: {
        carousels(){
            return this.$store.getters['carousel/carouselItems']
        }
    }
}
</script>