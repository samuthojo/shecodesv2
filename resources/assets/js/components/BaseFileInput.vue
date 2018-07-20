<template lang="html">

  <div class="form-group">

    <label>{{ field.label }}</label>

    <input type="file">

  </div>

</template>

<script>
export default {
  props: {
    field: {
      required: true
    }
  }
}
</script>

<style lang="css">
</style>
