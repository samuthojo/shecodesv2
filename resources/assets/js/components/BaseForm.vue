<template lang="html">

  <div class="container-fluid position-relative">

    <base-notification
      v-show="form.notification.showNotificationModal"
      :is-loading="form.notification.showAsync"
      :success-message="form.notification.successMessage"
      :error-message="form.notification.errorMessage"
      :show-success="form.notification.showSuccess"
      :show-error="form.notification.showError"/>

    <the-form-title-bar @close="onClose">

      <template slot="header">

        <h3> {{ formTitle }} </h3>

      </template>

    </the-form-title-bar>

    <form @submit.prevent="onSubmit"
          @keydown="form.errors.clear($event.target.name)">

      <template v-for="field in schema.fields">

        <component
          :is="field.type"
          :field="field"
          :entity.sync="form[field.name]">
        </component>

      </template>

      <div class="form-group">

        <button
          type="submit"
          class="btn btn-primary float-right"
          :disabled="form.errors.any()">Submit</button>

      </div>

    </form>

  </div>

</template>

<script>
export default {

  props: {
    schema: {
      type: Object,
      required: true
    },
  },

  data() {
    return {
      form: new Form({}),
      formTitle: '',
      isCreateAction: false
    }
  },

  methods: {
    onSubmit() {
      if(this.isCreateAction) {
        this.$emit('create', this.form)
      }
      else {
        this.$emit('update', this.form)
      }
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
