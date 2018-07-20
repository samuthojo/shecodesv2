<template lang="html">

  <div class="form-check-inline">

    <label class="form-check-label">

      <input
        type="radio"
        class="form-check-input"
        name="optradio"
        :value="entity"
        @input="$emit('update:entity', $event.target.value)"
        required>{{ field.label }}

    </label>

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
