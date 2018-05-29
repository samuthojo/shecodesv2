<template lang="html">

  <div class="form-group">

    <label>{{ field.label }}</label>

    <input
      class="form-control"
      type="text"
      :placeholder="field.placeholder"
      v-model="data.value">
      
  </div>

</template>

<script>
export default {
}
</script>

<style lang="css">
</style>
