<template lang="html">

  <div class="form-group">

    <label>{{ field.label }}</label>

    <textarea
      rows="3"
      class="form-control"
      type="text"
      :placeholder="field.placeholder"
      v-model="data.value"></textarea>
      
  </div>

</template>

<script>
export default {
}
</script>

<style lang="css">
</style>
