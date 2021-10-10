<template>
  <div class="mt-1">
    <div class="page-title-container">
      <div class="title-container">
        <h1>
          <span style="color: #ff7f02">Agile</span>
          <span style="color: #6b3589">Manifesto</span>
        </h1>
        <h4>Comprehensive Guide to the Agile Manifesto</h4>
      </div>
      <b-button
        name="add-button"
        id="add-button"
        pill
        variant="info"
        class="text-light btn-lg pulse"
        v-b-modal.add-data-modal
      >
        <b-icon icon="plus-circle" font-scale="1"></b-icon>
        Add Agile Data
      </b-button>
    </div>
    <div class="card" id="card-info">
      <div class="card-body">
        <div class="mt-1">
          <AddData @refreshData="getData" />
          <EditData ref="edit_data" @refreshData="getData" />
          <div class="data-container">
            <b-tabs content-class="mt-3 mb-3" fill>
              <b-tab
                id="agile-data-list"
                v-show="agileDataList.length > 0"
                v-for="(v, i) in agileDataList"
                data-test="dataList"
                :key="'data' + i"
                :title="
                  (i == 1 ? 'Values' : 'Principles') + ' of Agile Manifesto'
                "
              >
                <h3 v-if="i == 1" class="tab-title">
                  Values of Agile Manifesto
                </h3>
                <h3 v-else class="tab-title">Principles of Agile Manifesto</h3>
                <div class="info" v-for="(vv, ii) in v" :key="'data_' + ii">
                  <div class="accordion" role="tablist">
                    <b-card no-body class="mb-2">
                      <b-card-header header-tag="header" class="p-1" role="tab">
                        <div class="row">
                          <div class="col-md-10">
                            <!-- <b-icon
                                icon="three-dots-vertical"
                                font-scale="1"
                              ></b-icon> -->
                            <p
                              class="lead agile-title"
                              v-b-toggle="'accordion-' + ii"
                              variant="info"
                            >
                              <span class="agile-number"> {{ ii + 1 }} </span>
                              {{ vv.title }}
                            </p>
                          </div>
                          <div class="col-md-2">
                            <div class="action-button-container">
                              <button class="action-button">
                                <div class="text">Actions</div>
                                <div class="icons">
                                  <div class="icons__icon">
                                    <b-icon
                                      variant="light"
                                      id="edit-button"
                                      name="edit-button"
                                      icon="pencil-fill"
                                      aria-hidden="true"
                                      @click="editData(vv)"
                                    ></b-icon>
                                  </div>
                                  <div class="icons__icon">
                                    <b-icon
                                      id="delete-button"
                                      name="delete-button"
                                      title="Delete"
                                      variant="light"
                                      icon="trash-fill"
                                      aria-hidden="true"
                                      @click="deleteData(vv.agile_id)"
                                    ></b-icon>
                                  </div>
                                </div>
                              </button>
                            </div>
                          </div>
                        </div>
                      </b-card-header>
                      <div
                        class="collapse-container"
                        v-show="vv.description != ''"
                      >
                        <b-collapse
                          :id="'accordion-' + ii"
                          visible
                          accordion="my-accordion"
                          role="tabpanel"
                        >
                          <b-card-body>
                            <p class="text-justify">
                              {{ vv.description }}
                            </p>
                          </b-card-body>
                        </b-collapse>
                      </div>
                    </b-card>
                  </div>
                </div>
              </b-tab>
            </b-tabs>
            <div class="no-data card" v-show="agileDataList.length == 0">
              <p class="text-center">No data.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Swal from 'sweetalert2'
import axios from 'axios'

import AddData from './AddData.vue'
import EditData from './EditData.vue'

export default {
    name: "Home",
    components: {
      AddData,
      EditData
    },
    data: () => {
        return {
            agileDataList: []
        }
    },
    mounted() {        
        this.getData();
    },
    methods: {
      async getData(){
        var _this = this;
        await _this.$agile_app.get("/get-all-agile")
        .then((response) => {          
            this.agileDataList = response.data.data;
        }).catch(error => {
            console.log("AXIOS ERROR: " + error);
        });        
      },
      editData(agile_data) {        
          this.$refs.edit_data.agile_data = agile_data;   
          this.$refs.edit_data.getAgileData();
          this.$bvModal.show('edit-data-modal')
      },
      deleteData(agile_id){
        this.showLoading();        
        var _this = this;
        Swal.fire({
            title: 'Confirm',
            text: 'Are you sure you want to delete this data?',
            showCancelButton: true,
            confirmButtonText: `Save`,
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.showLoading()

            var formData = new FormData()
            formData.append("agile_id", agile_id)
            
            this.$agile_app.post("/delete-agile/", formData)
            .then(response => {
                if (response.status === 200) { 
                    _this.getData();
                    Swal.close();
                    _this.displayToast('success',response.data.message);
                }
            })
            .catch(error => {
                console.log("AXIOS ERROR: " + error);
            });
          }
        })
      
        },
    }
}
</script>