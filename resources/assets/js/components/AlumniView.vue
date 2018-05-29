<template lang="html">

  <div class="container-fluid">

    <component-title
      @close="onClose">
      <template slot="header">
        <h3> {{ alumni.name }}</h3>
      </template>
    </component-title>

    <p class="card-text">{{ alumni.description }}</p>

  </div>

</template>

<script>
export default {
  data() {
    return {
      alumni: {}
    }
  },
  methods: {
    setAlumni(alumni) {
      this.alumni = alumni;
    },

    onClose() {
      alumniStore.setShouldDisplay(false);
    }
  }
}
</script>

<style lang="css">
</style>
