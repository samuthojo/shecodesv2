<template lang="html">

  <div>

    <div class="component-title">
      <slot name="header"></slot>
      <button type="button" class="btn btn-danger" @click = "$emit('close')">Cancel</button>
    </div>

    <hr>

  </div>

</template>

<script>
export default {
}
</script>

<style lang="css">
</style>
