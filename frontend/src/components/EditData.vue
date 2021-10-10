<template>
  <b-modal
    name="edit-data-modal"
    id="edit-data-modal"
    ref="modal"
    title="Edit Agile Data"
    ok-title="Submit"
    ok-only
    @hidden="resetModal"
    @ok="handleOk"
    :static="true"
  >
    <form ref="form" @submit.stop.prevent="submitForm">
      <b-form-group
        label="Type"
        label-for="type-input"
        invalid-feedback="Type is required"
      >
        <b-form-select
          v-model="edit_form.type"
          :options="agile_types"
          required
        ></b-form-select>
      </b-form-group>

      <b-form-group
        label="Title"
        label-for="title-input"
        invalid-feedback="Title is required"
      >
        <b-form-input
          id="title-input"
          v-model="edit_form.title"
          required
        ></b-form-input>
      </b-form-group>

      <b-form-group label="Description" label-for="description-input">
        <b-form-textarea
          id="description-input"
          v-model="edit_form.description"
          required
          rows="5"
        ></b-form-textarea>
      </b-form-group>
    </form>
  </b-modal>
</template>

<script>
import Swal from 'sweetalert2'
import axios from 'axios'

export default {
    name: "EditData",    
    data: () => {
        return {
            agile_types: [
              { value: null, text: 'Please select an option' },
              { value:1, text:'Values' },
              { value:2, text:'Principles' }
              ],
            edit_form: {
                agile_id: 0,
                type: 0,
                title: "",
                description: ""
            },
        }
    },
    methods: {                
      getAgileData(){        
        var _this = this                
        _this.edit_form.agile_id  = this.agile_data.agile_id
        _this.edit_form.type  = this.agile_data.type
        _this.edit_form.title  = this.agile_data.title
        _this.edit_form.description  = this.agile_data.description        
        
      },
      checkFormValidity(){                    
        if(this.edit_form.type == null ||
          this.edit_form.title == null ||
          this.edit_form.description == null)
        {
          this.displayToast('error','Please fill out the required fields.');
          return false;
        } else {
          return true;
        }
      },
      handleOk(bvModalEvt) {
        bvModalEvt.preventDefault()
        this.submitForm()
      },
      submitForm(){
        this.showLoading();
        if(this.checkFormValidity()){          
          var _this = this;
          Swal.fire({
              title: 'Confirm',
              text: 'Are you sure you want to save your data?',
              showCancelButton: true,
              confirmButtonText: `Save`,
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.showLoading()

              var formData = new FormData()
              formData.append("agile_id", this.edit_form.agile_id)
              formData.append("title", this.edit_form.title)
              formData.append("description", this.edit_form.description)
              formData.append("type", this.edit_form.type)
              
              this.$agile_app.post("/update-agile/", formData)
              .then(response => {
                  if (response.status === 200) { 
                      _this.$emit('refreshData');
                      _this.closeEditModal();
                      Swal.close();

                      _this.displayToast('success',response.data.message);
                  }
              })
              .catch(error => {
                  console.log("AXIOS ERROR: " + error);
              });
            }
          })
        }
      },
      resetModal(){
          this.edit_form = {
              agile_id: 0,
              type: "",
              title: "",
              description: ""
          };
      },      
      closeEditModal(){
        this.$bvModal.hide('edit-data-modal')
        this.resetModal();          
      },
    }
}
</script>