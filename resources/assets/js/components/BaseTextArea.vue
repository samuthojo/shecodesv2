<template lang="html">

  <div class="form-group">

    <label>{{ field.label }}</label>

    <textarea
      rows="3"
      class="form-control"
      type="text"
      :placeholder="field.placeholder"
      :value="entity"
      @input="$emit('update:entity', $event.target.value)"
      required></textarea>

  </div>

</template>

<script>
export default {
  props: {
    field: {
      required: true
    },
    entity: {
      required: true
    }
  }
}
</script>

<style lang="css">
</style>
