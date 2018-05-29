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
        <label for="course-name">Course Name:</label>
        <input type="text" name="name" v-model = "form.name" class="form-control"
          id="course-name">
        <span class="form-text text-danger" v-show="form.errors.has('name')">
          {{ form.errors.get('name') }}
        </span>
      </div>

      <div class="form-group">
        <label for="course-description">Course Description:</label>
        <textarea name="description" class="form-control" id="course-description"
          v-model = "form.description" rows=8></textarea>
        <span class="form-text text-danger" v-show="form.errors.has('description')">
          {{ form.errors.get('description') }}
        </span>
      </div>

      <div class="form-group">
        <label for="video-id">Video ID:</label>
        <input type="text" name="video_id" v-model = "form.video_id"
          class="form-control" id="video-id">
        <span class="form-text text-danger" v-show="form.errors.has('video_id')">
          {{ form.errors.get('video_id') }}
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
      formTitle: '',
      programs: [],
      form: new Form({})
    }
  },

  created() {
    Program.getPrograms()
          .then(({data}) => this.programs = data)
          .catch(error => console.error(error))
  },

  methods: {

    setEditMode(formTitle, course) {
      this.formTitle = formTitle;

      if(_.isEmpty(course)) {
        this.form = new Form({
          'program_id': '',
          'name': '',
          'description': '',
          'video_id': ''
        });
      } else {
        this.form = new Form(_.assign({}, course));
      }

    },

    onSubmit() {
      this.form.submit('POST', '/admin/api/courses');
    },

    onClose() {
      courseStore.setShouldDisplay(false);
      courseStore.setShowCreateAction(true);
    }

  }

}
</script>

<style lang="css">
</style>
