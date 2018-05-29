<template lang="html">

  <div class="container-fluid">

    <component-title
      @close="onClose">
      <template slot="header">
        <h3> {{ formTitle }}</h3>
      </template>
    </component-title>

    <form @submit.prevent="onSubmit"
          @keydown="form.errors.clear($event.target.name)">

      <div class="form-group">
        <label for="program-id">Program:</label>
        <select name="program_id" id="program-id" class="form-control"
          v-model="form.program_id">
          <option
            v-for="program in programs"
            :key="program.id" :value="program.id"> {{ program.name }} </option>
        </select>
        <span class="form-text text-danger" v-show="form.errors.has('program_id')">
          {{ form.errors.get('program_id') }}
        </span>
      </div>

      <div class="form-group">
        <label for="activity-name">Activity Name:</label>
        <input type="text" name="name" v-model = "form.name" class="form-control"
          id="activity-name">
        <span class="form-text text-danger" v-show="form.errors.has('name')">
          {{ form.errors.get('name') }}
        </span>
      </div>

      <div class="form-group">
        <label for="activity-location">Location:</label>
        <input type="text" name="location" class="form-control"
          id="activity-location" v-model = "form.location">
        <span class="form-text text-danger" v-show="form.errors.has('location')">
          {{ form.errors.get('location') }}
        </span>
      </div>

      <div class="form-group">
        <label for="activity-date">Date:</label>
        <input
          type="text"
          name="date"
          class="form-control"
          id="activity-date"
          :value="form.date | longDate"
          @input="form.date = $event.target.value">
        <span class="form-text text-danger" v-show="form.errors.has('date')">
          {{ form.errors.get('date') }}
        </span>
      </div>

      <div class="form-group">
        <label for="activity-pictures">Pictures Link:</label>
        <input type="text" name="pictures_link" id="activity-pictures"
          class="form-control"
          v-model="form.pictures_link">
        <span class="form-text text-danger" v-show="form.errors.has('pictures_link')">
          {{ form.errors.get('pictures_link') }}
        </span>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary float-right"
         title="submit" :disabled="form.errors.any()">Submit</button>
      </div>

    </form>

  </div>

</template>

<script>
// import { Form } from '../Form.js';

// import { Program } from '../models/Program.js';

export default {

  data() {
    return {
      programs: [],
      formTitle: '',
      form: new Form({})
    }
  },

  created() {
    Program.getPrograms()
           .then(({data}) => this.programs = data)
           .catch(error => console.error(error))
  },

  mounted() {
    $("#activity-date").datepicker({
      format: "d M yyyy",
      autoclose: true
    });
  },

  methods: {

    setEditMode(formTitle, activity) {
      this.formTitle = formTitle;

      if(_.isEmpty(activity)) {
        this.form = new Form({
          'program_id': '',
          'name': '',
          'location': '',
          'date': '',
          'pictures_link': ''
        });
      } else {
        this.form = new Form(_.assign({}, activity));
      }

    },

    onSubmit() {
      this.form.submit('POST', '/admin/api/activities');
    },

    onClose() {
      activityStore.setShouldDisplay(false);
      activityStore.setShowCreateAction(true);
    }

  }

}
</script>

<style lang="css">
</style>
