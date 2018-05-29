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
        <label for="testimonial-name">Name:</label>
        <input type="text" name="name" v-model = "form.name" class="form-control"
          id="testimonial-name">
        <span class="form-text text-danger" v-show="form.errors.has('name')">
          {{ form.errors.get('name') }}
        </span>
      </div>

      <div class="form-group">
        <label for="testimonial-description">Description:</label>
        <textarea name="description" class="form-control" id="testimonial-description"
          v-model = "form.description" rows=8></textarea>
        <span class="form-text text-danger" v-show="form.errors.has('description')">
          {{ form.errors.get('description') }}
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

  methods: {

    setEditMode(formTitle, testimonial, show) {
      this.formTitle = formTitle;

      if(_.isEmpty(testimonial)) {
        this.form = new Form({
          'name': '',
          'description': ''
        });
      } else {
        this.form = new Form(_.assign({}, testimonial));
      }

      this.show = show;
    },

    onSubmit() {
      this.form.submit('POST', '/admin/api/testimonials');
    },

    onClose() {
      testimonialStore.setShouldDisplay(false);
      testimonialStore.setShowCreateAction(true);
    }

  }

}
</script>

<style lang="css">
</style>
