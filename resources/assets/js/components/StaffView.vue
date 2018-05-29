<template lang="html">

  <div class="container-fluid">

    <component-title
      @close="onClose">
      <template slot="header">
        <h3> {{ staff.name }}</h3>
      </template>
    </component-title>

    <p class="card-text">{{ staff.description }}</p>

  </div>

</template>

<script>
export default {
  data() {
    return {
      staff: {}
    }
  },
  methods: {
    setStaff(staff) {
      this.staff = staff;
    },

    onClose() {
      staffStore.setShouldDisplay(false);
    }
  }
}
</script>

<style lang="css">
</style>
