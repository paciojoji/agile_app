<template>
  <b-modal
    name="add-data-modal"
    id="add-data-modal"
    ref="modal"
    title="Add Agile Data"
    ok-title="Submit"
    @show="resetModal"
    ok-only
    @hidden="resetModal"
    @ok="handleOk"
    :static="true"
  >
    <form ref="form" @submit.stop.prevent="submitForm">
      <b-form-group
        label="Type *"
        label-for="type-input"
        invalid-feedback="Type is required"
      >
        <b-form-select
          v-model="form.type"
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
          placeholder="Enter Title"
          v-model="form.title"
          required
        ></b-form-input>
      </b-form-group>

      <b-form-group label="Description" label-for="description-input">
        <b-form-textarea
          id="description-input"
          placeholder="Enter Description"
          v-model="form.description"
          required
          rows="5"
        ></b-form-textarea>
      </b-form-group>
    </form>
  </b-modal>
</template>

<script>
import Swal from "sweetalert2";
import axios from "axios";

export default {
  name: "AddData",
  data: () => {
    return {
      agile_types: [
        { value: null, text: "Please select an option" },
        { value: 1, text: "Values" },
        { value: 2, text: "Principles" },
      ],
      form: {
        type: 0,
        title: "",
        description: "",
      },
    };
  },
  methods: {
    checkFormValidity() {
      if (this.form.type == null || this.form.title == null) {
        this.displayToast("error", "Please fill out the required fields.");
        return false;
      } else {
        return true;
      }
    },
    handleOk(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.submitForm();
    },
    submitForm() {
      this.showLoading();
      if (this.checkFormValidity()) {
        var _this = this;
        Swal.fire({
          title: "Confirm",
          text: "Are you sure you want to save your data?",
          showCancelButton: true,
          confirmButtonText: `Save`,
        }).then(async (result) => {
          if (result.isConfirmed) {
            Swal.showLoading();

            var formData = new FormData();
            formData.append("title", this.form.title);
            formData.append("description", this.form.description);
            formData.append("type", this.form.type);

            try {
              let response = await axios.post("/save-agile/", formData);
              _this.$emit("refreshData");
              _this.closeAddModal();
              Swal.close();
              _this.displayToast("success", response.data.message);
            } catch (error) {
              _this.displayToast("error", error);
              console.log(error);
            }
          }
        });
      }
    },
    resetModal() {
      this.form = {
        type: null,
        title: "",
        description: "",
      };
    },
    closeAddModal() {
      this.$bvModal.hide("add-data-modal");
      this.resetModal();
    },
  },
};
</script>
