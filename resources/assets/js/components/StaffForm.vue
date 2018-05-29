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
        <label for="staff-name">Name:</label>
        <input type="text" name="name" v-model = "form.name" class="form-control"
          id="staff-name">
        <span class="form-text text-danger" v-show="form.errors.has('name')">
          {{ form.errors.get('name') }}
        </span>
      </div>

      <div class="form-group">
        <label class="btn btn-primary active">
          <input type="radio" name="is_director" id="option1"
            v-model="form.is_director" value="true"> Director
        </label>
        <label class="btn btn-primary">
          <input type="radio" name="is_director" id="option2"
            v-model="form.is_director" value="false"> Staff
        </label>
        <template v-show="form.errors.has('is_director')">
          <br>
          <span class="form-text text-danger">
            {{ form.errors.get('is_director') }}
          </span>
        </template>
      </div>

      <div class="form-group">
        <label for="staff-position">Position:</label>
        <input type="text" name="position" v-model = "form.position" class="form-control"
          id="staff-position">
        <span class="form-text text-danger" v-show="form.errors.has('position')">
          {{ form.errors.get('position') }}
        </span>
      </div>

      <div class="form-group">
        <label for="staff-description">Description:</label>
        <textarea name="description" class="form-control" id="staff-description"
          v-model = "form.description" rows=8></textarea>
        <span class="form-text text-danger" v-show="form.errors.has('description')">
          {{ form.errors.get('description') }}
        </span>
      </div>

      <div class="form-group" v-show="show">
        <label for="staff-picture">Picture:</label>
        <input type="file" name="picture" id="staff-picture">
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

  methods: {

    setEditMode(formTitle, staff, show) {
      this.formTitle = formTitle;

      if(_.isEmpty(staff)) {
        this.form = new Form({
          'name': '',
          'position': '',
          'description': '',
          'is_director': '',
          'picture': ''
        });
      } else {
        this.form = new Form(_.assign(staff, {'picture': ''}));
      }

      this.show = show;
    },

    onSubmit() {
      this.form.submit('POST', '/admin/api/staff');
    },

    onClose() {
      staffStore.setShouldDisplay(false);
      staffStore.setShowCreateAction(true);
    }

  }

}
</script>

<style lang="css">
</style>
