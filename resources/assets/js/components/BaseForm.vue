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

      <template v-for="field in schema.fields">

        <component
          :is="field.type"
          :field="field"
          :data.sync="data[field.name]">
        </component>

      </template>

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

    entity: {
      type: Object
    }

  }

}
</script>

<style lang="css">
</style>
