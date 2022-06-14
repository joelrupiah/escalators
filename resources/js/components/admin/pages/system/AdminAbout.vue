<template>
<div id="admin_about">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">System Contact Detail</h4>
                        <el-button type="success" size="mini" 
                        @click="active=!active" icon="el-icon-circle-plus">
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
                            Duty
                          </th>
                          <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            7
                          </td>
                          <td>
                            Henry Tom
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 150.00
                          </td>
                          <td>
                            June 16, 2015
                          </td>
                          <td>
                            <el-button-group>
                                <el-button type="primary" icon="el-icon-info" size="mini"></el-button>
                                <el-button type="success" icon="el-icon-edit" size="mini"></el-button>
                                <el-button type="danger" icon="el-icon-delete" size="mini"></el-button>
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

            <vs-dialog square v-model="active">
            <template #header>
            <h4 class="not-margin">
                Add System Contact Details
            </h4>
            </template>


            <div class="con-form">
            <vs-input class="mb-2" v-model="phone" block placeholder="Mobile">
                <template #icon>
                <i class='bx bxs-phone-call'></i>
                </template>
            </vs-input>
            <vs-input class="mb-2" v-model="email" block placeholder="Email">
                <template #icon>
                <i class='bx bx-mail-send'></i>
                </template>
            </vs-input>
            <vs-input class="mb-2" v-model="email" block 
            placeholder="1208, Mfangano Street, Nairobi. Kenya">
                <template #icon>
                <i class='bx bxs-inbox'></i>
                </template>
            </vs-input>
            </div>

            <template #footer>
            <div class="footer-dialog">
                <vs-button block>
                Create
                </vs-button>
            </div>
            </template>
        </vs-dialog>

    </div>
</div>
</template>

<script>
export default {
    name: 'AdminAbout',
    data(){
        return {
            active: false,
            input1: '',
            input2: '',
            checkbox1: false
        }
    },
}
</script>