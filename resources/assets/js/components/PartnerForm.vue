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
        <label for="partner-name">Partner Name:</label>
        <input type="text" name="name" v-model = "form.name" class="form-control"
          id="partner-name">
        <span class="form-text text-danger" v-show="form.errors.has('name')">
          {{ form.errors.get('name') }}
        </span>
      </div>

      <div class="form-group">
        <label for="partner-link">Partner Link:</label>
        <input type="text" name="link" class="form-control"
          id="partner-link" v-model="form.link">
        <span class="form-text text-danger" v-show="form.errors.has('link')">
          {{ form.errors.get('link') }}
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
//
// import { Program } from '../models/Program.js'

export default {

  data() {
    return {
      show: true,
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

  methods: {

    setEditMode(formTitle, partner, show) {
      this.formTitle = formTitle;

      if(_.isEmpty(partner)) {
        this.form = new Form({
          'program_id': '',
          'name': '',
          'link': '',
          'program_id': ''
        });
      } else {
        this.form = new Form(_.assign({}, partner));
      }

      this.show = show;
    },

    onSubmit() {
      this.form.submit('POST', '/admin/api/partners');
    },

    onClose() {
      partnerStore.setShouldDisplay(false);
      partnerStore.setShowCreateAction(true);
    }

  }

}
</script>

<style lang="css">
</style>
