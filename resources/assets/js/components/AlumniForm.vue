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
        <label for="alumni-name">Alumni Name:</label>
        <input type="text" name="name" v-model = "form.name" class="form-control"
          id="alumni-name">
        <span class="form-text text-danger" v-show="form.errors.has('name')">
          {{ form.errors.get('name') }}
        </span>
      </div>

      <div class="form-group">
        <label for="alumni-description">Description:</label>
        <textarea name="description" class="form-control" id="alumni-description"
          v-model = "form.description" rows=8></textarea>
        <span class="form-text text-danger" v-show="form.errors.has('description')">
          {{ form.errors.get('description') }}
        </span>
      </div>

      <div class="form-group">
        <label for="alumni-year-finished">Year Finished:</label>
        <input type="text" name="year_finished" v-model = "form.year_finished" class="form-control"
          id="alumni-year-finished">
        <span class="form-text text-danger" v-show="form.errors.has('year_finished')">
          {{ form.errors.get('year_finished') }}
        </span>
      </div>

      <div class="form-group" v-show="show">
        <label for="alumni-picture">Picture:</label>
        <input type="file" name="picture" id="alumni-picture">
        <span class="form-text text-danger" v-show="form.errors.has('picture')">
          {{ form.errors.get('picture') }}
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

export default {

  data() {
    return {
      show: true,
      formTitle: '',
      form: new Form({})
    }
  },

  mounted() {
    $("#alumni-year-finished").datepicker({
        format: "yyyy",
        startView: 2,
        minViewMode: 2
    });
  },

  methods: {

    setEditMode(formTitle, alumni, show) {
      this.formTitle = formTitle;

      if(_.isEmpty(alumni)) {
        this.form = new Form({
          'name': '',
          'description': '',
          'year_finished': '',
          'picture': ''
        });
      } else {
        this.form = new Form(_.assign(alumni, {'picture': ''}));
      }

      this.show = show;
    },

    onSubmit() {
      this.form.submit('POST', '/admin/api/alumni');
    },

    onClose() {
      alumniStore.setShouldDisplay(false);
      alumniStore.setShowCreateAction(true);
    }

  }

}
</script>

<style lang="css">
</style>
