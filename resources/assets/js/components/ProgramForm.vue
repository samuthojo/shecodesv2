<template lang="html">

  <div class="container-fluid position-relative">

    <base-notification
      v-show="form.notification.showNotificationModal"
      :is-loading="form.notification.showAsync"
      :success-message="form.notification.successMessage"
      :error-message="form.notification.errorMessage"
      :show-success="form.notification.showSuccess"
      :show-error="form.notification.showError"/>

    <component-title
      @close="onClose">
      <template slot="header">
        <h3> {{ formTitle }} </h3>
      </template>
    </component-title>

    <form @submit.prevent="$emit('submit', form)"
          @keydown="form.errors.clear($event.target.name)">

      <div class="form-group">
        <label for="program-name">Program Name:</label>
        <input type="text" name="name" v-model = "form.name" class="form-control"
          id="program-name">
        <span class="form-text text-danger" v-show="form.errors.has('name')">
          {{ form.errors.get('name') }}
        </span>
      </div>

      <div class="form-group">
        <label for="program-description">Program Description:</label>
        <textarea name="description" class="form-control" id="program-description"
          v-model = "form.description" rows=8></textarea>
        <span class="form-text text-danger" v-show="form.errors.has('description')">
          {{ form.errors.get('description') }}
        </span>
      </div>

      <div class="form-group">
        <label for="curriculum-description">Curriculum Description:</label>
        <textarea name="curriculum_description" class="form-control"
          v-model = "form.curriculum_description" id="curriculum-description"
          rows="8"></textarea>
          <span class="form-text text-danger" v-show="form.errors.has('curriculum_description')">
            {{ form.errors.get('curriculum_description') }}
          </span>
      </div>

      <div class="form-group">
        <label for="video-link">Video Link:</label>
        <input type="text" name="video_link" v-model = "form.video_link"
          class="form-control" id="video-link">
        <span class="form-text text-danger" v-show="form.errors.has('video_link')">
          {{ form.errors.get('video_link') }}
        </span>
      </div>

      <div class="form-group">
        <label for="form-link">Form Link:</label>
        <input type="text" name="form_link" v-model = "form.form_link"
          class="form-control" id="form-link">
        <span class="form-text text-danger" v-show="form.errors.has('form_link')">
          {{ form.errors.get('form_link') }}
        </span>
      </div>

      <div class="form-group" v-show="showPicture">
        <label for="program-picture">Program Picture:</label>
        <input type="file" name="picture">
        <span class="form-text text-danger" v-show="form.errors.has('picture')">
          {{ form.errors.get('picture') }}
        </span>
      </div>

      <div class="form-group">
        <button
         v-show="displaySubmit"
         type="submit"
         class="btn btn-primary float-right"
         title="submit"
         :disabled="form.errors.any()">Submit</button>
         <button
          v-show="!displaySubmit"
          type="button"
          class="btn btn-primary float-right"
          title="submit"
          :disabled="form.errors.any()"
          @click="$emit('update', form)">Submit</button>
      </div>

    </form>

  </div>

</template>

<script>
// import { Form } from '../Form.js'

export default {

  data() {
    return {
      displaySubmit: true,
      showPicture: true,
      formTitle: '',
      form: new Form({}),
      program: {}
    }
  },

  methods: {

    setEditMode(formTitle, program, showPicture) {
      this.formTitle = formTitle

      if(_.isEmpty(program)) {
        this.form = new Form({
          'name': '',
          'description': '',
          'curriculum_description': '',
          'video_link': '',
          'form_link': '',
          'picture': ''
        })
      } else {

        this.form = new Form(_.assign(program, {'picture': ''}))

        this.displaySubmit = false
        
      }

      this.showPicture = showPicture
    },

    onClose() {

      programStore.setShouldDisplay(false)

      programStore.setShowCreateAction(true)

    }

  }

}
</script>

<style lang="css">
</style>
